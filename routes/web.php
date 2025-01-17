<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\pemesananController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\tiketController;
use Database\Seeders\tiketSeeder;
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
// 'guest' alias melakukan proses redirect, agar akun yang mengarah ke halaman kita sudah melakukan login
Route::middleware(['guest'])->group(function(){
    //------- Halaman utama sebelum LOGIN -------
    Route::get('/', [eventController::class, 'index']);

    //------- RUTE LOGIN -------
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [roleController::class, 'login']);

    //------- RUTE REGISTER -------
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [roleController::class, 'store']);
});

// Route setelah Login
Route::middleware(['auth'])->group(function(){
    //------- Halaman Pelanggan setelah LOGIN --------
    Route::get('/pelanggan', [eventController::class, 'index'])->name('index.pelanggan');
    Route::get('/pelanggan/detail/{event_id}', [roleController::class, 'detail'])->name('detail.event');
    Route::get('/pelanggan/pemesanan/{event_id}', [tiketController::class, 'pemesanan'])->name('pelanggan.pemesanan');
    Route::post('/pelanggan/checkout/', [tiketController::class, 'storePemesanan'])->name('checkout.pemesanan');
    Route::get('/pelanggan/detail-pemesanan', [tiketController::class, 'detailPemesanan'])->name('pelanggan.detail-pemesanan');
    Route::post('/pelanggan/pemesanan/checkout', [pemesananController::class, 'checkout'])->name('pemesanan.checkout');
    Route::get('/pelanggan/pembayaran', [pemesananController::class, 'pembayaran'])->name('pelanggan.pembayaran');
    Route::post('/pelanggan/detail-pembayaran', [pemesananController::class, 'detailPembayaran'])->name('pelanggan.detail-pembayaran');
    Route::get('/pelanggan/riwayat/{user_id}', [pemesananController::class, 'riwayat'])->name('pelanggan.riwayat');
    //------ ROUTE ADMIN -------
    Route::get('/admin/dashboard', [adminController::class, 'dashboard'])->name('admin.dashboard');
    //------ DATA USER ------
    Route::get('/admin', [roleController::class, 'admin']);//->middleware('userAkses:admin');
    Route::get('/admin/admin', [adminController::class, 'admin'])->name('admin.admin');
    Route::get('/admin/admin/create', [adminController::class, 'createAdmin'])->name('admin.create');
    Route::post('/admin/admin/store', [adminController::class, 'storeAdmin'])->name('admin.store');
    Route::delete('/admin/admin/destroy/{user_id}', [adminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/pelanggan', [adminController::class, 'pelanggan'])->name('admin.pelanggan');

    //------ DATA EVENT -----
    Route::get('/admin/event', [eventController::class, 'event'])->name('admin.event');
    Route::get('/admin/event/create', [eventController::class, 'create'])->name('event.create');
    Route::post('/admin/event/store', [eventController::class, 'store'])->name('event.store');
    Route::get('/admin/event/detail/{event_id}', [eventController::class, 'show'])->name('event.detail');
    Route::get('/admin/event/edit/{event_id}', [eventController::class, 'edit'])->name('event.edit');
    Route::put('/admin/event/update/{event_id}', [eventController::class, 'update'])->name('event.update');
    Route::delete('/admin/event/destroy/{event_id}', [eventController::class, 'destroy'])->name('event.destroy');

    //------ DATA TIKET -----
    Route::get('admin/tiket/', [tiketController::class, 'index'])->name('admin.tiket');
    Route::get('admin/tiket/show/{tiket_id}', [tiketController::class, 'show'])->name('tiket.show');
    Route::get('admin/tiket/detail/{event_id}', [tiketController::class, 'detail'])->name('tiket.detail');
    Route::get('/admin/tiket/create/{event_id}', [tiketController::class, 'create'])->name('tiket.create');
    Route::post('/admin/tiket/store/{event_id}', [tiketController::class, 'store'])->name('tiket.store');
    Route::get('/admin/tiket/edit/{tiket_id}', [tiketController::class, 'edit'])->name('tiket.edit');
    Route::put('/admin/tiket/update/{tiket_id}', [tiketController::class, 'update'])->name('tiket.update');
    Route::delete('/admin/tiket/destroy/{tiket_id}', [tiketController::class, 'destroy'])->name('tiket.destroy');

    //------ PEMESANAN -----
    Route::get('/admin/pemesanan', [pemesananController::class, 'index'])->name('admin.pemesanan');
    Route::get('/admin/pemesanan/show', [pemesananController::class, 'showPemesanan'])->name('pemesanan.index');
    Route::get('/admin/pemesanan/edit/{pemesanan_id}', [pemesananController::class, 'edit'])->name('pemesanan.edit');
    Route::put('/admin/pemesanan/update/{pemesanan_id}', [pemesananController::class, 'update'])->name('pemesanan.update');
    Route::get('/admin/pemesanan/transaksi', [pemesananController::class, 'transaksi'])->name('pemesanan.transaksi');

    //------ LOGOUT -----
    Route::get('/logout', [roleController::class, 'logout']);
});


Route::get('/welocme', function () {
    return view('welcome');
});
