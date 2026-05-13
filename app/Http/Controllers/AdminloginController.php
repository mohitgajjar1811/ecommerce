<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminloginController extends Controller
{
    public function showadminloginform()
    {


        return view('admin.adminlogin');
    }

    public function Login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Check user by email + type
        $user = User::where('email', $email)
            ->where('type', 'admin')
            ->first();
        // dd($user);
        // Verify password
        if ($user && Hash::check($password, $user->password)) {

            // Login user
            Auth::login($user);

            // Redirect based on user type
            if ($user->type == 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Admin login successful!');
            }

            return redirect()->route('homepage')
                ->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid email, password, or user type');
    }
}
