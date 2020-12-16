<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{
    
    public function index(){
        $user = Auth::user();
        
        return View::make('auth.profile')->with(compact(["user"]));
    }
    public function edit(){
        $user = Auth::user();

        return View::make('auth.edit')->with(compact(["user"]));
    }   
    public function update(Request $request, $id){
        $ad = Ad::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'city' => 'required',
            'county' => 'required'
        ]);
        
        $ad->title = request('title');
        $ad->description = request('description');
        $ad->price = request('price');
        $ad->currency = request('currency');
        $ad->city = request('city');
        $ad->county = request('county');
        $ad->user_id = request('user_id');

        // $ad->category_id = 1;
        
        if(!empty(request()->file('image'))){
            $ad->image = request()->file('image')->store('public/images');
        }
        
        $ad->save();
        return redirect('/ads')->with('status', 'Anuntul a fost editat cu succes!');    
    } 
}
