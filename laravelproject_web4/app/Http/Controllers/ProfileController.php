<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        // return 'Hallo ini adalah method index, dalam controller ProfileManagemennt';
        $nama = "Ratna Indah Anggraini";
        $pelajaran = ["Algoritma & Pemograman", "Kalkulus", "Pemograman web"];
        return view('dashboard', compact('nama','pelajaran'));
    }

    // public function create(){
    //     return 'Method digunakan untuk menampilkan form menambahkan data user';
    // }

//     public function store(Request $request){
//         return 'Mtehod digunakan untuk menciptakan data user baru';
//     }

//     public function show($id){
//         return 'Method ini digunakan untuk mengambil satu data user dengan id='.$id;
//     }

//     public function edit($id){
//         return 'Method untuk menampilkan form untuk mengubah data dengan id='.$id;
//     }

//     public function update(Request $request, $id){
//         return 'Method ini digunakan untuk mengubah data user dengan id='.$id;
//     }

//     public function destory($id){
//         return 'Method ini digunakan untuk menghapus data user dengan id='.$id;
//     }
 }