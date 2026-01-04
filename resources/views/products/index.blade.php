<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
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
            max-width: 1000px;
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
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Dashboard Produk</strong></div>
    <div>
        <a href="/dashboard">Home</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>📦 Daftar Produk</h2>

    <a href="{{ route('products.create') }}" class="btn-add">+ Tambah Produk</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        @foreach ($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td>{{ $p->description }}</td>
            <td class="aksi">
                <a href="{{ route('products.edit', $p->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('products.destroy', $p->id) }}"
                method="POST"
                style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>

</body>
</html>