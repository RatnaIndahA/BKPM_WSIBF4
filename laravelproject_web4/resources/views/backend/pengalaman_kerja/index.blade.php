@extends('backend/layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                        <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                        <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                    </ol>
                </div>
            </div>

            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"> Pengalaman Kerja</header>
                        <div class="panel-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('pengalaman_kerja.create') }}">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </a>

                            <!-- Tabel Pengalaman Kerja -->
                            <table class="table table-striped table-advance table-hover mt-3">
                                <tbody>
                                    <tr>
                                        <th><i class="icon_bag"></i> Nama Perusahaan</th>
                                        <th><i class="icon_document"></i> Posisi</th>
                                        <th><i class="icon_calendar"></i> Tanggal Mulai</th>
                                        <th><i class="icon_calendar"></i> Tanggal Selesai</th>
                                        <th><i class="icon_cogs"></i> Action</th>
                                    </tr>

                                    @foreach ($pengalaman_kerja as $item)
                                        <tr>
                                            <td>{{ $item->nama_perusahaan }}</td>
                                            <td>{{ $item->posisi }}</td>
                                            <td>{{ $item->tanggal_mulai }}</td>
                                            <td>{{ $item->tanggal_selesai }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('pengalaman_kerja.edit', $item->id) }}" class="btn btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection
