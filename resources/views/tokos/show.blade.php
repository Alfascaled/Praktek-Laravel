<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Toko - {{ $toko->nama }}</title>
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
            max-width: 900px;
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

        h3 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #333;
        }

        .info-card {
            background: #4a76e2;
            color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .info-card h3 {
            margin: 0 0 15px 0;
            font-size: 22px;
            color: white;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-item {
            background: rgba(255,255,255,0.15);
            padding: 12px;
            border-radius: 8px;
        }

        .info-item label {
            font-size: 12px;
            text-transform: uppercase;
            opacity: 0.8;
            display: block;
            margin-bottom: 5px;
        }

        .info-item span {
            font-size: 15px;
            font-weight: 600;
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

        .low-stock {
            background: #fff3cd;
            color: #856404;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #4a76e2;
            font-weight: bold;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

        .empty-state {
            text-align: center;
            padding: 30px 20px;
            color: #888;
        }

        .btn-add {
            background: #4a76e2;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-add:hover {
            background: #345dcc;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Detail Toko</strong></div>
    <div>
        <a href="/tokos">Daftar Toko</a>
        <a href="/stoks">Stok</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>🏪 Detail Toko</h2>

    <div class="info-card">
        <h3>{{ $toko->nama }}</h3>
        <div class="info-grid">
            <div class="info-item">
                <label>Alamat</label>
                <span>{{ $toko->alamat }}</span>
            </div>
            <div class="info-item">
                <label>Telepon</label>
                <span>{{ $toko->telepon ?? '-' }}</span>
            </div>
            <div class="info-item">
                <label>Email</label>
                <span>{{ $toko->email ?? '-' }}</span>
            </div>
            <div class="info-item">
                <label>Status</label>
                <span class="{{ $toko->aktif ? 'status-active' : 'status-inactive' }}">
                    {{ $toko->aktif ? 'Aktif' : 'Nonaktif' }}
                </span>
            </div>
        </div>
        @if($toko->keterangan)
        <div class="info-item" style="margin-top: 15px;">
            <label>Keterangan</label>
            <span>{{ $toko->keterangan }}</span>
        </div>
        @endif
    </div>

    <h3>📦 Stok Produk di Toko Ini</h3>

    @if($toko->stoks->count() > 0)
    <table>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah Stok</th>
            <th>Stok Minimum</th>
            <th>Status</th>
        </tr>
        @foreach($toko->stoks as $stok)
        <tr>
            <td><strong>{{ $stok->product->name }}</strong></td>
            <td>Rp {{ number_format($stok->product->price, 0, ',', '.') }}</td>
            <td>{{ $stok->jumlah }}</td>
            <td>{{ $stok->stok_minimum }}</td>
            <td>
                @if($stok->isLowStock())
                    <span class="low-stock">⚠️ Stok Rendah</span>
                @else
                    ✅ Normal
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="empty-state">
        <p>📦 Belum ada stok produk di toko ini.</p>
        <a href="{{ route('stoks.create') }}" class="btn-add">+ Tambah Stok</a>
    </div>
    @endif

    <a href="{{ route('tokos.index') }}" class="back-btn">← Kembali ke Daftar Toko</a>
</div>

</body>
</html>
