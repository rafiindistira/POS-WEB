<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\ItemAjax; // Import controller-nya
use App\Http\Controllers\Api\ItemApiController;
use App\Http\Controllers\Api\SaleApiController;
use App\Http\Controllers\Api\ExpenseApiController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BranchController;


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
    Route::resource('sales', SaleController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('items', ItemController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('branches', BranchController::class);
});

// TEMPATKAN DI web.php (bukan api.php)
Route::prefix('api')->group(function () {
    Route::apiResource('items', ItemApiController::class);
    Route::apiResource('sales', SaleApiController::class);
    Route::apiResource('expenses', ExpenseApiController::class);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

