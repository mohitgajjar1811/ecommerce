<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(Request $request)
    {
        // dd("i am in controller");
        // $name = "Mohit Patel";
        // return view('admin.users',['name'=>$name]);
        // $users = [
        //     1=>['name'=>"Mohit","age"=>20,"education"=>"MCA"],
        //     2=>['name'=>"Maulik","age"=>25,"education"=>"BCA"],
        //     3=>['name'=>"Jay","age"=>23,"education"=>"B.Com"],
        //     4=>['name'=>"Vikas","age"=>22,"education"=>"BBA"],
        // ];
        // DB::enableQueryLog();
        // $users = DB::table('users')->get(); // all data get from table
        $search = $request->search;

        if ($search == null) {
            $users = User::paginate(5);
        } else {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
                ->paginate(5);
        }
        // dd(DB::getQueryLog());
        // dd($users);
        return view('admin.users', ['users' => $users]);
    }

    public function showForm()
    {
        return view('admin.adduser');
    }


    public function create(Request $request)
    {
        // dd($request);
        User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            // 'password' => Hash::make($request->email),
            'created_at' => now()
        ]);
        return redirect()->route('user.show')->with('success', 'User Insert successfully!');
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
        return redirect()->route('user.show')->with('success', 'User updated successfully!');
    }


    public function deleteUser($id)
    {
        // dd($id);
        User::where('id', $id)
            ->delete();
        return redirect()->route('user.show')->with('success', 'User deleted successfully!');
    }
}


// create route 
// create controller and method and inside method logic