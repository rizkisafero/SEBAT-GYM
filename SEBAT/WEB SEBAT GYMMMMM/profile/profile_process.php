<?php
session_start();
include('../koneksi/koneksi.php'); // File koneksi ke database

// Pastikan pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id = $_SESSION['id']; // Ambil ID pengguna dari sesi
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validasi jika password ingin diubah
    $passwordQuery = '';
    if (!empty($password)) {
        if ($password !== $confirmPassword) {
            $_SESSION['error'] = "Password dan konfirmasi password tidak cocok!";
            header('Location: edit_profile.php');
            exit();
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $passwordQuery = ", password = '$hashedPassword'";
    }

    // Update data di database
    $query = "UPDATE users 
              SET first_name = '$firstName', 
                  last_name = '$lastName', 
                  date_of_birth = '$dateOfBirth', 
                  phone_number = '$phoneNumber' 
                  $passwordQuery
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // Perbarui data di sesi
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['dateOfBirth'] = $dateOfBirth;
        $_SESSION['phoneNumber'] = $phoneNumber;

        $_SESSION['success'] = "Profil berhasil diperbarui!";
        header('Location: profile.php');
    } else {
        $_SESSION['error'] = "Terjadi kesalahan: " . mysqli_error($conn);
        header('Location: edit_profile.php');
    }

    exit();
}
?>
