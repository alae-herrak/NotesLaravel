<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'username' => ['required', Rule::unique('users', 'username')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $user = User::create($validated);

        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
