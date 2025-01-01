<?php
session_start();
include('../koneksi/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $dateOfBirth = $_POST['dateOfBirth'];
    $email = htmlspecialchars(trim($_POST['email']));
    $phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validasi input
    if (empty($firstName) || empty($lastName) || empty($dateOfBirth) || empty($email) || empty($phoneNumber) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error_register'] = "Semua field wajib diisi.";
        header('Location: register.php');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_register'] = "Format email tidak valid.";
        header('Location: register.php');
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION['error_register'] = "Password dan konfirmasi password tidak cocok.";
        header('Location: register.php');
        exit();
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Cek email apakah sudah ada
    $checkEmailQuery = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_register'] = "Email sudah terdaftar. Gunakan email lain.";
        header('Location: register.php');
        exit();
    }

    // Insert data pengguna baru
    $insertQuery = "INSERT INTO users (first_name, last_name, date_of_birth, email, phone_number, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssss", $firstName, $lastName, $dateOfBirth, $email, $phoneNumber, $passwordHash);

    if ($stmt->execute()) {
        $_SESSION['success_register'] = "Pendaftaran berhasil! Silakan login.";
        header('Location: register.php');
    } else {
        $_SESSION['error_register'] = "Terjadi kesalahan saat mendaftarkan pengguna.";
        header('Location: register.php');
    }

    // Tutup koneksi database
    $stmt->close();
    $conn->close();
} else {
    // Jika file ini diakses langsung tanpa POST
    header('Location: register.php');
    exit();
}
?>