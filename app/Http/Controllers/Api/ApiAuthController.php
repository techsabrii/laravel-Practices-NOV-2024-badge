<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{




public function register(Request $request)
{
    // Validator create karo
    $validator = Validator::make($request->all(), [
        'full_name' => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email',
        'contact'   => 'required|string|max:15',
        'password'  => 'required|string|min:6|confirmed',
    ]);

    // Agar validation fail ho jaye
    if ($validator->fails()) {
        return response()->json([
            'status'  => false,
            'message' => $validator->errors()->first() // pehli error message
        ], 422);
    }

    // User create karo
    $user = User::create([
        'name'     => $request->full_name,
        'email'    => $request->email,
        'contact'  => $request->contact,
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'status'  => true,
        'message' => 'Registration successful!',
        'data'    => $user
    ], 201);
}

    // API Login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid credentials. Please try again.'
            ], 401);
        }

        $user = Auth::user();

        // 🔑 Token generate karega
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'status'  => true,
            'message' => 'Login successful!',
            'token'   => $token,
            'data'    => $user
        ]);
    }

    // API Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'  => true,
            'message' => 'You have been logged out.'
        ]);
    }
}
