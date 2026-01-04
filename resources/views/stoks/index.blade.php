<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Stok</title>
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
            max-width: 1200px;
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

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .summary-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .summary-card {
            flex: 1;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
        }

        .summary-card.total {
            background: #4a76e2;
        }

        .summary-card.normal {
            background: #28a745;
        }

        .summary-card.low {
            background: #ffc107;
            color: #333;
        }

        .summary-card h3 {
            margin: 0;
            font-size: 28px;
        }

        .summary-card p {
            margin: 5px 0 0 0;
            font-size: 14px;
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

        td.status {
            white-space: nowrap;
        }

        .stock-normal {
            background: #28a745;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .stock-low {
            background: #ffc107;
            color: #333;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .stock-empty {
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
    <div><strong>Dashboard Stok</strong></div>
    <div>
        <a href="/dashboard">Home</a>
        <a href="/products">Produk</a>
        <a href="/tokos">Toko</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>📦 Daftar Stok</h2>

    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            ❌ {{ $errors->first() }}
        </div>
    @endif

    <div class="summary-cards">
        <div class="summary-card total">
            <h3>{{ $stoks->count() }}</h3>
            <p>Total Record Stok</p>
        </div>
        <div class="summary-card normal">
            <h3>{{ $stoks->filter(fn($s) => $s->jumlah > $s->stok_minimum)->count() }}</h3>
            <p>Stok Normal</p>
        </div>
        <div class="summary-card low">
            <h3>{{ $stoks->filter(fn($s) => $s->jumlah <= $s->stok_minimum)->count() }}</h3>
            <p>Stok Rendah</p>
        </div>
    </div>

    <a href="{{ route('stoks.create') }}" class="btn-add">+ Tambah Stok</a>

    @if($stoks->count() > 0)
    <table>
        <tr>
            <th>ID</th>
            <th>Produk</th>
            <th>Toko</th>
            <th>Jumlah Stok</th>
            <th>Stok Minimum</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        @foreach ($stoks as $stok)
        <tr>
            <td>{{ $stok->id }}</td>
            <td><strong>{{ $stok->product->name }}</strong></td>
            <td>{{ $stok->toko->nama }}</td>
            <td>{{ $stok->jumlah }}</td>
            <td>{{ $stok->stok_minimum }}</td>
            <td class="status">
                @if($stok->jumlah == 0)
                    <span class="stock-empty">Habis</span>
                @elseif($stok->jumlah <= $stok->stok_minimum)
                    <span class="stock-low">⚠️ Rendah</span>
                @else
                    <span class="stock-normal">✅ Normal</span>
                @endif
            </td>
            <td>{{ $stok->keterangan ?? '-' }}</td>
            <td class="aksi">
                <a href="{{ route('stoks.show', $stok->id) }}" class="btn-view">Detail</a>
                <a href="{{ route('stoks.edit', $stok->id) }}" class="btn-edit">Edit</a>
                <form action="{{ route('stoks.destroy', $stok->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Yakin mau hapus stok ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="empty-state">
        <p>📦 Belum ada data stok.</p>
    </div>
    @endif
</div>

</body>
</html>
