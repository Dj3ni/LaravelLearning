<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request): RedirectResponse
    {
        $credentials= $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('index')); // Va conserver l'url précédente
        }

        return to_route('auth.login')->withErrors([
            'email ' => 'invalid email'
        ]);
        
    }
}
