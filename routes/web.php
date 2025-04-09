<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\ItemAjax; // Import controller-nya

Route::get('/', function () {
    return view('welcome');
});

// Route prefix untuk semua fitur item
Route::prefix('item')->group(function () {
    Route::get('/', [ItemAjax::class, 'index']); // Menampilkan halaman utama (view)
    Route::post('/store', [ItemAjax::class, 'store']); // Menyimpan barang baru
    Route::get('/edit/{id}', [ItemAjax::class, 'edit']); // Mengambil data untuk diedit
    Route::post('/update/{id}', [ItemAjax::class, 'update']); // Mengupdate data barang
    Route::post('/delete/{id}', [ItemAjax::class, 'destroy']); // Menghapus barang
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
