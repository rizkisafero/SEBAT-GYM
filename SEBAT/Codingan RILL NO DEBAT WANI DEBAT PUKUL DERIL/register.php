<?php
// Mulai sesi
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Web Gym</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Gaya Umum */
        body, html {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('images/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            overflow-x: hidden;
        }
        
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        
        .register-box {
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 8px;
            width: 300px;
        }
        
        .register-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-box input[type="submit"] {
            background-color: #ffcc00;
            color: white;
            cursor: pointer;
            border: none;
        }

        .register-box p {
            text-align: center;
        }

        .register-box p a {
            color: #ffbb55;
            text-decoration: none;
        }
        
        .register-box p a:hover {
            color: #ffbb55; /* Warna saat hover */
        }
    </style>
</head>
<body>

<?php include('header.php'); ?>

<!-- Menampilkan Pesan Error atau Sukses -->
<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color: red; text-align: center;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<p style='color: green; text-align: center;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>

<!-- Form Register -->
<div class="register-container">
    <div class="register-box">
        <h2>Daftar Akun</h2>
        <form action="register_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            <input type="submit" value="Daftar">
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</div>

<footer>
    <p>SEBAT GYM</p>
</footer>

</body>
</html>
