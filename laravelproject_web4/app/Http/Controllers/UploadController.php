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
            'file.*' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required',
        ], [
            'file.*.required' => 'File gambar wajib diunggah.',
            'file.*.mimes' => 'Format file harus jpg, jpeg, png, atau gif.',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
            'keterangan.required' => 'Keterangan wajib diisi.'
        ]);

        $tujuan_upload = public_path('data_file');
        if (!File::isDirectory($tujuan_upload)) {
            File::makeDirectory($tujuan_upload, 0777, true);
        }

        foreach ($request->file('file') as $file) {
            $file->move($tujuan_upload, $file->getClientOriginalName());
        }

        return back()->with('success', 'File berhasil diupload!');
    }

    public function resize_upload(Request $request)
    {
        $request->validate([
            'file.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required',
        ]);

        $path = public_path('img/logo');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        foreach ($request->file('file') as $file) {
            $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath())->fit(200, 200);
            $image->save($path . '/' . $fileName);
        }

        return redirect()->route('upload')->with('success', 'Data berhasil ditambahkan!');
    }

    public function dropzone()
    {
        return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $imageNames = [];
        foreach ($request->file('file') as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('img/dropzone'), $imageName);
            $imageNames[] = $imageName;
        }

        return response()->json(['success' => $imageNames]);
    }

    public function pdf_upload()
    {
        return view('pdf_upload');
    }

    public function pdf_store(Request $request)
    {
        $pdfNames = [];
        foreach ($request->file('file') as $pdf) {
            $pdfName = 'pdf_' . time() . '_' . uniqid() . '.' . $pdf->extension();
            $pdf->move(public_path('pdf/dropzone'), $pdfName);
            $pdfNames[] = $pdfName;
        }

        return response()->json(['success' => $pdfNames]);
    }
}