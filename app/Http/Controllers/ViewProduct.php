<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewProduct extends Controller
{
    public function viewProduct()
    {
        $title = "Product";
        $data=compact('title');
        return view('product')->with($data);
    }
}
