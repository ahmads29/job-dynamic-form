<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Display the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Create the login view in resources/views/auth/login.blade.php
    }

    // Handle the login logic
    public function login(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log in with provided credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended page or dashboard
            return redirect()->intended('/dashboard'); // You can change this route
        }

        // If authentication fails, redirect back with error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Log the user out
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
