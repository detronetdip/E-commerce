<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCart extends Controller
{
    public function viewCart()
    {
        $title = "Cart";
        $data=compact('title');
        return view('cart')->with($data);
    }
}
