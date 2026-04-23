<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Session;


use App\Models\Unit;
use Illuminate\Support\Facades\Storage;



class HomepageController extends Controller
{
    public function HomePage()
    {
        $featProd = Product::paginate(10);
        $catgories = Category::all();
        
        // dd($featProd);
        // dd($catgories);
        return view('home', ['featProd' => $featProd, 'catgories' => $catgories ]);
        
    }

}
