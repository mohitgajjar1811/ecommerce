<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CartController extends Controller
{

    public function addtocart($id)
    {
        $product = Product::findOrFail($id);

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

    public function increaseQuantity($id)
    {
        $item = CartItem::findOrFail($id);
        $item->increment('quantity');
        $item->update(['total' => $item->quantity * $item->price]);

        return redirect()->back()->with('success', 'Quantity increased!');
    }

    public function decreaseQuantity($id)
    {
        $item = CartItem::findOrFail($id);
        if ($item->quantity > 1) {
            $item->decrement('quantity');
            $item->update(['total' => $item->quantity * $item->price]);
            return redirect()->back()->with('success', 'Quantity decreased!');
        }
        return redirect()->back()->with('error', 'Minimum quantity is 1');
    }

    public function removeFromCart($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item removed from cart!');
    }
  
}
