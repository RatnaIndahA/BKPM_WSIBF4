<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Laravel</title>
</head>
<body>
    <h2>Form Input Laravel</h2>
    <form action="/formulir/proses" method="post">
    @csrf
        Nama: <input type="text" name="nama"><br>
        Alamat: <input type="text" name="alamat"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
