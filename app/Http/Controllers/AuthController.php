<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showloginform(Request $request)
    {


        return view('user.login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // User logout

        $request->session()->invalidate(); // Session destroy
        $request->session()->regenerateToken(); // New CSRF token

        return redirect('/login')->with('success', 'Logged out successfully');
    }

    public function showregistrationform(Request $request)
    {


        return view('user.registration');
    }

    public function createcustomer(Request $request)
    {
        // dd($request);
        $sessioncart = session()->get('cart', []);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'type' => 'customer',
            'password' => Hash::make($request->password),
            'created_at' => now()
        ]);

        Auth::login($user);

        $cart = Cart::firstOrCreate([
            'user_id' => $user->id,
            'session_id' => session()->getId()
        ]);

        foreach ($sessioncart as $productId => $details) {

            $product = Product::findOrFail($productId);

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += $details['quantity'];
                $cartItem->total = $cartItem->quantity * $cartItem->price;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'quantity' => $details['quantity'],
                    'price' => $product->price,
                    'total' => $product->price * $details['quantity'],
                ]);
            }
        }

        session()->forget('cart');

        return redirect()->route('cartpage')->with('success', 'Register successfully!');
    }

    public function Login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {

            // First login user
            Auth::login($user);

            // Guest session cart
            $sessionCart = session()->get('cart', []);

            if (!empty($sessionCart)) {

                $cart = Cart::firstOrCreate([
                    'user_id' => Auth::id()
                ]);

                foreach ($sessionCart as $productId => $details) {

                    $product = Product::findOrFail($productId);

                    $cartItem = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $productId)
                        ->first();

                    if ($cartItem) {
                        $cartItem->quantity += $details['quantity'];
                        $cartItem->total = $cartItem->quantity * $cartItem->price;
                        $cartItem->save();
                    } else {
                        CartItem::create([
                            'cart_id' => $cart->id,
                            'product_id' => $productId,
                            'quantity' => $details['quantity'],
                            'price' => $product->price,
                            'total' => $product->price * $details['quantity'],
                        ]);
                    }
                }

                // Clear guest cart
                session()->forget('cart');
            }

            return redirect()->route('homepage')->with('success', 'Login successfully!');
        }

        return back()->with('error', 'Invalid email or password');
    }
}
