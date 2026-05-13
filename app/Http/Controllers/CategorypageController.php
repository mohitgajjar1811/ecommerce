<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategorypageController extends Controller
{
    public function category(Request $request)
    {
        
        $catgories = Category::all();
        
        return view('category', ['catgories' => $catgories]);
    }
}