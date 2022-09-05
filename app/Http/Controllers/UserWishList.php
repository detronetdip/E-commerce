<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserWishList extends Controller
{
    public function viewWishlist()
    {
        $title="My Wishlist";
        $data=compact('title');
        return view('myprofile')->with($data);
    }
}
