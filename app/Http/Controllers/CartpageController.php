<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartpageController extends Controller
{
    public function cartpage()
    {
        $cart = session()->get('cart', []);
        $userId = auth()->id();


        foreach ($cart as $productId => $item) {
            $product = \App\Models\Product::find($productId);
            if ($product) {
                $cart[$productId]['product'] = $product;
                $cart[$productId]['total'] = $item['quantity'] * $product->price;
            }
        }
        // dd($cart);

        return view('cartpage', compact('cart'));
    }
}
