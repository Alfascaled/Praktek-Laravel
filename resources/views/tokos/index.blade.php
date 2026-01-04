<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Toko</title>
    <style>
        body {
            background: #f3f5fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: #4a76e2;
            color: white;
            padding: 15px 30px;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .btn-add {
            background: #4a76e2;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-add:hover {
            background: #345dcc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th {
            background: #eef2ff;
        }

        table, th, td {
            border: 1px solid #d1d1d1;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        td.aksi {
            white-space: nowrap;
        }

        .status-active {
            background: #28a745;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-inactive {
            background: #dc3545;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-view {
            background: #17a2b8;
            padding: 4px 8px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            font-size: 12px;
        }

        .btn-view:hover {
            background: #138496;
        }

        .btn-edit {
            background: #ffc107;
            padding: 4px 8px;
            text-decoration: none;
            color: black;
            border-radius: 4px;
            font-weight: bold;
            font-size: 12px;
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-delete {
            background: #dc3545;
            padding: 4px 8px;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px;
        }

        .btn-delete:hover {
            background: #b52a36;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Dashboard Toko</strong></div>
    <div>
        <a href="/dashboard">Home</a>
        <a href="/products">Produk</a>
        <a href="/stoks">Stok</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>🏪 Daftar Toko</h2>

    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tokos.create') }}" class="btn-add">+ Tambah Toko</a>

    @if($tokos->count() > 0)
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Toko</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Status</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach ($tokos as $toko)
        <tr>
            <td>{{ $toko->id }}</td>
            <td><strong>{{ $toko->nama }}</strong></td>
            <td>{{ $toko->alamat }}</td>
            <td>{{ $toko->telepon ?? '-' }}</td>
            <td>{{ $toko->email ?? '-' }}</td>
            <td>
                @if($toko->aktif)
                    <span class="status-active">Aktif</span>
                @else
                    <span class="status-inactive">Nonaktif</span>
                @endif
            </td>
            <td>{{ $toko->stoks_count }} item</td>
            <td class="aksi">
                <a href="{{ route('tokos.show', $toko->id) }}" class="btn-view">Detail</a>
                <a href="{{ route('tokos.edit', $toko->id) }}" class="btn-edit">Edit</a>
                <form action="{{ route('tokos.destroy', $toko->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Yakin mau hapus toko ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="empty-state">
        <p>🏪 Belum ada toko yang terdaftar.</p>
    </div>
    @endif
</div>

</body>
</html>
