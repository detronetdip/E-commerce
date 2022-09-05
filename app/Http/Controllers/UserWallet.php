<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserWallet extends Controller
{
    public function viewWallet()
    {
        $title="My Wallet";
        $data=compact('title');
        return view('myprofile')->with($data);
    }
}
