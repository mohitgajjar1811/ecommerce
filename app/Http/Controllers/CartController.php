<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;

class CartController extends Controller
{
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
            'name' => $request->name,
            'short_name' => $request->short_name,
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
