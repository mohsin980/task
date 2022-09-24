<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthService
{
    public function loginPage() {
        return view('login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check crententials
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->where('password', $request->password)->first();
            return response()->json([
                    'url' => route('getOrders'),
                    'data' => $user,
                    'message' => "Login Successfully",
                    'status' => 200
                ], 200);
        }
        return response()->json([
            'data' => [],
            'message' => "Login Failed",
            'status' => 422
        ], 422);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
