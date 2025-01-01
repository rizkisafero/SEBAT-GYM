<?php
session_start();
include('../koneksi/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil input dan hindari karakter berbahaya
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];

    // Periksa apakah email diisi
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email dan Password wajib diisi!";
        header('Location: login.php');
        exit();
    }

    // Ambil data pengguna berdasarkan email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set data sesi
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['firstName'] = $user['first_name'];
            $_SESSION['lastName'] = $user['last_name'];
            $_SESSION['dateOfBirth'] = $user['date_of_birth'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phoneNumber'] = $user['phone_number'];

             // Set pesan sukses
            $_SESSION['success_login'] = "Login berhasil! Selamat datang, " . htmlspecialchars($user['first_name']) . ".";
            header('Location: ../payment/payment.php');
        } else {
            $_SESSION['error_login'] = "Password salah!";
            header('Location: login.php');
        }
    } else {
        $_SESSION['error_login'] = "Email tidak ditemukan!";
        header('Location: login.php');
    }

    exit();
}
?>