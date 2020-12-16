<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        if (!$category) {
            return response()->json([
                "success" => false,
                "error_message" => "No category found!",
                "data" => null
            ]);
        }

        return response()->json([
            "success" => true,
            "data" => $category
        ]);
        
    }
}
