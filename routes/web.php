<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SupirController;


Route::get('/', function () {
    return view('public.index');
});

Route::get('/test', function () {
    return view('private.test');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/monitor', [HomeController::class, 'monitor'])->name('monitor')->middleware('auth');
Route::get('/invoice', [HomeController::class, 'invoice'])->name('invoice')->middleware('auth');
Route::get('/pembukuan', [HomeController::class, 'pembukuan'])->name('pembukuan')->middleware('auth');
Route::get('/pengeluaran', [HomeController::class, 'pengeluaran'])->name('pengeluaran')->middleware('auth');


Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::post('/monitor', [SupirController::class, 'store'])->name('monitor.post')->middleware('auth');
Route::get('/monitor', [SupirController::class, 'index'])->name('monitor.get')->middleware('auth');

Route::post('/pembukuan', [PemasukanController::class, 'store'])->name('pemasukan.store')->middleware('auth');
Route::get('/pembukuan', [PemasukanController::class, 'index'])->name('pemasukan.index')->middleware('auth');
Route::delete('/pembukuan/{pemasukan}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy')->middleware('auth');
Route::put('/pemasukan/{id}', [PemasukanController::class, 'update'])->name('pemasukan.update')->middleware('auth');
Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit'])->name('pemasukan.edit')->middleware('auth');

Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store')->middleware('auth');
Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index')->middleware('auth');
Route::delete('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy')->middleware('auth');
Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update')->middleware('auth');
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit')->middleware('auth');