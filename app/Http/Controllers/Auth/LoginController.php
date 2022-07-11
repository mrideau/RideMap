<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // TODO: Add remember login
        if(Auth::attempt($credentials)) {
//            return redirect()->intended(route('admin.dashboard'));
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput($request->input())->withErrors([
            'login' => "Adresse Email ou Mot de passe incorrect" // TODO: Replace with lang config
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect(route('home'));
    }
}
