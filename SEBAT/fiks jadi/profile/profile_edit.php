<?php
session_start();
include('../koneksi/koneksi.php');
// Pastikan pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login/login.php');
    exit();
}
$message = isset($_GET['message']) ? $_GET['message'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('../images/bg2.png') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            margin: 0;
            padding: 0;
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
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-container form {
            display: flex;
            flex-direction: column;
        }
        .profile-container label {
            font-size: 16px;
            margin: 10px 0 5px;
        }
        .profile-container input {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }
        .profile-container button {
            padding: 10px 20px;
            background: #ffcc00;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .profile-container button:hover {
            background: #ffaa00;
        }
        footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php include('../header/header.php'); ?>

    <div class="profile-container">
        <h2>Edit Profil</h2>

        <!-- Tampilkan pesan sukses atau error -->
        <?php if ($message == 'profile_updated') { ?>
            <div class="message">Profil berhasil diperbarui!</div>
        <?php } elseif ($error == 'update_failed') { ?>
            <div class="error">Terjadi kesalahan saat memperbarui profil. Silakan coba lagi.</div>
        <?php } ?>

        <form action="profile_process.php" method="post">
            <input type="hidden" name="action" value="edit">
            <label for="firstName">Nama Depan:</label>
            <input type="text" name="firstName" id="firstName" value="<?= htmlspecialchars($_SESSION['firstName']); ?>" required><br>

            <label for="lastName">Nama Belakang:</label>
            <input type="text" name="lastName" id="lastName" value="<?= htmlspecialchars($_SESSION['lastName']); ?>" required><br>

            <label for="dateOfBirth">Tanggal Lahir:</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?= htmlspecialchars($_SESSION['dateOfBirth']); ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($_SESSION['email']); ?>" required><br>

            <label for="phoneNumber">Nomor Handphone:</label>
            <input type="text" name="phoneNumber" id="phoneNumber" value="<?= htmlspecialchars($_SESSION['phoneNumber']); ?>" required><br>

            <button type="submit">Simpan Perubahan</button>
        </form>

    </div>

    <footer>
        <img src="../images/logo.png" alt="Logo Web Gym" class="logo">
    </footer>
</body>
</html>