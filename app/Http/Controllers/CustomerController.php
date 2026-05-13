<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(Request $request)
    {
        $search = $request->search;
        
        
        if ($search == null) {
            $users = User::whereIn('type', ['customer'])->paginate(5);
        } else {
            $users = User::whereIn('type', ['customer'])
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->paginate(5);
        }
        // dd(DB::getQueryLog());
        // dd($users);
        return view('customer', ['users' => $users]);
    }

    public function showForm()
    {
        return view('addcustomer');
    }


    public function create(Request $request)
    {
        // dd($request);
        User::create([
            'name' => $request->name,
            'type' => 'customer',
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'created_at' => now()
        ]);
        return redirect()->route('customer.show')->with('success', 'User Insert successfully!');
    }

    public function editUser(string $id)
    {

        $users = User::where('id', $id)->first();

        return view('admin.editusers', ['data' => $users]);
    }

    public function updateUser(Request $request)
    {
        // dd($request->id);
        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now()
            ]);
        //  dd($result);
        return redirect()->route('customer.show')->with('success', 'User updated successfully!');
    }


    public function deleteUser($id)
    {
        // dd($id);
        User::where('id', $id)
            ->delete();
        return redirect()->route('customer.show')->with('success', 'User deleted successfully!');
    }
}


// create route 
// create controller and method and inside method logic