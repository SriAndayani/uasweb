<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\usersController;
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
    //daftarkan login
    Route::get('/', [roleController::class, 'index'])->name('welcome'); //bakal jadi redirect ke halaman utama
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [roleController::class, 'login']);
});

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RoleController::class, 'store']);

Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [usersController::class, 'index']);
    Route::get('/admin', [usersController::class, 'admin']);//->middleware('userAkses:admin');
    Route::get('/penyelenggara', [usersController::class, 'penyelenggara']);//->middleware('userAkses:penyelenggara');
    Route::get('/pelanggan', [usersController::class, 'pelanggan']);//->middleware('userAkses:pelanggan');
    // daftarkan logout
    Route::get('/logout', [roleController::class, 'logout']);
});


