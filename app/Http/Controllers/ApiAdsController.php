<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ApiAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'DESC')->get();

        if (!$ads) {
            return response()->json([
                "success" => false,
                "error_message" => "No ads found!",
                "data" => null
            ]);
        }

        return response()->json([
            "success" => true,
            "data" => $ads
        ]);
        
    }
    
    public function show($id){
        $ad = Ad::find($id);

        if (!$ad) {
            return response()->json([
                "success" => false,
                "error_message" => "No ad found!",
                "data" => null
            ]);
        }

        return response()->json([
            "success" => true,
            "data" => $ad
        ]);

    }

    public function search(Request $request){
        $term = $request->term;

        $ads = Ad::where([
            ['title', 'LIKE', '%' . $term . '%']
        ])->orderBy("id", "desc")->get();

        
        if (!$ads) {
            return response()->json([
                "success" => false,
                "error_message" => "No ads found!",
                "data" => null
            ]);
        }

        return response()->json([
            "success" => true,
            "term" => $term,
            "data" => $ads
        ]);    
    }

    public function store (Request $request) {
        $request->validateWithBag("pwwola", [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'city' => 'required',
            'county' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048'
            // 'category_id' => 'required'
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
        $ad->category_id = request('category_id');

        // if ($request->hasfile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $location = storage_path('app/public/images/') . $filename;
    
        //     Image::make($image)->save($location);
    
        //     $ad->image = $filename;
        //     $ad->save();
        //   }

        if(!empty(request()->file('image'))) {
            $ad->image = request()->file('image')->store('public/images');
        }

        $ad->save();

        return array (
            "success" => true
        );
    }
}
