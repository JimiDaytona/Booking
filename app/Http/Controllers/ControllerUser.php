<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ControllerUser extends Controller
{
    public function create()
    {
        return view('###');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        Auth::attempt(['name' => request('name'), 'password' => request('password')]);

        return redirect()->route('layout', 'all');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('layout', 'all');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('layout', ['id' => 'all']);
    }

    public function editUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
        ]);

        User::find()->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return redirect()->back()->with('success', 'The changes have been accepted');
    }

}
