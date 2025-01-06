<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\roleController;
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
    Route::get('/dashboard', [roleController::class, 'pelanggan'])->name('pelanggan');//->middleware('userAkses:pelanggan');

    //------ ROUTE ADMIN -------
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
    Route::get('/admin/event/detail/{event_id}', [eventController::class, 'show'])->name('event.detail');
    Route::get('/admin/event/edit/{event_id}', [eventController::class, 'edit'])->name('event.edit');
    Route::put('/admin/event/update/{event_id}', [eventController::class, 'update'])->name('event.update');

    // daftarkan logout
    Route::get('/logout', [roleController::class, 'logout']);
});


