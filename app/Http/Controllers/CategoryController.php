<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Category;
use App\Models\Ad;


class CategoryController extends Controller
{
   public function show($id){
      
      // $ads = $category->ad;
      
      $category = Category::findOrFail($id);
      $ads = Ad::with('category')->where('category_id', '=', $id)->get();
      // $ads = Ad::where('slug', $slug)->first();
      // return view('pages.ads.category')->with('ads', $ads);
      return View::make('pages.ads.category')->with(compact(["ads", "category"]));
   }
}
