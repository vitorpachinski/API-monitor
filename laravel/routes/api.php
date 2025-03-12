<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\OfferController;
use App\Http\Controllers\api\ProductDetails;

use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('offers', OfferController::class);
Route::resource('product-details', ProductDetails::class);
