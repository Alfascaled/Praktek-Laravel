<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Stok</title>
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
            max-width: 800px;
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

        .info-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-card {
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        .info-card.product {
            background: #4a76e2;
        }

        .info-card.toko {
            background: #6c757d;
        }

        .info-card h4 {
            margin: 0 0 10px 0;
            font-size: 12px;
            text-transform: uppercase;
            opacity: 0.8;
        }

        .info-card h3 {
            margin: 0;
            font-size: 18px;
        }

        .info-card p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .stock-display {
            background: #28a745;
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 25px;
        }

        .stock-display.low {
            background: #ffc107;
            color: #333;
        }

        .stock-display.empty {
            background: #dc3545;
        }

        .stock-display h1 {
            margin: 0;
            font-size: 48px;
        }

        .stock-display p {
            margin: 8px 0 0 0;
            font-size: 14px;
        }

        .stock-display .status-text {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 15px;
            background: rgba(255,255,255,0.2);
            margin-top: 10px;
            font-weight: bold;
            font-size: 13px;
        }

        .action-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .action-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e9ecef;
        }

        .action-box h4 {
            margin: 0 0 12px 0;
            color: #333;
            font-size: 14px;
        }

        .action-box form {
            display: flex;
            gap: 10px;
        }

        .action-box input {
            flex: 1;
            padding: 10px;
            border: 1px solid #cfcfcf;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-tambah {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background: #218838;
        }

        .btn-kurang {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-kurang:hover {
            background: #c82333;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .detail-table th {
            text-align: left;
            padding: 12px;
            background: #eef2ff;
            width: 40%;
            border: 1px solid #d1d1d1;
        }

        .detail-table td {
            padding: 12px;
            border: 1px solid #d1d1d1;
        }

        .back-btn {
            display: inline-block;
            text-decoration: none;
            color: #4a76e2;
            font-weight: bold;
        }

        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Detail Stok</strong></div>
    <div>
        <a href="/stoks">Daftar Stok</a>
        <a href="/tokos">Toko</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>📦 Detail Stok</h2>

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

    <div class="info-cards">
        <div class="info-card product">
            <h4>📦 Produk</h4>
            <h3>{{ $stok->product->name }}</h3>
            <p>Rp {{ number_format($stok->product->price, 0, ',', '.') }}</p>
        </div>
        <div class="info-card toko">
            <h4>🏪 Toko</h4>
            <h3>{{ $stok->toko->nama }}</h3>
            <p>{{ $stok->toko->alamat }}</p>
        </div>
    </div>

    @php
        $stockClass = '';
        $statusText = '✅ Stok Normal';
        if($stok->jumlah == 0) {
            $stockClass = 'empty';
            $statusText = '❌ Stok Habis';
        } elseif($stok->jumlah <= $stok->stok_minimum) {
            $stockClass = 'low';
            $statusText = '⚠️ Stok Rendah';
        }
    @endphp

    <div class="stock-display {{ $stockClass }}">
        <h1>{{ $stok->jumlah }}</h1>
        <p>Unit tersedia (Minimum: {{ $stok->stok_minimum }})</p>
        <span class="status-text">{{ $statusText }}</span>
    </div>

    <div class="action-section">
        <div class="action-box">
            <h4>➕ Tambah Stok</h4>
            <form action="{{ route('stoks.tambah', $stok->id) }}" method="POST">
                @csrf
                <input type="number" name="jumlah_tambah" placeholder="Jumlah" min="1" required>
                <button type="submit" class="btn-tambah">Tambah</button>
            </form>
        </div>
        <div class="action-box">
            <h4>➖ Kurangi Stok</h4>
            <form action="{{ route('stoks.kurang', $stok->id) }}" method="POST">
                @csrf
                <input type="number" name="jumlah_kurang" placeholder="Jumlah" min="1" required>
                <button type="submit" class="btn-kurang">Kurangi</button>
            </form>
        </div>
    </div>

    <table class="detail-table">
        <tr>
            <th>ID Stok</th>
            <td>{{ $stok->id }}</td>
        </tr>
        <tr>
            <th>Stok Minimum</th>
            <td>{{ $stok->stok_minimum }} unit</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $stok->keterangan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Terakhir Diperbarui</th>
            <td>{{ $stok->updated_at->format('d M Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $stok->created_at->format('d M Y, H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('stoks.index') }}" class="back-btn">← Kembali ke Daftar Stok</a>
</div>

</body>
</html>
