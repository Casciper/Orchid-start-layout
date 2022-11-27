<?php

use App\Http\Controllers\AdminSlidesController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'mainPage'])->name('main-page');

Route::get('/all-items', [AdminSlidesController::class, 'getAllItems'])->name('all-items');
Route::get('/all-items-one-btn', [AdminSlidesController::class, 'getOneBtn'])->name('one-btn');
Route::get('/without-btn', [AdminSlidesController::class, 'getWithoutBtn'])->name('without-btn');
Route::get('/only-title', [AdminSlidesController::class, 'getOnlyTitle'])->name('only-title');
