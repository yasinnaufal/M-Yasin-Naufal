<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Produk</title>
</head>
<body>
    <h1>Manajemen Produk</h1>

    <form method="GET" action="/">
        <input type="text" name="search" placeholder="Cari nama produk">
        <select name="kategori">
            <option value="">Semua Kategori</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Gadget">Gadget</option>
            <option value="Aksesoris">Aksesoris</option>
        </select>
        <button type="submit">Cari</button>
    </form>

    <h3>Tambah Produk</h3>
    <form method="POST" action="/produk">
        @csrf
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="stok" placeholder="Stok" required>
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <select name="status" required>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
        <select name="kategori" required>
            <option value="Elektronik">Elektronik</option>
            <option value="Gadget">Gadget</option>
            <option value="Aksesoris">Aksesoris</option>
        </select>
        <button type="submit">Simpan</button>
    </form>

    <h3>Daftar Produk</h3>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach ($produks as $produk)
        <tr>
            <td>{{ $produk->nama }}</td>
            <td>{{ $produk->harga }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->deskripsi }}</td>
            <td>{{ $produk->status ? 'Aktif' : 'Tidak Aktif' }}</td>
            <td>{{ $produk->kategori }}</td>
            <td>
                <a href="/produk/{{ $produk->id }}/edit">Edit</a>
                <form action="/produk/{{ $produk->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $produks->links() }}
</body>
</html>
