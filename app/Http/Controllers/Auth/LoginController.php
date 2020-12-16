<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    
    public function login(){
        return View::make('auth.login');
    }

    protected function authenticate(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/ads');
        }

        return redirect('login')->with('err', 'Username/parola invalide.');
    }

    public function logout() {
        Auth::logout();
  
        return redirect('login')->with('status', 'Te-ai delogat cu succes!');
    }

}
