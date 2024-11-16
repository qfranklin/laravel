<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
}
