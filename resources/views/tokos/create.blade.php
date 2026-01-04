<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Toko</title>
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
            box-sizing: border-box;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin: 0;
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
    <div><strong>Tambah Toko</strong></div>
    <div>
        <a href="/tokos">Kembali</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>➕ Tambah Toko Baru</h2>

    @if($errors->any())
        <div class="error-list">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tokos.store') }}" method="POST">
        @csrf

        <label>Nama Toko *</label>
        <input type="text" name="nama" placeholder="Masukkan nama toko" value="{{ old('nama') }}" required>

        <label>Alamat *</label>
        <textarea name="alamat" placeholder="Masukkan alamat lengkap" rows="3" required>{{ old('alamat') }}</textarea>

        <label>Telepon</label>
        <input type="text" name="telepon" placeholder="Contoh: 08123456789" value="{{ old('telepon') }}">

        <label>Email</label>
        <input type="email" name="email" placeholder="Contoh: toko@email.com" value="{{ old('email') }}">

        <label>Keterangan</label>
        <textarea name="keterangan" placeholder="Keterangan tambahan (opsional)" rows="3">{{ old('keterangan') }}</textarea>

        <div class="checkbox-group">
            <input type="checkbox" name="aktif" value="1" checked id="aktif">
            <label for="aktif" style="margin-bottom: 0;">Toko Aktif</label>
        </div>

        <button type="submit">Simpan Toko</button>
    </form>

    <a href="{{ route('tokos.index') }}" class="back-btn">← Kembali ke Daftar Toko</a>
</div>

</body>
</html>
