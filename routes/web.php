<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketController;
use App\Livewire\PaketSpesialDetail;
use App\Livewire\ProductDetail;
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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/paket', function () {
    return view('paket');
})->name('paket');

Route::get('product-detail/{nama_paket}', ProductDetail::class)->name('detail');
Route::get('/paket-spesial/{nama_paket}', PaketSpesialDetail::class)->name('paket-spesial.detail');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
