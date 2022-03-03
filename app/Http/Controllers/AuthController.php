<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $token = $user->createToken('mysecrettoken')->plainTextToken;

        return response()->json([
            "msg" => 'Successful Registration' ,
            "token" => $token
        ],201);
    }

    public function login(Request $request)
    {
        $validatedRequest = $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:5'
        ]);
        $user = User::where('email', $validatedRequest['email'])->first();
        if(!$user || !Hash::check($validatedRequest['password'],$user->password)){
            return response()->json('Invalid Credentials!',401);
        }
        $token = $user->createToken('mysecrettoken')->plainTextToken;
        return response()->json([
            'msg' => 'Successful Login',
            'token' => $token
        ]);
    }

    public function logout() {
        auth()->user()->tokens()->delete();
        return response()->json('Logout successful' ,200);
    }

}