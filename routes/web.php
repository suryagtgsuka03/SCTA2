<?php

use App\Http\Controllers\TOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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
Route::get('/torder', [HomeController::class, 'torder'])->name('torder')->middleware('auth');
Route::get('/pengeluaran', [HomeController::class, 'pengeluaran'])->name('pengeluaran')->middleware('auth');


Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::post('/monitor', [SupirController::class, 'store'])->name('monitor.post')->middleware('auth');
Route::get('/monitor', [SupirController::class, 'index'])->name('monitor.get')->middleware('auth');
Route::get('/monitor/{id}/edit', [SupirController::class, 'edit'])->name('monitor.edit')->middleware('auth');
Route::put('/monitor/{id}', [SupirController::class, 'update'])->name('monitor.update')->middleware('auth');
Route::delete('/supir/{id}', [SupirController::class, 'destroy'])->name('supir.destroy')->middleware('auth');

Route::post('/torder', [TOrderController::class, 'store'])->name('torder.store')->middleware('auth');
Route::get('/torder', [TOrderController::class, 'index'])->name('torder.index')->middleware('auth');
Route::get('/torder/{id}/edit', [TOrderController::class, 'edit'])->name('torder.edit')->middleware('auth');
Route::put('/torder/{id}', [TOrderController::class, 'update'])->name('torder.update')->middleware('auth');
Route::delete('/torder/{id}', [TOrderController::class, 'destroy'])->name('torder.destroy')->middleware('auth');


Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store')->middleware('auth');
Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index')->middleware('auth');
Route::delete('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy')->middleware('auth');
Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update')->middleware('auth');
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit')->middleware('auth');