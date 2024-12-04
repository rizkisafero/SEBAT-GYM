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

            // Redirect ke halaman profil
            header('Location: ../payment/payment.php');
        } else {
            $_SESSION['error'] = "Password salah!";
            header('Location: login.php');
        }
    } else {
        $_SESSION['error'] = "Email tidak ditemukan!";
        header('Location: login.php');
    }

    exit();
}
?>