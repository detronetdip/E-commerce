<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\UserAddress;
use App\Http\Controllers\UserCart;
use App\Http\Controllers\UserProfile;
use App\Http\Controllers\UserWallet;
use App\Http\Controllers\UserWishList;
use App\Http\Controllers\ViewProduct;

Route::get('/', [Home::class, 'index']);
Route::get('/view', [ViewProduct::class, 'viewProduct']);
Route::get('/user/profile', [UserProfile::class, 'myProfile']);
Route::get('/user/cart', [UserCart::class, 'viewCart']);
Route::get('/user/wishlist', [UserWishList::class, 'viewWishlist']);
Route::get('/user/wallet', [UserWallet::class, 'viewWallet']);
Route::get('/user/address', [UserAddress::class, 'viewAllAddress']);
