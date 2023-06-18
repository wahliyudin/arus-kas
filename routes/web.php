<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\ArusKasController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurnalUmumController;
use App\Http\Controllers\KasKeluarController;
use App\Http\Controllers\KasMasukController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SiswaController;
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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
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

        Route::get('guru', [GuruController::class, 'index'])->name('guru.index');
        Route::post('guru/list', [GuruController::class, 'list'])->name('guru.list');
        Route::post('guru/store', [GuruController::class, 'store'])->name('guru.store');
        Route::post('guru/{guru}/edit', [GuruController::class, 'edit'])->name('guru.edit');
        Route::delete('guru/{guru}/destroy', [GuruController::class, 'destroy'])->name('guru.destroy');

        Route::get('pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::post('pengguna/list', [PenggunaController::class, 'list'])->name('pengguna.list');
        Route::post('pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::post('pengguna/{user}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::delete('pengguna/{user}/destroy', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

        Route::get('kas-masuk', [KasMasukController::class, 'index'])->name('kas-masuk.index');
        Route::post('kas-masuk/list', [KasMasukController::class, 'list'])->name('kas-masuk.list');
        Route::get('kas-masuk/create', [KasMasukController::class, 'create'])->name('kas-masuk.create');
        Route::post('kas-masuk/store', [KasMasukController::class, 'store'])->name('kas-masuk.store');
        Route::get('kas-masuk/{kasMasuk:kode}/edit', [KasMasukController::class, 'edit'])->name('kas-masuk.edit');
        Route::post('kas-masuk/{kasMasuk:kode}/update', [KasMasukController::class, 'update'])->name('kas-masuk.update');
        Route::delete('kas-masuk/{kasMasuk:kode}/destroy', [KasMasukController::class, 'destroy'])->name('kas-masuk.destroy');

        Route::get('kas-keluar', [KasKeluarController::class, 'index'])->name('kas-keluar.index');
        Route::post('kas-keluar/list', [KasKeluarController::class, 'list'])->name('kas-keluar.list');
        Route::get('kas-keluar/create', [KasKeluarController::class, 'create'])->name('kas-keluar.create');
        Route::post('kas-keluar/store', [KasKeluarController::class, 'store'])->name('kas-keluar.store');
        Route::get('kas-keluar/{kasKeluar:kode}/edit', [KasKeluarController::class, 'edit'])->name('kas-keluar.edit');
        Route::post('kas-keluar/{kasKeluar:kode}/update', [KasKeluarController::class, 'update'])->name('kas-keluar.update');
        Route::delete('kas-keluar/{kasKeluar:kode}/destroy', [KasKeluarController::class, 'destroy'])->name('kas-keluar.destroy');
    });

    Route::middleware(['role:admin,kepala_sekolah'])->group(function () {
        Route::get('buku-besar', [BukuBesarController::class, 'index'])->name('buku-besar.index');
        Route::post('buku-besar/datatable', [BukuBesarController::class, 'datatable'])->name('buku-besar.datatable');
        Route::post('buku-besar/export', [BukuBesarController::class, 'export'])->name('buku-besar.export');

        Route::get('jurnal-umum', [JurnalUmumController::class, 'index'])->name('jurnal-umum.index');
        Route::post('jurnal-umum/datatable', [JurnalUmumController::class, 'datatable'])->name('jurnal-umum.datatable');
        Route::post('jurnal-umum/export', [JurnalUmumController::class, 'export'])->name('jurnal-umum.export');

        Route::get('arus-kas', [ArusKasController::class, 'index'])->name('arus-kas.index');
        Route::post('arus-kas/datatable', [ArusKasController::class, 'datatable'])->name('arus-kas.datatable');
        Route::post('arus-kas/export', [ArusKasController::class, 'export'])->name('arus-kas.export');
        Route::post('arus-kas/excel', [ArusKasController::class, 'excel'])->name('arus-kas.excel');
    });
});
