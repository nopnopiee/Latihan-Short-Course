

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body>
    <h1>Tambah Data Kategori</h1>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        
        <label for="kd_kategori">Kode Kategori:</label><br>
        <input type="text" name="kd_kategori" id="kd_kategori" required><br><br>
        
        <label for="nama_kategori">Nama Kategori:</label><br>
        <input type="text" name="nama_kategori" id="nama_kategori" required><br><br>
        
        <button type="submit">Simpan</button>
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
