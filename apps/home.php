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
    <?php include '../apps/include/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero md:h-[750px] h-[500px]">
        <div class="hero-content px-[50px] md:px-24">
            <h2 class="hero-title text-2xl md:text-4xl text-bold mb-5 ">Temukan Kos Impian Anda</h2>
            <div class="search-container py-3 md:py-3 md:px-3 px-3 rounded-md">
                <div class="search-box">
                    <div class="input-group py-3 md:py-4 md:px-4 px-4 rounded-l-md">
                        <input class="md:px-4 px-8 font-light md:text-base text-sm" type="text" placeholder="Lokasi">
                    </div>
                    <button class="search-btn md:py-4 py-[9px] md:px-2 px-1 rounded-r-md hover:bg-[#153366]">
                        <img src="../assets/img/index/fi-br-search.svg" class="icon-cari " alt="Lokasi">
                    </button>
                </div>
            </div>

            <div class="popular-cities md:flex hidden items-center">
                <span>Kota Populer:</span>
                <a href="#" class="rounded-md">Jakarta</a>
                <a href="#" class="rounded-md">Bandung</a>
                <a href="#" class="rounded-md">Surabaya</a>
                <a href="#" class="rounded-md">Yogyakarta</a>
                <a href="#" class="rounded-md">Bali</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="deskripsi py-[60px]">
        <div
            class="px-10 pb-10 md:p:0 md:bg-[#FAFAFA] flex bg-[#fff] flex-col items-center justify-center mx-8 md:ml-[100px] md:mr-[100px] md:shadow-none shadow-md rounded-lg md:rounded-none">
            <div
                class=" bg-grey w-full container-deskripsi md:justify-between justify-start items-center flex-wrap gap-y-10">
                <h1
                    class="judul-deskripsi md:text-2xl font-bold leading-[2]  md:justify-start md:text-start text-start text-xl md:px-0">
                    Cari dan Pesan Kos dengan Mudah !</h1>

                <img src="../assets/img/index/Group37.svg" alt="Check Icon"
                    class="deskripsi-icon lg:h-[70px] lg:pr-[170px] md:h-[70px] sm:hidden lg:flex md:flex shrink">
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
                    <p class="deskripsi-paragraf md:text-md text-sm leading-[2]">Cari kos kini lebih praktis! Jelajahi
                        berbagai
                        pilihan kos dengan
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
        <div class="container-recommendation mx-10 md:px-[40px] md:justify-between justify-start md:mx-[100px]">
            <h1 class="text-lg font-semibold">Rekomendasi Kos Terbaik untuk Anda</h1>
            <button class="see-all lg:flex md:hidden hidden">Lihat Semua</button>
        </div>
        <!-- slider recommendation -->
        <div class="swiper container-recommendation2">
            <div class="card-wrapper md:px-10 mx-[20px] md:mx-[100px]">
                <ul class="card-list swiper-wrapper mb-[50px]">
                    <div
                        class="swiper-slide flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="md:h-[200px] h-[150px]">
                            <img class="w-full h-full object-cover rounded-t-xl" src="../assets/img/index/rumah1.png"
                                alt="Card Image">
                        </div>
                        <div class="p-4 md:p-5">
                            <h3 class="card-judul">Kost Las Vegas</h3>
                            <div class="card-location mt-3">
                                <img class="md:flex hidden" src="../assets/img/index/lokasi.svg" alt="">
                                <p class="text-xs md:text-md">Sanden, Kota Magelang</p>
                            </div>
                            <h3 class="harga-kos mt-3 font-bold text-xl">Rp 650.000</h3>
                            <a class="mt-2 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="#">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                    <div
                        class="swiper-slide flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="md:h-[200px] h-[150px]">
                            <img class="w-full h-full object-cover rounded-t-xl" src="../assets/img/index/rumah1.png"
                                alt="Card Image">
                        </div>
                        <div class="p-4 md:p-5">
                            <h3 class="card-judul">Kost Las Vegas</h3>
                            <div class="card-location mt-3">
                                <img class="md:flex hidden" src="../assets/img/index/lokasi.svg" alt="">
                                <p class="text-xs md:text-md">Sanden, Kota Magelang</p>
                            </div>
                            <h3 class="harga-kos mt-3 font-bold text-xl">Rp 650.000</h3>
                            <a class="mt-2 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="#">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </ul>
                <div class="swiper-button-next md:flex hidden"></div>
                <div class="swiper-button-prev md:flex hidden"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>


    </section>
    <section class="bantuan px-[100px] justify-center items-center flex-col py-[150px] mt-20">
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
    <?php include '../apps/include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/scripts-home.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>