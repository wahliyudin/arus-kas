<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (auth()->guard()) {
        return to_route('login');
    }
    return to_route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('klasifikasi', [KlasifikasiController::class, 'index'])->name('klasifikasi.index');
Route::post('klasifikasi/list', [KlasifikasiController::class, 'list'])->name('klasifikasi.list');
Route::post('klasifikasi/store', [KlasifikasiController::class, 'store'])->name('klasifikasi.store');
Route::post('klasifikasi/{klasifikasi}/edit', [KlasifikasiController::class, 'edit'])->name('klasifikasi.edit');
Route::delete('klasifikasi/{klasifikasi}/destroy', [KlasifikasiController::class, 'destroy'])->name('klasifikasi.destroy');

Route::get('akun', [AkunController::class, 'index'])->name('akun.index');
Route::post('akun/list', [AkunController::class, 'list'])->name('akun.list');
Route::post('akun/store', [AkunController::class, 'store'])->name('akun.store');
Route::post('akun/{value}/get-number', [AkunController::class, 'getNumber'])->name('akun.get-number');
Route::post('akun/{akun}/edit', [AkunController::class, 'edit'])->name('akun.edit');
Route::delete('akun/{akun}/destroy', [AkunController::class, 'destroy'])->name('akun.destroy');

Route::get('pemasok', [PemasokController::class, 'index'])->name('pemasok.index');
Route::post('pemasok/list', [PemasokController::class, 'list'])->name('pemasok.list');
Route::post('pemasok/store', [PemasokController::class, 'store'])->name('pemasok.store');
Route::post('pemasok/{pemasok}/edit', [PemasokController::class, 'edit'])->name('pemasok.edit');
Route::delete('pemasok/{pemasok}/destroy', [PemasokController::class, 'destroy'])->name('pemasok.destroy');

Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::post('siswa/list', [SiswaController::class, 'list'])->name('siswa.list');
Route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::post('siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::delete('siswa/{siswa}/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('transaksi/list', [TransaksiController::class, 'list'])->name('transaksi.list');
Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::post('transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::delete('transaksi/{transaksi}/destroy', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');