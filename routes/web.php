<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('owner')) {
        return redirect()->route('dashboard.owner');
    } elseif (auth()->user()->hasRole('karyawan')) {
        return redirect()->route('dashboard.karyawan');
    }

    abort(403);
})->middleware(['auth'])->name('dashboard');

// Dashboard untuk Owner
Route::get('/dashboard-owner', function () {
    return view('dashboard.owner');
})->middleware(['auth', 'role:owner'])->name('dashboard.owner');

// Dashboard untuk Karyawan
Route::get('/dashboard-karyawan', function () {
    return view('dashboard.karyawan');
})->middleware(['auth', 'role:karyawan'])->name('dashboard.karyawan');

Route::get('/absensi', [AbsensiController::class, 'index'])->middleware('role:owner');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
