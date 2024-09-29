<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>
    <h1>Edit Data Kategori</h1>
        <form action="{{ route('kategori.update', $edit->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <label for="kd_kategori">Kode Kategori:</label><br>
        <input type="text" name="kd_kategori" id="kd_kategori" value="{{ $edit->kd_kategori }}" required><br><br>
    
        <label for="nama_kategori">Nama Kategori:</label><br>
        <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $edit->nama_kategori }}" required><br><br>
    
        <button type="submit">Update</button>
    </form>
    @if ($errors->any())
        <div style="color: red; margin-top: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
