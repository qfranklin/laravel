<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\NumerologyHelper;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'birthday' => 'nullable|date',
            'email' => 'nullable|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($request->only('birthday', 'email'));

        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function getUserData(Request $request)
    {
        $user = $request->user();
        $lifePathNumber = NumerologyHelper::reduceLifePathDate($user->birthday);
        $universalDayNumber = NumerologyHelper::reduceLifePathDate(now()->format('Y-m-d'));
        $personalDayNumber = NumerologyHelper::calculatePersonalDayNumber($lifePathNumber, $universalDayNumber);
        $dailyPrediction = NumerologyHelper::getDailyPrediction($lifePathNumber, $personalDayNumber);

        return response()->json([
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'birthday' => $user->birthday,
            'numerology' => [
                'life_path_number' => $lifePathNumber,
                'universal_day_number' => $universalDayNumber,
                'personal_day_number' => $personalDayNumber,
                'daily_prediction' => $dailyPrediction,
            ],
        ]);
    }
}
