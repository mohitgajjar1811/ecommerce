<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartpageController extends Controller
{
    public function cartpage()
    {   
        if (Auth::check()) {
            // 1. Get the user's cart with all its items and their products in one go
            $cart = Cart::where('user_id', auth()->id())->first();

            // Check if cart exists to avoid errors
            $cartItems = $cart 
                ? CartItem::with('product')->where('cart_id', $cart->id)->get() 
                : collect();

            return view('cartpage', [
                'cartItems' => $cartItems,
                'isLogged' => true
            ]);
        } else {
            // 2. Handle Session Cart
            $sessionCart = session()->get('cart', []);
            // dd($sessionCart);
            $cartItems = [];

            foreach ($sessionCart as $productId => $details) {
                // dd($productId, $details);
                $product = Product::find($productId);
                if ($product) {
                    $cartItems[] = (object)[
                        'product' => $product,
                        'quantity' => $details['quantity'],
                        'total' => $details['quantity'] * $product->price
                    ];
                }
            }

            return view('cartpage', [
                'cartItems' => $cartItems,
                'isLogged' => false
            ]);
        }
    }
}
