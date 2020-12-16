<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller{

  public function register(){
    return view('auth.register');
  }

  public function store(Request $request){
      $request->validate([
          'name' => 'required|string|max:32',
          'city' => 'required|string|max:32',
          'country' => 'required|string|max:32',
          'phone' => 'required|regex:/(0)[0-9]{9}/',
          'username' => 'required|max:32|unique:users',
          'email' => 'required|string|email|max:320|unique:users',
          'password' => 'required|string|min:8|max:64|confirmed',
          'password_confirmation' => 'required',
      ]);

      $user = new User;

      $user->name = request('name');
      $user->city = request('city');
      $user->country = request('country');
      $user->phone = request('phone');
      $user->username = request('username');
      $user->email = request('email');
      $user->password = Hash::make($request->password);

      $user->save();

    return redirect('/login')->with('status', 'Contul a fost creat, acum te poti loga!');
  }

}
