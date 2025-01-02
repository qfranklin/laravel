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
            'slug' => 'nullable|string|unique:users,slug,' . $id,
        ]);

        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        if ($currentUser->id !== $user->id && !$currentUser->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $data = $request->only('name', 'email', 'birthday');

        if ($currentUser->is_admin && $request->has('slug')) {
            $data['slug'] = $request->input('slug');
        }

        $user->update($data);

        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function getUserData($identifier)
    {
        if (is_numeric($identifier)) {
            $user = User::findOrFail($identifier);
        } else {
            $user = User::where('slug', $identifier)->firstOrFail();
        }

        $currentUser = Auth::user();

        if ($currentUser->id !== $user->id && !$currentUser->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $lifePathNumber = NumerologyHelper::reduceLifePathDate($user->birthday);
        $universalDayNumber = NumerologyHelper::reduceLifePathDate(now()->format('Y-m-d'));
        $personalDayNumber = NumerologyHelper::calculatePersonalDayNumber($lifePathNumber, $universalDayNumber);
        $dailyCompatibility = NumerologyHelper::getDailyCompatibility($lifePathNumber, $personalDayNumber);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'slug' => $user->slug,
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
