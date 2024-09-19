<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        $token = Auth()->attempt($credentials);
        if ($token == null) {
            return response()->json([
                'error' => 'Credenciales Incorrectas'
            ], 401);
        }
        return response()->json([
            'token' => $token,
            'user' => Auth()->user(),
            '$token_type' => 'bearer',
            'expires_in' => Auth('api')->factory()->getTTL() * 60
        ]);
    }
}
