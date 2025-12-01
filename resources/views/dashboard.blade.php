
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            background: #eef1f7;
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
        .box {
            max-width: 900px;
            margin: 40px auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* BUTTON */
        .btn {
            padding: 12px 25px;
            display: inline-block;
            border-radius: 10px;
            margin-top: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-blue {
            background: #4a76e2;
            color: white;
        }

        .btn-blue:hover {
            background: #345dcc;
        }

        .btn-red {
            background: #d9534f;
            color: white;
        }

        .btn-red:hover {
            background: #c0392b;
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
            <a href="/logout">Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="box">
        <h2>Selamat Datang 🎉</h2>
        <p style="font-size: 18px;">
            Halo, <strong>{{ session('user')->nama ?? 'User' }}</strong>!
        </p>

        <a href="/products" class="btn btn-blue">Kelola Produk</a><br>
        <a href="/logout" class="btn btn-red">Logout</a>
    </div>

</body>
</html>