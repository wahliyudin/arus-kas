<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index');
    }

    public function list()
    {
        $data = Siswa::query()->get();
        return DataTables::of($data)
            ->editColumn('check', function (Siswa $siswa) {
                return view('siswa.checkbox', compact('siswa'))->render();
            })
            ->editColumn('action', function (Siswa $siswa) {
                return view('siswa.action', compact('siswa'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Siswa::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'nis' => $request->nis,
                'no_hp' => $request->no_hp,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Siswa $siswa)
    {
        try {
            return response()->json($siswa);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Siswa $siswa)
    {
        try {
            $siswa->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}