<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            $users = User::whereIn('type', ['admin', 'employee'])->paginate(5);
        } else {
            $users = User::whereIn('type', ['admin', 'employee'])
                ->where(function ($query) use ($search) {
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
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'type' => 'employee',
            'email' => $request->email,
            'password' => Hash::make($request->email),
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

    public function showProfile(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect('/login')->with('error', 'Please login to access your profile');
        }
        return view('profile', ['data' => $user]);
    }


    public function editProfile(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect('/login')->with('error', 'Please login to access your profile');
        }
        return view('editprofile', ['data' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        // dd($userId);
        User::where('id', $userId)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'updated_at' => now()
            ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function showChangePasswordForm(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login to access your profile');
        }

        return view('changepassword', [
            'data' => Auth::user()
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();
        $userId = Auth::id();
        // dd($request);
        if (!$user) {
            return redirect('/login')->with('error', 'Please login to access your profile');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect');
        }

        User::where('id', $userId)
        ->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now()
        ]);

        return redirect()->route('profile')->with('success', 'Password updated successfully!');
    }
}


// create route 
// create controller and method and inside method logic