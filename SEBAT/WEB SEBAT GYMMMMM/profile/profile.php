<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login/login.php');
    exit();
}

// Ambil data pengguna dari sesi
$user = [
    'firstName' => $_SESSION['firstName'],
    'lastName' => $_SESSION['lastName'],
    'dateOfBirth' => $_SESSION['dateOfBirth'],
    'email' => $_SESSION['email'],
    'phoneNumber' => $_SESSION['phoneNumber'],
];
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

        .profile-container p {
            font-size: 18px;
            margin: 10px 0;
        }

        .profile-container a {
            display: block;
            text-align: center;
            margin: 20px auto;
            padding: 10px 20px;
            background: #ffcc00;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            width: 150px;
        }

        .profile-container a:hover {
            background: #ffaa00;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
        }

    </style>
</head>

<?php include('../header/header.php'); ?>

<body>
    <div class="profile-container">
        <h2>Profil Pengguna</h2>
        <p><strong>Nama:</strong> <?= htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?></p>
        <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($user['dateOfBirth']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
        <p><strong>Nomor Handphone:</strong> <?= htmlspecialchars($user['phoneNumber']); ?></p>
        <a href="logout.php">Logout</a>


    </div>
</body>

<footer>
<img src="../images/logo.png" alt="Logo Web Gym" class="logo">
</footer>

</html>