<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('quality.dashboard');
        }
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            return redirect()->route('welcome.dashboard');
        } else {
            // Redirect back with an error message if authentication fails
            return redirect()->back()->withErrors(['email' => trans('auth.failed')])->withInput();
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // or redirect to any other route you prefer
    }

    public function welcomeDashboard()
    {
        return view('dashboard.welcome-dash');
    }
}
