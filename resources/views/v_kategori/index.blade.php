<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>KATEGORI</title>
</head>
<body>
    <h1>{{$judul}}</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-success">Tambah</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->kd_kategori }}</td>
                    <td>{{ $row->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $row->id) }}">Edit</a>
                        <a href="{{ route('kategori.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>