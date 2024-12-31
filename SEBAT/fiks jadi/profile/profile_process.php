<?php
session_start();
include('../koneksi/koneksi.php'); 

// Pastikan pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login/login.php');
    exit();
}

// Tangani aksi berdasarkan input POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil aksi dari input form
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch ($action) {
        case 'delete':
            // Pastikan email pengguna ada dalam sesi
            if (isset($_SESSION['email'])) {
                $currentEmail = $_SESSION['email'];  // Ambil email dari sesi pengguna
                
                // Query untuk menghapus pengguna berdasarkan email
                $query = "DELETE FROM users WHERE email = ?";
                if ($stmt = $conn->prepare($query)) {
                    $stmt->bind_param("s", $currentEmail);  // Menggunakan email sebagai parameter
                    
                    if ($stmt->execute()) {
                        // Jika penghapusan berhasil, kita hapus sesi dan redirect ke halaman login
                        session_destroy();  // Menghentikan sesi
                        header('Location: ../login/login.php?message=account_deleted');  // Arahkan ke halaman login
                        exit();
                    } else {
                        // Jika gagal, redirect kembali ke halaman profil dengan pesan error
                        header('Location: profile.php?error=delete_failed');
                        exit();
                    }
                } else {
                    // Error dalam persiapan query
                    die('Error in preparing SQL query: ' . $conn->error);
                }
            } else {
                // Jika tidak ada email dalam sesi, arahkan kembali ke halaman profil
                header('Location: profile.php?error=invalid_user');
                exit();
            }

        case 'logout':
            // Proses logout
            session_destroy(); // Hapus semua data sesi
            header('Location: ../login/login.php?message=logged_out');
            exit();

        case 'edit':
                // Ambil data dari form
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $dateOfBirth = $_POST['dateOfBirth'];
                $email = $_POST['email'];
                $phoneNumber = $_POST['phoneNumber'];
                $currentEmail = $_SESSION['email']; // Email yang digunakan untuk mencari user di database
    
                // Update data di database
                $query = "UPDATE users SET first_name = ?, last_name = ?, date_of_birth = ?, email = ?, phone_number = ? WHERE email = ?";
                $stmt = $conn->prepare($query);
                
                if ($stmt) {
                    $stmt->bind_param("ssssss", $firstName, $lastName, $dateOfBirth, $email, $phoneNumber, $currentEmail);
                    if ($stmt->execute()) {
                        // Perbarui sesi dengan data yang baru
                        $_SESSION['firstName'] = $firstName;
                        $_SESSION['lastName'] = $lastName;
                        $_SESSION['dateOfBirth'] = $dateOfBirth;
                        $_SESSION['email'] = $email;
                        $_SESSION['phoneNumber'] = $phoneNumber;
    
                        // Redirect ke halaman profil dengan pesan sukses
                        header('Location: profile.php?message=profile_updated');
                    } else {
                        // Redirect ke halaman edit dengan pesan error
                        header('Location: profile_edit.php?error=update_failed');
                    }
                } else {
                    die('Prepare statement error: ' . $conn->error);
                }
                exit();
    
            default:
                header('Location: profile.php?error=unknown_action');
                exit();
        }
    } else {
        header('Location: profile.php?error=invalid_request');
        exit();
    }