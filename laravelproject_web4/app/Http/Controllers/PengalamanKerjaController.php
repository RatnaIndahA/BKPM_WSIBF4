<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    //// Menampilkan data
    public function index()
    {
        $data = DB::table('pengalaman_kerja')->get();
        return view('pengalaman_kerja.index', compact('data'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('pengalaman_kerja.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'tanggal_mulai' => 'required|date',
        ]);

        DB::table('pengalaman_kerja')->insert([
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('pengalaman.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = DB::table('pengalaman_kerja')->where('id', $id)->first();
        return view('pengalaman_kerja.edit', compact('data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'tanggal_mulai' => 'required|date',
        ]);

        DB::table('pengalaman_kerja')
            ->where('id', $id)
            ->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'posisi' => $request->posisi,
                'deskripsi' => $request->deskripsi,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'updated_at' => now()
            ]);

        return redirect()->route('pengalaman.index')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus data
    public function destroy($id)
    {
        DB::table('pengalaman_kerja')->where('id', $id)->delete();
        return redirect()->route('pengalaman.index')->with('success', 'Data berhasil dihapus');
    }
}

