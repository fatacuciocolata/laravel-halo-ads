<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use App\Models\Ad;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        // $ads = Ad::orderBy('updated_at', 'DESC')->paginate(3);
        $ads = DB::table('ads AS a')
        ->select('a.*', 'c.title as category_title', 'c.id as category_id')
        ->leftJoin('categories AS c', 'c.id', '=', 'a.category_id')
        ->orderBy('a.updated_at', 'DESC')
        ->paginate(6);

        return View::make('home')->with(compact(["ads"]));

        // return view('home', compact('ads'))->with('i', (request()->input('page', 1) -1) * 5);
    }
    public function search(Request $request){
        $ads = Ad::where([
            ['name', '!=', NULL],
            [function ($query) use ($request){
                if(($term = $request->term)){
                    $query->where('title', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])->orderBy("id", "desc")->paginate(5);
        $term = $request->term;
        return View::make('/search')->with(compact(["ads", "term"]));

        // return view('home', compact('ads'))->with('i', (request()->input('page', 1) -1) * 5);
    }
}

