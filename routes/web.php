<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
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

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/paket', function () {
    return view('paket');
})->name('paket');

Route::get('product-detail/{nama_paket}', ProductDetail::class)->name('detail');
Route::get('/paket-spesial/{nama_paket}', PaketSpesialDetail::class)->name('paket-spesial.detail');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


Route::middleware('auth')->group(function () {
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/invoice/{id}', [PesananController::class, 'generateInvoice'])->name('pesanan.invoice');
    Route::get('/pembayaran', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
