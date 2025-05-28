<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /apps/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOSTIN - Beranda</title>
    <link rel="icon" href="../assets/img/kostin.svg">
    <link rel="stylesheet" href="../assets/css/style-home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-items" id="nav-items">
            <img src="../assets/img/index/kostintxt.svg" alt="kostin-logo" width="180" height="40" class="logo">
            <div class="user-menu" id="user-menu">
                <ul class="nav-links">
                    <li><a href="../apps/home.php">Home</a></li>
                    <li><a href="../apps/logout.php">About</a></li>
                    <li><a href="../apps/logout.php">Service</a></li>
                    <li><a href="../apps/logout.php">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="right-nav-items">
            <a href="../apps/sewakan.php" class="sewakan-button">Sewakan Rumah Anda</a>
            <button class="user-icon" onclick="window.location.href='profil.php';">
                <img src="../assets/img/index/account_profile_user.png" alt="User Icon">
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="search-container">
                <div class="search-box">
                    <div class="input-group">
                        <input type="text" placeholder="Lokasi">
                    </div>
                    <button class="search-btn">
                        <img src="../assets/img/index/fi-br-search.svg" class="icon-cari" alt="Lokasi">
                    </button>
                </div>
            </div>

            <div class="popular-cities">
                <span>Kota Populer:</span>
                <a href="#">Jakarta</a>
                <a href="#">Bandung</a>
                <a href="#">Surabaya</a>
                <a href="#">Yogyakarta</a>
                <a href="#">Bali</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="deskripsi">
        <div class="container-deskripsi">
            <h1 class="judul-deskripsi">Solusi Cerdas Cari Kos yang Nyaman, Strategis, dan Sesuai Budget Kamu</h1>
            <img src="../assets/img/index/Group37.svg" alt="Check Icon" class="deskripsi-icon">
        </div>
        <div class="container-deskripsi2">
            <img src="../assets/img/index/Group38.png" alt="" class="deskripsi-image">
            <div class="deskripsi-text">
                <h2 class="judul-deskripsi2">Kenapa Harus KOSTIN?</h2>
                <p class="deskripsi-paragraf">Cari kos kini lebih praktis! Jelajahi berbagai pilihan kos dengan
                    fasilitas lengkap sesuai kebutuhanmu. Mulai dari kos eksklusif hingga kos hemat, semua tersedia
                    dalam satu platform. Cek detail kamar, harga, dan lokasi secara langsung. Cocok untuk mahasiswa,
                    pekerja, atau siapa pun yang butuh tempat tinggal nyaman. Yuk, mulai cari kos idealmu sekarang juga!
                </p>
                <a href="#" class="deskripsi-button">Selengkapnya</a>

            </div>
        </div>

    </section>

    <!-- Recommendations Section -->
    <section class="recommendation">
        <div class="container-recommendation">
            <h1 class="judul-recommendation">Rekomendasi Kos Terbaik untuk Anda</h1>
            <button class="see-all">Lihat Semua</button>
        </div>
        <!-- slider recommendation -->
        <div class="swiper container-recommendation2">
            <div class="card-wrapper">
                <ul class="card-list swiper-wrapper">
                    <li class="card swiper-slide">
                        <a class="card-link" href="#">
                            <img src="../assets/img/index/rumah1.png" alt="Kos 1" class="card-image">
                            <div class="card-content">
                                <h3 class="card-judul">Kost Las Vegas</h3>
                                <div class="card-location">
                                    <img src="../assets/img/index/lokasi.svg" alt="">
                                    <p>Sanden, Kota Magelang</p>
                                </div>
                                <h3 class="harga-kos">Rp 650.000</h3>
                            </div>
                        </a>
                    </li>
                    <li class="card swiper-slide">
                        <a class="card-link" href="#">
                            <img src="../assets/img/index/rumah1.png" alt="Kos 1" class="card-image">
                            <div class="card-content">
                                <h3 class="card-judul">Kost Las Vegas</h3>
                                <div class="card-location">
                                    <img src="../assets/img/index/lokasi.svg" alt="">
                                    <p>Sanden, Kota Magelang</p>
                                </div>
                                <h3 class="harga-kos">Rp 650.000</h3>
                            </div>
                        </a>
                    </li>
                    <li class="card swiper-slide">
                        <a class="card-link" href="#">
                            <img src="../assets/img/index/rumah1.png" alt="Kos 1" class="card-image">
                            <div class="card-content">
                                <h3 class="card-judul">Kost Las Vegas</h3>
                                <div class="card-location">
                                    <img src="../assets/img/index/lokasi.svg" alt="">
                                    <p>Sanden, Kota Magelang</p>
                                </div>
                                <h3 class="harga-kos">Rp 650.000</h3>
                            </div>
                        </a>
                    </li>
                    <li class="card swiper-slide">
                        <a class="card-link" href="#">
                            <img src="../assets/img/index/rumah1.png" alt="Kos 1" class="card-image">
                            <div class="card-content">
                                <h3 class="card-judul">Kost Las Vegas</h3>
                                <div class="card-location">
                                    <img src="../assets/img/index/lokasi.svg" alt="">
                                    <p>Sanden, Kota Magelang</p>
                                </div>
                                <h3 class="harga-kos">Rp 650.000</h3>
                            </div>
                        </a>
                    </li>
                    <li class="card swiper-slide">
                        <a class="card-link" href="#">
                            <img src="../assets/img/index/rumah1.png" alt="Kos 1" class="card-image">
                            <div class="card-content">
                                <h3 class="card-judul">Kost Las Vegas</h3>
                                <div class="card-location">
                                    <img src="../assets/img/index/lokasi.svg" alt="">
                                    <p>Sanden, Kota Magelang</p>
                                </div>
                                <h3 class="harga-kos">Rp 650.000</h3>
                            </div>
                        </a>
                    </li>
                    <li class="card swiper-slide">
                        <a class="card-link" href="#">
                            <img src="../assets/img/index/rumah1.png" alt="Kos 1" class="card-image">
                            <div class="card-content">
                                <h3 class="card-judul">Kost Las Vegas</h3>
                                <div class="card-location">
                                    <img src="../assets/img/index/lokasi.svg" alt="">
                                    <p>Sanden, Kota Magelang</p>
                                </div>
                                <h3 class="harga-kos">Rp 650.000</h3>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section>
    <section class="bantuan">
        <div class="container-bantuan">
            <h2 class="judul-bantuan">Butuh bantuan atau ada pertanyaan? <br>Hubungi kami, kami siap membantu <br> kapan
                saja!
            </h2>
            <div class="container-form-bantuan">
                <form method="POST">
                    <div class="input-group-bantuan">
                        <input type="text" placeholder="Nama Lengkap">
                    </div>
                    <div class="input-group-bantuan">
                        <input type="text" placeholder="Email">
                    </div>
                    <a href="" class="text-button-bantuan">Kirim</a>

                </form>
            </div>
        </div>

    </section>

    <!-- FAQ Section -->

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-top">
            <div class="logo-kostin">
                <img src="../assets/img/index/kostin-white.svg" alt="KOSTIN Logo">
            </div>
            <nav class="footer-nav">
                <a href="#">Tentang Kami</a>
                <a href="#">FAQ</a>
                <a href="#">Kontak Kami</a>
                <a href="#">Kebijakan Privasi</a>
            </nav>
        </div>
        <div class="footer-bottom">
            © 2025 KOSTIN. Made with Love ❤️.
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/scripts-home.js"></script>
</body>

</html>