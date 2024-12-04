<?php
session_start();
include('koneksi.php'); // File koneksi ke database

// Pastikan pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login/login.php');
    exit();
}

// Data pengguna dari sesi
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
    <title>Edit Profil</title>
    <style>
        /* CSS mirip seperti register */
    </style>
</head>
<body>

<?php include('header.php'); ?>

<div class="profile-container">
    <div class="profile-box">
        <h2>Edit Profil</h2>
        <form action="profile_process.php" method="POST">
            <input type="text" name="firstName" value="<?= htmlspecialchars($user['firstName']); ?>" required>
            <input type="text" name="lastName" value="<?= htmlspecialchars($user['lastName']); ?>" required>
            <input type="date" name="dateOfBirth" value="<?= htmlspecialchars($user['dateOfBirth']); ?>" required>
            <input type="text" name="phoneNumber" value="<?= htmlspecialchars($user['phoneNumber']); ?>" required>
            <input type="password" name="password" placeholder="Password Baru (Opsional)">
            <input type="password" name="confirmPassword" placeholder="Konfirmasi Password Baru (Opsional)">
            <input type="submit" value="Perbarui Profil">
        </form>
    </div>
</div>

<footer>
    <img src="images/logo.png" alt="Logo Web Gym" class="logo">
</footer>

</body>
</html>
