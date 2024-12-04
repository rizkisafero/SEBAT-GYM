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
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .col-md-4 {
            flex: 0 0 30%;
            max-width: 30%;
            padding: 15px;
            box-sizing: border-box;
        }
        .card {
            background-color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-align: center;
            padding: 20px;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .icon {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 15px;
        }
        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .card-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }
        .btn-chat {
            display: inline-block;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-chat:hover {
            background-color: #218838;
        }
        h2 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        @media screen and (max-width: 768px) {
            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<?php include('../header/header.php'); ?>

<div class="container">
        <h2>Panduan Pembayaran</h2>
        <div class="row">
            <!-- Langkah 1 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="icon">
                        <img src="../images/BRI.png" alt="Bank BRI Logo" style="height: 50px;">
                    </div>
                    <h5 class="card-title">Langkah 1: Lakukan Transfer</h5>
                    <p class="card-text">
                        Silakan untuk melakukan pembayaran sebesar Rp 119.000 dengan cara transfer ke No Rekening 
                        <strong>0166-01027-1905-07</strong> (Bank BRI a.n Wawan).
                    </p>
                </div>
            </div>
            <!-- Langkah 2 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="icon">
                        <img src="../images/WA.png" alt="WhatsApp" style="height: 50px;">
                    </div>
                    <h5 class="card-title">Langkah 2: Konfirmasi Pembayaran</h5>
                    <p class="card-text">
                        Konfirmasi melalui WhatsApp <strong>083814364269</strong> (sertakan alamat email/username dan lampirkan foto bukti pembayaran). 
                        Atau klik tombol di bawah ini.
                    </p>
                    <a href="https://wa.me/6288983636752" class="btn-chat">Chat Langsung</a>
                </div>
            </div>
            <!-- Langkah 3 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="icon">
                        👤
                    </div>
                    <h5 class="card-title">Langkah 3: Login ke Member Area</h5>
                    <p class="card-text">
                        Setelah pembayaran berhasil dikonfirmasi, silakan cek email Anda, dan ikuti arahan untuk login ke member area.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>