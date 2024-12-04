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
            background: url('../images/bg1.jpg') no-repeat center center fixed; /* Gambar latar */
            background-size: cover;
            overflow-x: hidden; /* Mencegah scroll horizontal */
        }
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Warna gelap dengan transparansi */
            z-index: -1; /* Agar berada di bawah konten */
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

        /* Slideshow Styles */
        .slideshow-container {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }

        .slide {
            display: none;
            position: relative;
            width: 100%;
        }

        .slide img {
            width: 65%;
            height: auto;
            max-width: 100%;
            display: block;
            margin: auto;
        }

        /* Tombol panah */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            background-color: rgba(0,0,0,0.5);
        }

        /* Posisi tombol next (panah kanan) */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* Posisi tombol prev (panah kiri) */
        .prev {
            left: 0;
            border-radius: 3px 0 0 3px;
        }

        /* Saat pengguna mengarahkan kursor ke tombol */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        .dots-container {
            text-align: center;
            padding: 10px;
        }

        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Bagian Tentang Kami, Layanan, Testimoni, Galeri */
        .full-width-section {
    padding: 20px;
    margin: 20px auto; /* Tambahkan jarak antar kotak */
    max-width: 80%; /* Atur lebar maksimal untuk kotak */
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px; /* Tambahkan sudut membulat */
    text-align: center;
}

        section h2 {
            margin-bottom: 10px;
        }

        blockquote {
            font-style: italic;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 10px;
            border-left: 4px solid #717171;
        }

        /* Galeri Styles */
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .gallery-container img {
            max-width: 30%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .full-width-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<?php include('../header/header.php'); ?>

<!-- Bagian Slideshow -->
<div class="slideshow-container">
    <?php
    $dir = "../images/slides/";
    if (is_dir($dir)) {
        $images = array_diff(scandir($dir), array('..', '.'));
        foreach ($images as $image) {
            $imagePath = htmlspecialchars($dir . $image);
            echo '<div class="slide">';
            echo '<img src="'.$imagePath.'" alt="Gambar Slide: '.htmlspecialchars($image).'">';
            echo '</div>';
        }
    }
    ?>

    <!-- Tombol panah -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- Titik Navigasi -->
<div class="dots-container">
    <?php
    $dots_count = count($images);
    for ($i = 0; $i < $dots_count; $i++) {
        echo '<span class="dot" onclick="currentSlide('.($i+1).')"></span>';
    }
    ?>
</div>

<!-- Bagian Tentang Kami -->
<section id="about" class="full-width-section">
    <h2>Tentang Kami</h2>
    <p>Salah satu mimpi besar lima siswa yang ingin memberikan kontribusi nyata kepada masyarakat adalah SEBAT (Sehat Sobat) GYM.
        Kami hadir sebagai ruang inspirasi bagi mereka yang ingin mencapai potensi terbaik dalam hidup mereka dengan berlandaskan
        visi untuk menciptakan lingkungan yang mendukung. Di SEBAT GYM, kami melihat latihan bukan sekadar aktivitas fisik,
        melainkan langkah penting menuju kehidupan yang lebih baik. Lebih dari sekadar tempat untuk berolahraga,
        kami berkomitmen untuk menjadi komunitas yang saling mendukung, memotivasi, dan menginspirasi dalam setiap langkah
        perjalanan Anda menuju gaya hidup sehat.</p>
</section>

<!-- Layanan -->
<section id="services" class="full-width-section">
    <h2>Layanan Kami</h2>
    <p>Pelatih Pribadi, Program Latihan Kustom, Kelas Kelompok, Fasilitas Kebugaran Lengkap, Pembayaran Mudah dan Aman.</p>
</section>

<!-- Testimoni -->
<section id="testimonials" class="full-width-section">
    <h2>Testimoni</h2>
    <blockquote>
        <p>"Web Gym telah mengubah hidup saya! Pelatihnya sangat berpengalaman dan membantu saya mencapai tujuan kebugaran saya."</p>
        <cite>- Itsal, Anggota</cite>
    </blockquote>
    <blockquote>
        <p>"Saya sangat menyukai kelas kelompok di Web Gym. Suasana yang mendukung dan menyenangkan!"</p>
        <cite>- Safero, Anggota</cite>
    </blockquote>
    <blockquote>
        <p>"Web Gym ini sangat lengkap perlengkapannya. Menjadikan member semangat!"</p>
        <cite>- Daffa, Anggota</cite>
    </blockquote>
</section>

<!-- Galeri -->
<section id="gallery" class="full-width-section">
    <h2>Galeri</h2>
    <div class="gallery-container">
        <img src="../images/fasilitas1.jpg" alt="Fasilitas Gym 1">
        <img src="../images/fasilitas2.jpg" alt="Fasilitas Gym 2">
        <img src="../images/yoga.webp" alt="Kelas Yoga">
        <img src="../images/pelatihan.png" alt="Pelatihan Pribadi">
        <img src="../images/kebugaran.webp" alt="Kelas Kebugaran">
        <img src="../images/fasilitas3.webp" alt="Fasilitas Gym 3">
    </div>
</section>

<footer>
<img src="../images/logo.png" alt="Logo Web Gym" class="logo">
</footer>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>

</body>
</html>