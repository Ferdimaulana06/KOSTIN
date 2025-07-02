<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include_once 'config.php'; // Ganti path jika file koneksi ada di lokasi berbeda
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOSTIN - Beranda</title>
    <link rel="icon" href="/assets/img/home/kostin.svg">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/assets/css/style-home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-white font-poppins">
    <!-- Navigation -->
    <?php include '../apps/include/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero md:h-[750px] h-[500px] flex items-center justify-center bg-cover bg-center"
             style="background-image:url('/assets/img/home/landingrealistis.png')">
      <div class="hero-content w-full px-6 md:px-24 text-center">
        <h2 class="text-2xl md:text-4xl font-bold text-white mb-6">Temukan Kos Impian Anda</h2>
        <form action="cari-kos.php" method="GET" class="mx-auto max-w-2xl">
          <div class="flex">
            <input name="query" type="text" placeholder="Lokasi" required
                   class="flex-1 md:py-4 py-3 md:px-6 px-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-700 text-sm md:text-base" />
            <button type="submit"
                    class="md:py-4 py-3 md:px-6 px-4 bg-[#2966CB] hover:bg-blue-600 flex items-center justify-center">
              <img src="/assets/img/home/fi-br-search.svg" alt="Cari" class="h-5 w-5" />
            </button>
          </div>
        </form>
        <div class="hidden md:flex items-center justify-center mt-6 space-x-4">
          <span class="text-white font-medium">Kota Populer:</span>
          <a href="cari-kos.php?query=Jakarta" class="px-3 py-1 bg-white bg-opacity-30 hover:bg-opacity-50 text-white">Jakarta</a>
          <a href="cari-kos.php?query=Bandung" class="px-3 py-1 bg-white bg-opacity-30 hover:bg-opacity-50 text-white">Bandung</a>
          <a href="cari-kos.php?query=Surabaya" class="px-3 py-1 bg-white bg-opacity-30 hover:bg-opacity-50 text-white">Surabaya</a>
          <a href="cari-kos.php?query=Yogyakarta" class="px-3 py-1 bg-white bg-opacity-30 hover:bg-opacity-50 text-white">Yogyakarta</a>
          <a href="cari-kos.php?query=Bali" class="px-3 py-1 bg-white bg-opacity-30 hover:bg-opacity-50 text-white">Bali</a>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="deskripsi py-16 bg-gray-50">
        <div class="container mx-auto px-6 md:px-24">
            <div class="flex flex-col md:flex-row items-center md:items-start">
                <!-- Teks di kiri -->
                <div class="md:w-1/2 text-center md:text-left mb-8 md:mb-0">
                <h1 class="text-2xl md:text-3xl font-bold mb-6">Solusi Cerdas Cari Kos yang Nyaman, Strategis, dan Sesuai Budget Kamu</h1>
                </div>
                <!-- Gambar di kanan -->
                <div class="md:w-1/2 flex justify-center md:justify-end">
                <img src="/assets/img/home/Group37.svg" alt="Check Icon" class="h-20">
                </div>
            </div>
        </div>
    </section>

    <section class="section-2 py-16 bg-white">
        <div class="md:flex md:items-center md:justify-center md:gap-12 px-6 md:px-24">
            <img src="/assets/img/home/Group38.png" alt="Deskripsi Image"
                 class="mx-auto md:mx-0 mb-6 md:mb-0 max-w-sm md:max-w-xs md:ml-0 md:mr-8" style="min-width:180px;">
            <div class="text-left md:pl-0 md:flex-1">
                <h2 class="text-xl md:text-2xl font-semibold mb-4">Kenapa Harus KOSTIN?</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Cari kos kini lebih praktis! Jelajahi berbagai pilihan kos dengan fasilitas lengkap sesuai kebutuhanmu. Mulai dari kos eksklusif hingga kos hemat, semua tersedia dalam satu platform. Cek detail kamar, harga, dan lokasi secara langsung. Cocok untuk mahasiswa, pekerja, atau siapa pun yang butuh tempat tinggal nyaman. Yuk, mulai cari kos idealmu sekarang juga!
                </p>
                <a href="tentang.php" class="inline-block bg-[#2966CB] hover:bg-blue-600 text-white px-6 py-3">Selengkapnya</a>
            </div>
        </div>
    </section>

    <!-- Recommendations Section -->
    <section class="recommendation py-16">
      <div class="container mx-auto px-6 md:px-24 flex items-center justify-between mb-8">
        <h2 class="text-xl md:text-2xl font-semibold">Rekomendasi Kos Terbaik untuk Anda</h2>
        <button class="hidden lg:inline-block bg-[#2966CB] hover:bg-blue-600 text-white px-6 py-3">Lihat Semua</button>
      </div>
      <div class="swiper container-recommendation2">
        <!-- Swiper Slides -->
        <div class="swiper-wrapper px-6 md:px-24">
          <!-- Example Slide -->
          <div class="swiper-slide bg-white shadow p-4">
            <img src="/assets/img/home/rumah1.png" alt="Kost 1" class="w-full h-40 object-cover">
            <div class="mt-4">
              <h3 class="font-semibold">Kost Las Vegas</h3>
              <p class="text-gray-500 text-sm flex items-center mt-2"><img src="/assets/img/home/lokasi.svg" alt="Lokasi" class="mr-1"> Sanden, Kota Magelang</p>
              <p class="font-bold text-lg mt-2">Rp 650.000</p>
              <a href="#" class="inline-block mt-3 bg-[#2966CB] hover:bg-blue-600 text-white px-4 py-2">Pesan Sekarang</a>
            </div>
          </div>
          <!-- Duplikat slide sesuai kebutuhan -->
          <!-- Example Slide -->
          <div class="swiper-slide bg-white shadow p-4">
            <img src="/assets/img/home/rumah4.png" alt="Kost 1" class="w-full h-40 object-cover">
            <div class="mt-4">
              <h3 class="font-semibold">Kost Ipul</h3>
              <p class="text-gray-500 text-sm flex items-center mt-2"><img src="/assets/img/home/lokasi.svg" alt="Lokasi" class="mr-1"> Sanden, Kota Magelang</p>
              <p class="font-bold text-lg mt-2">Rp 650.000</p>
              <a href="#" class="inline-block mt-3 bg-[#2966CB] hover:bg-blue-600 text-white px-4 py-2">Pesan Sekarang</a>
            </div>
          </div>

          <!-- Example Slide -->
          <div class="swiper-slide bg-white shadow p-4">
            <img src="/assets/img/home/rumah3.png" alt="Kost 1" class="w-full h-40 object-cover">
            <div class="mt-4">
              <h3 class="font-semibold">Kost Iking</h3>
              <p class="text-gray-500 text-sm flex items-center mt-2"><img src="/assets/img/home/lokasi.svg" alt="Lokasi" class="mr-1"> Sanden, Kota Magelang</p>
              <p class="font-bold text-lg mt-2">Rp 650.000</p>
              <a href="#" class="inline-block mt-3 bg-[#2966CB] hover:bg-blue-600 text-white px-4 py-2">Pesan Sekarang</a>
            </div>
          </div>

          <!-- Example Slide -->
          <div class="swiper-slide bg-white shadow p-4">
            <img src="/assets/img/home/rumah2.png" alt="Kost 1" class="w-full h-40 object-cover">
            <div class="mt-4">
              <h3 class="font-semibold">Kost Wahjo</h3>
              <p class="text-gray-500 text-sm flex items-center mt-2"><img src="/assets/img/home/lokasi.svg" alt="Lokasi" class="mr-1"> Sanden, Kota Magelang</p>
              <p class="font-bold text-lg mt-2">Rp 650.000</p>
              <a href="#" class="inline-block mt-3 bg-[#2966CB] hover:bg-blue-600 text-white px-4 py-2">Pesan Sekarang</a>
            </div>
          </div>

          <!-- Example Slide -->
          <div class="swiper-slide bg-white shadow p-4">
            <img src="/assets/img/home/rumah1.png" alt="Kost 1" class="w-full h-40 object-cover">
            <div class="mt-4">
              <h3 class="font-semibold">Kost Las Vegas</h3>
              <p class="text-gray-500 text-sm flex items-center mt-2"><img src="/assets/img/home/lokasi.svg" alt="Lokasi" class="mr-1"> Sanden, Kota Magelang</p>
              <p class="font-bold text-lg mt-2">Rp 650.000</p>
              <a href="#" class="inline-block mt-3 bg-[#2966CB] hover:bg-blue-600 text-white px-4 py-2">Pesan Sekarang</a>
            </div>
          </div>
        </div>
        <!-- Arrows & Pagination -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- Bantuan Section -->
    <section class="bantuan py-24 bg-cover bg-center" style="background-image:url('/assets/img/home/bantuan.png')">
      <div class="container mx-auto px-6 md:px-24 flex flex-col md:flex-row items-center justify-between text-white min-h-[350px]">
        <div class="flex-1 flex flex-col items-center md:items-start justify-center mb-8 md:mb-0">
          <h2 class="text-2xl md:text-4xl font-semibold leading-snug text-center md:text-left">
            Butuh bantuan atau ada pertanyaan?<br>
            Hubungi kami, kami siap membantu kapan saja!
          </h2>
        </div>
        <form action="kirim-callbacks-home.php" method="POST" class="bg-black bg-opacity-50 p-6 space-y-4 w-full md:w-auto flex-1 flex flex-col items-center justify-center">
          <input type="text" name="first_name" placeholder="Nama Lengkap" required class="w-full px-4 py-3 border border-gray-300 focus:outline-none text-black">
          <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-3 border border-gray-300 focus:outline-none text-black">
          <button type="submit" class="w-full bg-[#2966CB] hover:bg-blue-600 text-white px-4 py-3">Kirim</button>
        </form>
      </div>
    </section>

    <!-- Footer -->
    <?php include '../apps/include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="../assets/js/script-home.js"></script>
</body>
</html>