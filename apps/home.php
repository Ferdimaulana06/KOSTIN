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
    <nav class="navbar px-10 md:flex md:justify-between md:items-center md:px-24 md:py-4">
        <div class="nav-items" id="nav-items">
            <img class="size-28 md:size-36" src="../assets/img/index/kostintxt.svg" alt="kostin-logo" width="180"
                height="40" class="logo">
            <div class="user-menu hidden md:flex" id="user-menu md:flex mr-4 ml-4">
                <ul class="nav-links ">
                    <li><a href="../apps/home.php">Home</a></li>
                    <li><a href="../apps/logout.php">About</a></li>
                    <li><a href="../apps/logout.php">Service</a></li>
                    <li><a href="../apps/logout.php">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="flex gap-4 flex-row md:flex-row items-center justify-between">
            <button class="user-icon">
                <img class="h-[36px] md:h-[42px]" src="../assets/img/index/account_profile_user.png" alt="User Icon">
            </button>
            <button class="hamburger w-xs md:hidden md:w-xl" id="hamburger">
                <img class="h-[36px] md:h-[42px]" src="../assets/img/index/hamburger.svg" alt="User Icon">
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero md:h-[750px] h-[500px]">
        <div class="hero-content px-[50px] md:px-24">
            <h2 class="hero-title text-2xl md:text-4xl text-bold mb-5 ">Temukan Kos Impian Anda</h2>
            <div class="search-container py-3 md:py-3 md:px-3 px-3">
                <div class="search-box">
                    <div class="input-group py-3 md:py-4 md:px-4 px-4">
                        <input class="md:px-4 px-8 font-light md:text-base text-sm" type="text" placeholder="Lokasi">
                    </div>
                    <button class="search-btn md:py-4 py-[9px] md:px-2 px-1">
                        <img src="../assets/img/index/fi-br-search.svg" class="icon-cari " alt="Lokasi">
                    </button>
                </div>
            </div>

            <div class="popular-cities md:flex hidden items-center">
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
    <section class="deskripsi py-[60px]">
        <div
            class="px-10 pb-10 md:p:0 md:bg-[#FAFAFA] flex bg-[#fff] flex flex-col items-center justify-center mx-8 md:ml-[100px] md:mr-[100px] md:shadow-none shadow-md rounded-lg md:rounded-none">
            <div
                class=" bg-grey w-full container-deskripsi md:justify-between justify-start items-center flex-wrap gap-y-10">
                <h1
                    class="judul-deskripsi md:text-2xl font-bold leading-[2]  md:justify-start md:text-start text-start text-xl md:px-0">
                    Cari dan Pesan Kos dengan Mudah !</h1>

                <img src="../assets/img/index/Group37.svg" alt="Check Icon"
                    class="deskripsi-icon lg:h-[105px] md:h-[70px] sm:hidden lg:flex md:flex shrink">
            </div>
            <div
                class="container-deskripsi2 flex w-full mt-10 flex-row items-center md:justify-between gap-y-10 flex-wrap">
                <div class="flex mb-6">
                    <div class=" md:w-[555px] flex items-center">
                        <img src="../assets/img/index/rumah4.png" alt="Check Icon">
                    </div>
                </div>
                <div class=" deskripsi-text flex flex-col flex-shrink gap-y-10">
                    <h2 class="judul-deskripsi2 text-lg font-semibold">Kenapa Harus KOSTIN?</h2>
                    <p class="deskripsi-paragraf">Cari kos kini lebih praktis! Jelajahi berbagai pilihan kos dengan
                        fasilitas lengkap sesuai kebutuhanmu. Mulai dari kos eksklusif hingga kos hemat, semua
                        tersedia
                        dalam satu platform. Cek detail kamar, harga, dan lokasi secara langsung. Cocok untuk
                        mahasiswa,
                        pekerja, atau siapa pun yang butuh tempat tinggal nyaman. Yuk, mulai cari kos idealmu
                        sekarang
                        juga!
                    </p>
                    <a href="#" class="deskripsi-button">Selengkapnya</a>

                </div>
            </div>
        </div>

    </section>

    <!-- Recommendations Section -->
    <section class="recommendation">
        <div class="container-recommendation">
            <h1 class="judul-recommendation text-xl text-bold">Rekomendasi Kos Terbaik untuk Anda</h1>
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
                <div class="swiper-button-next md:flex hidden"></div>
                <div class="swiper-button-prev md:flex hidden"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>


    </section>
    <section class="bantuan px-[100px] justify-center items-center flex-col py-[150px]">
        <div
            class="container-bantuan flex-col md:flex-row justify-center md:justify-between flex flex-wrap gap-y-10 mx-5 md:mx-0 items-center gap-x-20">
            <h2
                class="judul-bantuan text-l font-semibold md:text-3xl md:font-bold leading-[2]  md:justify-start items-start text-start">
                Butuh
                bantuan atau
                ada pertanyaan?
                <br>Hubungi
                kami, kami siap
                membantu <br> kapan
                saja!
            </h2>
            <div class="container-form-bantuan px-5 md:px-5 justify-center items-center flex">
                <form method="POST">
                    <div class="input-group-bantuan px-4 md:px-0 flex-shrink">
                        <input type="text" placeholder="Nama Lengkap">
                    </div>
                    <div class="input-group-bantuan px-4 md:px-0 flex-shrink">
                        <input type="text" placeholder="Email">
                    </div>
                    <a href="" class="text-button-bantuan px-4 md:px-0">Kirim</a>

                </form>
            </div>
        </div>

    </section>

    <!-- FAQ Section -->

    <!-- Footer -->
    <footer class="footer md:px-24 px-10">
        <div class="footer-top justify-center flex-col  md:flex md:justify-between md:flex-row">
            <div class="logo-kostin flex justify-center md:justify-start">
                <img src="../assets/img/index/kostin-white.svg" alt="KOSTIN Logo">
            </div>
            <nav class="footer-nav flex-col justify-center items-center md:flex-row md:items-start">
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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>