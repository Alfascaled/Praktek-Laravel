<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// });

Route::resource('products', ProductController::class);
Route::resource('tokos', TokoController::class);
Route::resource('stoks', StokController::class);

// Routes untuk tambah/kurang stok
Route::post('/stoks/{stok}/tambah', [StokController::class, 'tambahStok'])->name('stoks.tambah');
Route::post('/stoks/{stok}/kurang', [StokController::class, 'kurangStok'])->name('stoks.kurang');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'registerPost']);

Route::get('/logout', [AuthController::class, 'logout']);