<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::default()->min(8)],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'token' => $user->createToken($request->email)->plainTextToken,
            'message' => 'Authenticated'
        ]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100'
        ]);

        if (Auth::attempt($attributes)) {
            return response()->json([
                'token' => $request->user()->createToken($request->email)->plainTextToken,
                'message' => 'Authenticated'
            ]);
        }

        return response()->json([
            'message' => 'Incorrect email or password',
            'errors' => [
                'email' => 'Incorrect email or password'
            ]
        ], 401);
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Session closed'
        ]);
    }
}
