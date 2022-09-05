<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfile extends Controller
{
    public function myProfile()
    {
        $title="My Profile";
        $data=compact('title');
        return view('myprofile')->with($data);
    }
}
