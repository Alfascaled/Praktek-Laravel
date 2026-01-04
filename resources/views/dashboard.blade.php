<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            background: #f3f5fa;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: #4a76e2;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h2 {
            margin: 0;
        }

        .nav-links a {
            margin-left: 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        /* CONTAINER */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .welcome-box h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .welcome-box p {
            font-size: 18px;
            color: #666;
        }

        .welcome-box .username {
            color: #4a76e2;
            font-weight: bold;
        }

        /* MENU CARDS */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .menu-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .menu-card .icon {
            font-size: 45px;
            margin-bottom: 15px;
            display: block;
        }

        .menu-card h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .menu-card p {
            font-size: 14px;
            color: #888;
            margin-bottom: 20px;
        }

        .menu-card .btn {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .card-product .btn {
            background: #4a76e2;
            color: white;
        }

        .card-product .btn:hover {
            background: #345dcc;
        }

        .card-toko .btn {
            background: #17a2b8;
            color: white;
        }

        .card-toko .btn:hover {
            background: #138496;
        }

        .card-stok .btn {
            background: #28a745;
            color: white;
        }

        .card-stok .btn:hover {
            background: #218838;
        }

        /* LOGOUT SECTION */
        .logout-section {
            text-align: center;
            margin-top: 30px;
        }

        .btn-logout {
            display: inline-block;
            padding: 12px 30px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn-logout:hover {
            background: #c82333;
        }

        @media (max-width: 768px) {
            .menu-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h2>Dashboard</h2>
        <div class="nav-links">
            <a href="/dashboard">Home</a>
            <a href="/products">Produk</a>
            <a href="/tokos">Toko</a>
            <a href="/stoks">Stok</a>
            <a href="/logout">Logout</a>
        </div>
    </div>

    <div class="container">
        <!-- WELCOME BOX -->
        <div class="welcome-box">
            <h1>Selamat Datang 🎉</h1>
            <p>Halo, <span class="username">{{ session('user')->nama ?? 'User' }}</span>! Kelola bisnis Anda dengan mudah.</p>
        </div>

        <!-- MENU CARDS -->
        <div class="menu-grid">
            <div class="menu-card card-product">
                <span class="icon">📦</span>
                <h3>Kelola Produk</h3>
                <p>Tambah, edit, dan hapus produk yang dijual di toko Anda.</p>
                <a href="/products" class="btn">Lihat Produk →</a>
            </div>

            <div class="menu-card card-toko">
                <span class="icon">🏪</span>
                <h3>Kelola Toko</h3>
                <p>Kelola data toko dan cabang-cabang Anda di berbagai lokasi.</p>
                <a href="/tokos" class="btn">Lihat Toko →</a>
            </div>

            <div class="menu-card card-stok">
                <span class="icon">📊</span>
                <h3>Kelola Stok</h3>
                <p>Pantau dan atur stok produk di setiap toko Anda.</p>
                <a href="/stoks" class="btn">Lihat Stok →</a>
            </div>
        </div>

        <!-- LOGOUT -->
        <div class="logout-section">
            <a href="/logout" class="btn-logout">Logout</a>
        </div>
    </div>

</body>
</html>