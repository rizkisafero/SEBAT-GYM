<?php
// Mulai sesi
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Gym</title>
    <style>
        /* Gaya Umum */
        body{
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
        footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>

<?php include('../header/header.php'); ?>
<!-- Menampilkan Pesan Error atau Sukses -->
<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color: red; text-align: center;'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<p style='color: Yellow; text-align: center;'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['success']);
}
?>

<!-- Form Register -->
<div class="register-container">
    <div class="register-box">
        <h2>Daftar Akun</h2>
        <form action="register_process.php" method="POST">
            <input type="text" name="firstName" placeholder="Nama Depan" required>
            <input type="text" name="lastName" placeholder="Nama Belakang" required>
            <input type="date" name="dateOfBirth" placeholder="Tanggal Lahir" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phoneNumber" placeholder="Nomor Handphone" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirmPassword" placeholder="Konfirmasi Password" required>
            <input type="submit" value="Daftar">
        </form>
        <p>Sudah punya akun? <a href="../login/login.php">Login</a></p>
    </div>
</div>

<footer>
<img src="../images/logo.png" alt="Logo Web Gym" class="logo">
</footer>

</body>
</html>