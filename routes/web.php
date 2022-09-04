<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\ViewProduct;

Route::get('/', [Home::class, 'index']);
Route::get('/View', [ViewProduct::class, 'viewProduct']);

