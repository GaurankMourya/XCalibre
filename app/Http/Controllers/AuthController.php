<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration successful. You can now log in.');
    }

    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Login the user using session
            Auth::login($user);

            return redirect('/')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid email or password');
    }

    public function profile()
    {
        $user = Auth::user(); // Get logged-in user's data
        return view('profile', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully');
    }
}
