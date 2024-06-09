<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/paket', function() {
    return view('paket');
})->name('paket');

Route::get('product-detail', function() {
    return view('content.detail');
})->name('detail');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
