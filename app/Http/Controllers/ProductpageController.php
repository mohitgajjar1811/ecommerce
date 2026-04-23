<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;



class ProductpageController extends Controller
{
    public function ProductPage(Request $request)
    {
        $query = Product::with(['category']);
        
        if(request('category')){
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if(request('min_price')){
            $query->where('price','>=',request('min_price'));
        }

        if(request('max_price')){
            $query->where('price','<=',request('max_price'));
        }

        // PAGINATION (IMPORTANT)
        $products = $query->paginate(10)->withQueryString();
        $catgories = Category::all();
        // dd($products);
        return view('product', ['products' => $products,'catgories' => $catgories  ]);
        
    }
    
}
