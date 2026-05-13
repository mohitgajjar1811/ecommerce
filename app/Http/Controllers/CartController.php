<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CartController extends Controller
{

    public function addtocart($id)
    {
        $product = Product::findOrFail($id);
        // dd($id);
        // ✅ If user NOT logged in → store in SESSION
        if (!FacadesAuth::check()) {

            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'product_id' => $id,
                    'quantity' => 1
                ];
            }
            // dd($cart);
            session()->put('cart', $cart);

            return redirect()->route('cartpage')
                ->with('success', 'Product added to cart (Session)');
        }

        // ✅ If user logged in → store in DATABASE
        $userId = Auth::id();

        $cart = Cart::firstOrCreate([
            'user_id' => $userId
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->total = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'quantity' => 1,
                'price' => $product->price,
                'total' => $product->price,
            ]);
        }

        return redirect()->route('cartpage')
            ->with('success', 'Product added to cart (Database)');

        $product = Product::findOrFail($id);

        if (Auth::check()) {
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

            $item = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $id)
                ->first();

            if ($item) {
                $item->quantity += 1;
                $item->total = $item->quantity * $item->price;
                $item->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $id,
                    'quantity' => 1,
                    'price' => $product->price,
                    'total' => $product->price,
                ]);
            }
        } else {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                ];
            }

            session()->put('cart', $cart);
        }

        return back()->with('success', 'Product added to cart');
    }

    public function increaseQty($id)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $id)
                ->first();
            // dd($cartItem);
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->total = $cartItem->quantity * $cartItem->price;
                $cartItem->save();
            }
        } else {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
            }
        }


        return redirect()->back();
    }

    public function decreaseQty($id)
    {
        if (Auth::check()) {

            $cart = Cart::where('user_id', auth()->id())->first();

            if ($cart) {
                $cartItem = CartItem::where('cart_id', $cart->id)
                    ->where('product_id', $id)
                    ->first();

                if ($cartItem) {

                    // If quantity more than 1 then decrease
                    if ($cartItem->quantity > 1) {
                        $cartItem->quantity -= 1;
                        $cartItem->total = $cartItem->quantity * $cartItem->price;
                        $cartItem->save();
                    } else {
                        // Remove item if quantity becomes 0
                        $cartItem->delete();
                    }
                }
            }
        } else {

            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {

                if ($cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                } else {
                    unset($cart[$id]);
                }

                session()->put('cart', $cart);
            }
        }

        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        if (Auth::check()) {

            $cart = Cart::where('user_id', auth()->id())->first();

            if ($cart) {
                CartItem::where('cart_id', $cart->id)
                    ->where('product_id', $id)
                    ->delete();
            }
        } else {

            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Product removed from cart');
    }

    public function cart(Request $request)
    {
        $search = $request->search;

        if ($search == null) {
            $cart = Cart::with(['user'])->paginate(5);
        } else {
            $cart = Cart::with(['user'])
                ->where(function ($query) use ($search) {
                    $query->where('session_id', 'like', "%$search%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
                ->paginate(5);
        }

        return view('admin_cart', ['cart' => $cart]);
    }

    public function showForm()
    {
        $cart = Cart::get();
        $users = User::get();

        return view('addcart', ['cart' => $cart, 'users' => $users]);
    }

    public function create(Request $request)
    {
        Cart::create([
            'user_id' => $request->user_id,
            'session_id' => $request->session_id,
            'created_at' => now()
        ]);
        return redirect()->route('admin.cart')->with('success', 'User Insert successfully!');
    }

    public function editcart(string $id)
    {
        $cart = Cart::where('id', $id)->first();
        $users = User::get();

        return view('editcart', ['data' => $cart, 'users' => $users]);
    }

    public function updatecart(Request $request)
    {
        // dd($request->id);
        $cart = Cart::where('id', $request->id)
            ->update([
                'user_id' => $request->user_id,
                'session_id' => $request->session_id,
                'updated_at' => now()
            ]);
        return redirect()->route('admin.cart')->with('success', 'User updated successfully!');
    }

    public function deletecart($id)
    {
        // dd($id);
        $cart = Cart::where('id', $id)
            ->delete();
        return redirect()->route('admin.cart')->with('success', 'Cart item deleted successfully!');
    }
}
