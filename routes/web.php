<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])
    ->whereNumber('id')->name('transaksi.show');
Route::get('/kategori/{kategori}', [TransaksiController::class, 'perKategori'])->name('transaksi.kategori');
Route::get('/periode/{bulan}', [TransaksiController::class, 'perPeriode'])
    ->where('bulan', '\d{4}-\d{2}')->name('transaksi.periode');

Route::get('/laporan/laba-rugi', [LaporanController::class, 'labaRugi'])->name('laporan.labarugi');
Route::get('/laporan/laba-rugi/{bulan}', [LaporanController::class, 'labaRugi'])
    ->where('bulan', '\d{4}-\d{2}')->name('laporan.labarugi.bulan');
Route::get('/laporan/analisis', [LaporanController::class, 'analisis'])->name('laporan.analisis');