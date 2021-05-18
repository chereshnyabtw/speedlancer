<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorizationController extends Controller
{
    public function register(Request $request)
    {
        $validatedFields = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $validatedFields['password'] = Hash::make($request->input('password'));
        $user = User::create($validatedFields);

        if(Auth::login($user))
            return redirect(route('home'));
        else
            return redirect(route('register'))->withErrors([__('site_names.create_error')]);
    }

    public function login(Request $request)
    {
        $formFields = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($formFields))
            return redirect(route('home'));

        return redirect(route('login'))->withErrors([__('auth.failed')]);
    }

    public function logOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
