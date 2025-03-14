<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required',
        ], [
            'file.required' => 'File gambar wajib diunggah.',
            'file.mimes' => 'Format file harus jpg, jpeg, png, atau gif.',
            'file.max' => 'Ukuran file maksimal 2MB.',
            'keterangan.required' => 'Keterangan wajib diisi.'
        ]);

        // Menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // Informasi file
        echo 'File Name: ' . $file->getClientOriginalName() . '<br>';
        echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>';
        echo 'File Real Path: ' . $file->getRealPath() . '<br>';
        echo 'File Size: ' . $file->getSize() . '<br>';
        echo 'File Mime Type: ' . $file->getMimeType();

        // Folder tujuan upload
        $tujuan_upload = public_path('data_file');

        // Jika folder belum ada, buat folder
        if (!File::isDirectory($tujuan_upload)) {
            File::makeDirectory($tujuan_upload, 0777, true);
        }

        // Upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        return back()->with('success', 'File berhasil diupload!');
    }

    public function resize_upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required',
        ]);

        // Tentukan path lokasi upload
        $path = public_path('img/logo');

        // Jika folder belum ada, buat foldernya
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // Ambil file dari form
        $file = $request->file('file');

        // Buat nama file unik
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Resize dan crop gambar menggunakan Intervention Image
        $image = Image::make($file->getRealPath())->fit(200, 200);

        // Simpan hasil gambar ke folder
        $image->save($path . '/' . $fileName);

        return redirect()->route('upload')->with('success', 'Data berhasil ditambahkan!');
    }
}
