<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddress extends Controller
{
    public function viewAllAddress()
    {
        $title="My Address";
        $data=compact('title');
        return view('myprofile')->with($data);
    }
}
