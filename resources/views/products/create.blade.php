<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>

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

        label {
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cfcfcf;
            border-radius: 8px;
            margin-top: 5px;
            margin-bottom: 20px;
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
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Tambah Produk</strong></div>
    <div>
        <a href="/products">Kembali</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>➕ Tambah Produk Baru</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Nama Produk</label>
        <input type="text" name="name" placeholder="Nama Produk" required>

        <label>Harga Produk</label>
        <input type="number" name="price" placeholder="Harga Produk" required>

        <label>Deskripsi</label>
        <textarea name="description" placeholder="Deskripsi Produk" rows="4" required></textarea>

        <button type="submit">Simpan Produk</button>
    </form>

    <a href="{{ route('products.index') }}" class="back-btn">← Kembali ke Daftar Produk</a>
</div>

</body>
</html>