<?php

namespace App\Http\Controllers;

use App\Models\KasKeluar;
use App\Models\KasMasuk;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function index()
    {
        $kasMasuks = KasMasuk::query()->get();
        $kasKeluars = KasKeluar::query()->get();
        return view('buku-besar.index', compact('transaksis'));
    }
}
