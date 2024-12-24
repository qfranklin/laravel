<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Helpers\NumerologyHelper;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'birthday' => 'nullable|date',
        ]);

        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        if ($currentUser->id !== $user->id && !$currentUser->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $user->update($request->only('name', 'email', 'birthday'));

        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function getUserData($id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        if ($currentUser->id !== $user->id && !$currentUser->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $lifePathNumber = NumerologyHelper::reduceLifePathDate($user->birthday);
        $universalDayNumber = NumerologyHelper::reduceLifePathDate(now()->format('Y-m-d'));
        $personalDayNumber = NumerologyHelper::calculatePersonalDayNumber($lifePathNumber, $universalDayNumber);
        $dailyCompatibility = NumerologyHelper::getDailyCompatibility($lifePathNumber, $personalDayNumber);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'birthday' => $user->birthday,
            'numerology' => [
                'life_path_number' => $lifePathNumber,
                'universal_day_number' => $universalDayNumber,
                'personal_day_number' => $personalDayNumber,
                'daily_compatibility' => $dailyCompatibility,
            ],
        ]);
    }

    public function index()
    {
        $users = User::select('id', 'name', 'email', 'birthday')->get();
        return response()->json($users);
    }
}
