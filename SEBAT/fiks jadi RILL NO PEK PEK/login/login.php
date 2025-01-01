<?php
// Mulai sesi
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Gym - Login</title>
    <style>
        /* Gaya Umum */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('../images/bg2.png') no-repeat center center fixed; /* Gambar latar */
            background-size: cover;
            overflow-x: hidden; /* Mencegah scroll horizontal */
        }

        /* Styling Header */
        header {
            position: relative;
            padding: 20px 0;
        }

        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        nav {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            z-index: 2;
            margin-top: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }

        nav a:hover {
            color: #ffcc00;
            text-decoration: underline;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            position: relative;
            z-index: 2;
        }

        .logo {
            margin-left: 20px;
            width: 200px;
            height: auto;
        }

        /* Form Login */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            z-index: 2;
            position: relative;
        }

        .login-box {
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-box input[type="submit"] {
            background-color: #ffcc00;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .login-box input[type="submit"]:hover {
            background-color: #e6b800;
        }

        .login-box p {
            text-align: center;
            color: #333;
        }

        .login-box p a {
            color: #ffbb55;
            text-decoration: none;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 5px;
        }

        .message.error {
            background-color: #ffcccc;
            color: #d8000c;
            border: 1px solid #d8000c;
        }

        .message.success {
            background-color: #ffffcc;
            color: #4f4f00;
            border: 1px solid #4f4f00;
        }
        /* Responsif */
        @media (max-width: 768px) {
            .login-box {
                width: 80%;
            }
        }
    </style>
</head>
<body>

<?php include('../header/header.php'); ?>

<!-- Form Login -->
<div class="login-container">
    <div class="login-box">
        <h2>Login</h2>
        <!-- Tampilkan Pesan Error atau Sukses -->
        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="message error">
                <?= htmlspecialchars($_SESSION['error_login']); ?>
            </div>
            <?php unset($_SESSION['error_login']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success_login'])): ?>
            <div class="message success">
                <?= htmlspecialchars($_SESSION['success_login']); ?>
            </div>
            <?php unset($_SESSION['success_login']); ?>
        <?php endif; ?>
        
        <form action="login_process.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <p>Belum punya akun? <a href="../register/register.php">Daftar</a></p>
    </div>
</div>
</body>
</html>