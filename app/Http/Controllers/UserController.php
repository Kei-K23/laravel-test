<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create(): View
    {
        return view('user.register');
    }

    public function store(Request $req)
    {
        $formFields = $req->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => [
                'required', 'confirmed', 'min:6'
            ]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/posts')->with('message', 'User registered and login!');
    }

    public function logout(Request $req)
    {
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerate();
        $req->session()->regenerateToken();

        return redirect('/posts')->with('message', 'Logout successfully');
    }

    public function login(): View
    {
        return view('user.login');
    }

    public function authenticate(Request $req)
    {
        $formFields = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if (auth()->attempt($formFields)) {
            $req->session()->regenerate();
            $req->session()->regenerateToken();

            return redirect('/posts')->with('message', 'Login successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
