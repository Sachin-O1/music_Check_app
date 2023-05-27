<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to a protected page
            return redirect()->intended('/dashboard');
        }

        // Authentication failed, redirect back to the login form
        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }
}
