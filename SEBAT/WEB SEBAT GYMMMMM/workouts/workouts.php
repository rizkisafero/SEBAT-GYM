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
            background: url('../images/bg3.png') no-repeat center center fixed; /* Gambar latar */
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
        /* Section Latihan */
        .workout-section {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .workout-section h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .workout-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .workout-card {
            background-color: #fff;
            width: 250px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .workout-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .workout-card h3 {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .workout-card p {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }

        .workout-card button {
            margin-top: 15px;
            background-color: #ffcc00;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .workout-card button:hover {
            background-color: #e6b800;
        }
        footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>

<?php include('../header/header.php'); ?>

<!-- Bagian Latihan -->
<section id="latihan" class="workout-section">
    <h2>Program Latihan Kami</h2>
    <div class="workout-list">
        <div class="workout-card">
            <img src="../images/latihan1.jpg" alt="Latihan 1">
            <h3>Mobility</h3>
            <p>Latihan ini berfokus pada fleksibilitas.</p>
        </div>

        <div class="workout-card">
            <img src="../images/latihan2.jpg" alt="Latihan 2">
            <h3>Strength</h3>
            <p>Latihan ini berfokus untuk membentuk tubuh dan menambah massa otot.</p>
        </div>

        <div class="workout-card">
            <img src="../images/latihan3.jpg" alt="Latihan 3">
            <h3>Cardiovascular</h3>
            <p>Latihan ini berfokus untuk menurunkan berat badan.</p>
        </div>
    </div>
</section>

<footer>
<img src="../images/logo.png" alt="Logo Web Gym" class="logo">
</footer>

</body>
</html>