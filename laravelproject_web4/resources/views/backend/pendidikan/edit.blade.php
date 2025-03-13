@extends('backend.layouts.template')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Edit Pengalaman Kerja</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                    <li><i class="fa fa-edit"></i>Edit</li>
                </ol>
            </div>
        </div>
        <!-- Form Edit -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Edit Pengalaman Kerja</header>
                    <div class="panel-body">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                    <form method="POST" action="{{ route('pendidikan.update', $pendidikan->id) }}">
                    @csrf
                    @method('PUT')
                
                <!-- Nama Sekolah -->
                <div class="form-group">
                    <label for="nama">Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama" name="nama" 
                           value="{{ old('nama', $pendidikan->nama) }}" required>
                </div>

                <!-- Tingkatan -->
                <div class="form-group">
                    <label for="tingkatan">Tingkatan</label>
                    <select class="form-control" id="tingkatan" name="tingkatan" required>
                        <option value="1" {{ $pendidikan->tingkatan == 1 ? 'selected' : '' }}>TK</option>
                        <option value="2" {{ $pendidikan->tingkatan == 2 ? 'selected' : '' }}>SD</option>
                        <option value="3" {{ $pendidikan->tingkatan == 3 ? 'selected' : '' }}>SMP</option>
                        <option value="4" {{ $pendidikan->tingkatan == 4 ? 'selected' : '' }}>SMA/SMK</option>
                        <option value="5" {{ $pendidikan->tingkatan == 5 ? 'selected' : '' }}>D3</option>
                        <option value="6" {{ $pendidikan->tingkatan == 6 ? 'selected' : '' }}>S1/D4</option>
                        <option value="7" {{ $pendidikan->tingkatan == 7 ? 'selected' : '' }}>S2</option>
                        <option value="8" {{ $pendidikan->tingkatan == 8 ? 'selected' : '' }}>S3</option>
                    </select>
                </div>

                <!-- Tahun Masuk -->
                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                    <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" 
                           value="{{ old('tahun_masuk', $pendidikan->tahun_masuk) }}" required>
                </div>

                <!-- Tahun Keluar -->
                <div class="form-group">
                    <label for="tahun_keluar">Tahun Keluar</label>
                    <input type="number" class="form-control" id="tahun_keluar" name="tahun_keluar" 
                           value="{{ old('tahun_keluar', $pendidikan->tahun_keluar) }}" required>
                </div>

                <!-- Tombol Submit -->
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </div>
        </div>
    </div>
</form>
