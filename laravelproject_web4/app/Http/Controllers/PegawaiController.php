<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // public function index($nama){
    //     return $nama;
    // }
    // public function index(Request $request){
    //     return $request->segment(1);
    // }
    public function index(Request $request){
        return $request->segment(2);
    }
    public function formulir(){
        return view('formulir');
    }
    
    public function proses(Request $request){
        // Tambahkan validasi
        $request->validate([
            'nama' => 'required|min:3|max:20',
            'alamat' => 'required|string',
        ]);

        return "Nama: " . $request->nama . ", Alamat: " . $request->alamat;
    }
}
