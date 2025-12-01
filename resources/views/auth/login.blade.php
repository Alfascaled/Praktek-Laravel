

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #5a2fc2, #8a4fff, #d66efd);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #ffffff;
            width: 380px;
            border-radius: 18px;
            padding: 35px 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 18px;
            color: #4b1fa8;
            font-size: 27px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1.5px solid #d1c9e8;
            outline: none;
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 15px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #8a4fff;
            box-shadow: 0 0 8px rgba(138,79,255,0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            background: #7a34ff;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #5b22d1;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        .register-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .register-link a {
            color: #7a34ff;
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            padding: 10px;
            background: #f8d7da;
            color: #842029;
            border-radius: 8px;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Login</h2>

    @if(session('error'))
    <div class="alert">{{ session('error') }}</div>
    @endif

    @if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email..." required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password..." required>

        <button type="submit">Login</button>
    </form>

    <div class="register-link">
        Belum punya akun? <a href="/register">Daftar di sini</a>
    </div>

</div>

</body>
</html>