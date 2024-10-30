<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\LoginController;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.dashboard');
});
    
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/actionlogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
    Route::get('/logout', [LoginController::class, 'actionLogout'])->name('actionLogout');
    Route::middleware(['auth'])->group(function (){
    });

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/tambah', [UserController::class, 'create']);
    Route::post('/user/simpan', [UserController::class, 'store']);
    Route::get('/user/{id}/show', [UserController::class, 'show']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/delete', [UserController::class, 'destroy']);
    
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk/tambah', [ProdukController::class, 'create']);
    Route::post('/produk/simpan', [ProdukController::class, 'store']);
    Route::get('/produk/{id}/show', [ProdukController::class, 'show']);
    Route::post('/produk/{id}/update', [ProdukController::class, 'update']);
    Route::get('/produk/{id}/delete', [ProdukController::class, 'destroy']);

    Route::get('/penjualan', [PenjualanController::class, 'index']);
    Route::post('/penjualan/tambah', [PenjualanController::class, 'create']);
    Route::get('/penjualan/transaksi/{id}', [PenjualanController::class, 'transaksi']);
    Route::post('/penjualan/update/{id}', [PenjualanController::class, 'update']);
    Route::post('/penjualan/store/{id}', [PenjualanController::class, 'store']);
    ROute::get('/penjualan/struk/{id}', [PenjualanController::class, 'cetak']);
    
    Route::post('/penjualan/scan', [DetailPenjualanController::class, 'store']);
    Route::get('/detailpenjualan/delete/{nobon}/{id_barang}', [DetailPenjualanController::class, 'destroy']);