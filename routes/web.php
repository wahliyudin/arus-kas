<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\PemasokController;
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

Route::get('akun', [AkunController::class, 'index'])->name('akun.index');
Route::post('akun/list', [AkunController::class, 'list'])->name('akun.list');
Route::post('akun/store', [AkunController::class, 'store'])->name('akun.store');
Route::post('akun/{akun}/edit', [AkunController::class, 'edit'])->name('akun.edit');
Route::delete('akun/{akun}/destroy', [AkunController::class, 'destroy'])->name('akun.destroy');

Route::get('pemasok', [PemasokController::class, 'index'])->name('pemasok.index');
Route::post('pemasok/list', [PemasokController::class, 'list'])->name('pemasok.list');
Route::post('pemasok/store', [PemasokController::class, 'store'])->name('pemasok.store');
Route::post('pemasok/{pemasok}/edit', [PemasokController::class, 'edit'])->name('pemasok.edit');
Route::delete('pemasok/{pemasok}/destroy', [PemasokController::class, 'destroy'])->name('pemasok.destroy');