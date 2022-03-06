<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ]);
        $hashedPassword = bcrypt($validatedRequest['password']);
        $validatedRequest['password'] = $hashedPassword;
        $user = User::create($validatedRequest);

        return response()->json([
            "api_status" => 1,
            "code" => 201
        ],201);
    }

    public function login(Request $request)
    {
        $validatedRequest = $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:5'
        ]);
        if(auth()->attempt($validatedRequest)){
            $user = auth()->user();
            $token = $user->createToken('mysecrettoken')->plainTextToken;
            return response()->json([
                'api_status' => 1,
                'code' => 200,
                'email' => $user->email,
                'message' => 'Successful Login',
                'name' => $user->name,
                'access_token' => $token
            ], 200);
        }
        return response()->json([
            'error' => 'Unauthenticated user',
            'code' => 401,
        ], 401);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'msg' => 'successful logout',
            'api_status' => 1,
            'code' => 200
        ],200);
    }

    public function sessionStatus()
    {
        if (auth()->check()) {
            return response()->json([
                'auth' => true,
            ], 200);
        } else {
            return response()->json([
                'auth' => false,
            ], 200);
        }
    }
}