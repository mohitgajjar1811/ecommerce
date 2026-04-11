<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpController1 extends Controller
{
    public function exp()
    {
        // dd("i am in controller");
        $users1 = [
            1=>['name'=>"Rohan","age"=>20,"education"=>"MCA"],
            2=>['name'=>"Mann","age"=>25,"education"=>"BCA"],
            3=>['name'=>"Vivek","age"=>23,"education"=>"BSC"],
            4=>['name'=>"Yogi","age"=>22,"education"=>"MSC"],
        ];  
        return view('exp',['users1'=>$users1]);
    }
}