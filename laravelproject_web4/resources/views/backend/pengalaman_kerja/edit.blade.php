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

                        <form action="{{ route('pengalaman_kerja.update', $pengalaman_kerja->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" value="{{ $pengalaman_kerja->nama_perusahaan }}" required>
                            </div>

                            <div class="form-group">
                                <label>Posisi</label>
                                <input type="text" class="form-control" name="posisi" value="{{ $pengalaman_kerja->posisi }}" required>
                            </div>

                            <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3" required>{{ $pengalaman_kerja->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai" value="{{ $pengalaman_kerja->tanggal_mulai }}" required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" value="{{ $pengalaman_kerja->tanggal_selesai }}">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-default">Batal</a>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection
