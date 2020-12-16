<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Ad;
use App\Models\User;
use App\Models\Category;

class AdController extends Controller{

    public function index(){
        // $ads = Ad::where('user_id', '=', Auth::user()->id)
        // ->join('categories', 'categories.id', '=', 'ads.category_id')
        // ->orderBy('updated_at', 'DESC')
        // ->paginate(5);

        $ads = DB::table('ads AS a')
        ->select('a.*', 'c.title as category_title', 'c.id as category_id')
        ->leftJoin('categories AS c', 'c.id', '=', 'a.category_id')
        ->where('user_id', '=', Auth::user()->id)
        ->orderBy('a.updated_at', 'DESC')
        ->paginate(5);
       
        return View::make('pages.ads.index')->with(compact(["ads"]));
    }

    public function create(){
        $categories = Category::all();
        $user = Auth::user();

        return View::make('pages.ads.create')->with(compact(["user", "categories"]));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'city' => 'required',
            'county' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $ad = new Ad;

        $ad->title = request('title');
        $ad->description = request('description');
        $ad->short_description = Str::limit(request('description'), 230);
        $ad->price = request('price');
        $ad->currency = request('currency');
        $ad->city = request('city');
        $ad->county = request('county');
        $ad->user_id = request('user_id');
        $ad->category_id = request('category');

        if(!empty(request()->file('image'))) {
            $ad->image = request()->file('image')->store('public/images');
        }

        $ad->save();
        return redirect('/ads')->with('status', 'Anuntul a fost adaugat cu succes!');
    }

    public function show($id){
        $ad = Ad::findOrFail($id);
        $user = $ad->user;
        // get user ads to display under seller
        $user_ads = Ad::where('user_id', '=', $user->id)->where('id', '!=', $id)
        ->orderBy('updated_at', 'DESC')
        ->limit(10)->get();

        return View::make('pages.ads.show')->with(compact(["ad", "user", "user_ads"]));
    }

    public function edit($id){
        $ad = Ad::findOrFail($id);
        $logged_in_user_id = Auth::user()->id;

        if($ad->user_id == $logged_in_user_id) 
            return View::make('pages.ads.edit')->with('ad', $ad);    
        else abort(404);

        // $ad = Ad::findOrFail($id);
        // return View::make('pages.ads.edit')->with(compact(["ad", "user"]));

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

    public function destroy($id){
        $ad = Ad::find($id);

        $ad->delete();
        Storage::delete($ad->image);

        return redirect('/ads')->with('err', 'Anunt sters definitiv!');    
    }

}
