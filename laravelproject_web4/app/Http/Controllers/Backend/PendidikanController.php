<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendidikan; // Pastikan model sudah diimport

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index',compact('pendidikan'));
    }

    public function create()
    {
        $pendidikan = null;
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string|max:50',
            'tahun_masuk' => 'required|integer',
            'tahun_lulus' => 'nullable|integer|gte:tahun_masuk',
        ]);

        // Simpan ke database
        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan baru telah berhasil disimpan.');
    }
}
