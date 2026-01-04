<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Stok</title>
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
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .info-box {
            background: #e7f1ff;
            border: 1px solid #b6d4fe;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
            color: #084298;
            font-size: 14px;
        }

        label {
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cfcfcf;
            border-radius: 8px;
            margin-top: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4a76e2;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #345dcc;
        }

        .back-btn {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #4a76e2;
            font-weight: bold;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

        .error-list {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            color: #721c24;
        }

        .error-list ul {
            margin: 0;
            padding-left: 20px;
        }

        .error-list li {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Tambah Stok</strong></div>
    <div>
        <a href="/stoks">Kembali</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>➕ Tambah Stok Baru</h2>

    <div class="info-box">
        💡 Pilih produk dan toko, lalu masukkan jumlah stok yang tersedia.
    </div>

    @if($errors->any())
        <div class="error-list">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stoks.store') }}" method="POST">
        @csrf

        <label>Produk *</label>
        <select name="product_id" required>
            <option value="">-- Pilih Produk --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                </option>
            @endforeach
        </select>

        <label>Toko *</label>
        <select name="toko_id" required>
            <option value="">-- Pilih Toko --</option>
            @foreach($tokos as $toko)
                <option value="{{ $toko->id }}" {{ old('toko_id') == $toko->id ? 'selected' : '' }}>
                    {{ $toko->nama }} - {{ $toko->alamat }}
                </option>
            @endforeach
        </select>

        <div class="form-row">
            <div class="form-group">
                <label>Jumlah Stok *</label>
                <input type="number" name="jumlah" placeholder="0" value="{{ old('jumlah', 0) }}" min="0" required>
            </div>

            <div class="form-group">
                <label>Stok Minimum</label>
                <input type="number" name="stok_minimum" placeholder="0" value="{{ old('stok_minimum', 0) }}" min="0">
            </div>
        </div>

        <label>Keterangan</label>
        <textarea name="keterangan" placeholder="Keterangan tambahan (opsional)" rows="3">{{ old('keterangan') }}</textarea>

        <button type="submit">Simpan Stok</button>
    </form>

    <a href="{{ route('stoks.index') }}" class="back-btn">← Kembali ke Daftar Stok</a>
</div>

</body>
</html>
