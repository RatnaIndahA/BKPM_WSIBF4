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

    // Menyimpan data pengalaman kerja
    public function store(Request $request)
    {
        // ✅ Validasi data yang masuk
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date_format:Y-m-d',
            'tanggal_selesai' => 'nullable|date_format:Y-m-d|after_or_equal:tanggal_mulai',
        ]);

        // ✅ Simpan data ke database
        DB::table('pengalaman_kerja')->insert([
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi, // Pastikan sesuai dengan input form
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ✅ Redirect dengan pesan sukses
        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil disimpan.');
    }
}
