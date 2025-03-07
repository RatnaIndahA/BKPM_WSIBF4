@extends('backend.layouts.template')

@section('content')
<div class="container">
    <h2>Daftar Pengalaman Kerja</h2>
    <a href="{{ route('pengalaman.create') }}" class="btn btn-primary">Tambah Pengalaman</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Posisi</th>
                <th>Tanggal Mulai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_perusahaan }}</td>
                <td>{{ $item->posisi }}</td>
                <td>{{ $item->tanggal_mulai }}</td>
                <td>
                    <a href="{{ route('pengalaman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pengalaman.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection