<!DOCTYPE html>
<html>
<head>
    <title>Detail Kategori</title>
</head>
<body>
    <h1>Detail Kategori</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Kode Kategori</th>
            <td>{{ $kategori->kd_kategori }}</td>
        </tr>
        <tr>
            <th>Nama Kategori</th>
            <td>{{ $kategori->nama_kategori }}</td>
        </tr>
    </table>

    <a href="{{ route('kategori.index') }}">Kembali ke Daftar Kategori</a>
</body>
</html>
