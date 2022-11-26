<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/all-items', 'admin.slides.style-layout.all-items');
Route::view('/all-items-one-btn', 'admin.slides.style-layout.all-items-one-btn');
Route::view('/without-btn', 'admin.slides.style-layout.without-btn');
Route::view('/only-title', 'admin.slides.style-layout.only-title');
