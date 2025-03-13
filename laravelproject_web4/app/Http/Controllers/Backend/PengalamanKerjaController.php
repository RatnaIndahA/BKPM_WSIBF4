<?php

namespace App\Http\Controllers\Backend; // Namespace harus huruf besar di Backend

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PengalamanKerjaController extends Controller
{
    // Menampilkan halaman index pengalaman kerja
    public function index()
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    // Menampilkan form tambah pengalaman kerja
    public function create()
    {
        $pengalaman_kerja = null;
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }

    // Menampilkan form edit pengalaman kerja
    public function edit($id)
{
    $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();

    if (!$pengalaman_kerja) {
        return redirect()->route('pengalaman_kerja.index')->with('error', 'Data tidak ditemukan.');
    }

    return view('backend.pengalaman_kerja.edit', compact('pengalaman_kerja'));
}

    // Menyimpan data pengalaman kerja
    public function store(Request $request)
{
    $request->validate([
        'nama_perusahaan' => 'required|string|max:255',
        'posisi' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date_format:Y-m-d',
        'tanggal_selesai' => 'nullable|date_format:Y-m-d|after_or_equal:tanggal_mulai',
    ]);

    DB::table('pengalaman_kerja')->insert([
        'nama_perusahaan' => $request->nama_perusahaan,
        'posisi' => $request->posisi,
        'deskripsi' => $request->deskripsi, // Simpan deskripsi
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil disimpan.');
}
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_perusahaan' => 'required|string|max:255',
        'posisi' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
    ]);

    DB::table('pengalaman_kerja')->where('id', $id)->update([
        'nama_perusahaan' => $request->nama_perusahaan,
        'posisi' => $request->posisi,
        'deskripsi' => $request->deskripsi, // Update deskripsi
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'updated_at' => now(),
    ]);

    return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil diperbarui.');
}
    public function destroy($id)
{
    // Cek apakah data ada
    $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
    
    if (!$pengalaman_kerja) {
        return redirect()->route('pengalaman_kerja.index')->with('error', 'Data tidak ditemukan.');
    }

    // Hapus data
    DB::table('pengalaman_kerja')->where('id', $id)->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil dihapus.');
}
}
