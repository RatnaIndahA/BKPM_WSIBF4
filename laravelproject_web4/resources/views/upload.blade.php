<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Files - Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Upload Multiple Files Dengan Laravel</h2>

        {{-- Pesan Jika Success --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('success') }}
            </div>
        @endif

        {{-- Peringatan Jika Error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('error') }}
            </div>
        @endif

        {{-- Menampilkan Error Jika Ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif

        {{-- Form Upload --}}
        <form action="{{ route('upload.resize') }}" method="POST" enctype="multipart/form-data">
            @csrf  {{-- Token Keamanan Laravel --}}
            
            <div class="form-group">
                <label><b>File Gambar</b></label>
                <input type="file" name="file[]" class="form-control" multiple>
            </div>

            <div class="form-group">
                <label><b>Keterangan</b></label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>