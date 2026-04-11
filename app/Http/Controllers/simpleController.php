<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class simpleController extends Controller
{
    public function simple()
    {
        $users2 = [
            1=>['name'=>"Mohit"],
            2=>['name'=>"Maulik"],
            3=>['name'=>"Jay",],
            4=>['name'=>"Vikas"],
        ];
        return view('simple',['users2'=>$users2]);
    }
}