<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class OrdersummaryController extends Controller
{
    public function ordersummary()
    {
        return view('ordersummary');
    }
}