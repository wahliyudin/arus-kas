<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use App\Models\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index');
    }

    public function list()
    {
        $data = Guru::query()->get();
        return DataTables::of($data)
            ->editColumn('jenis_kelamin', function (Guru $guru) {
                return $guru->jenis_kelamin?->label();
            })
            ->editColumn('check', function (Guru $guru) {
                return view('guru.checkbox', compact('guru'))->render();
            })
            ->editColumn('action', function (Guru $guru) {
                return view('guru.action', compact('guru'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Guru::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Guru $guru)
    {
        try {
            return response()->json($guru);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Guru $guru)
    {
        try {
            $guru->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new GuruImport, $request->file('file'));
            return response()->json([
                'message' => 'Berhasil diimport'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
