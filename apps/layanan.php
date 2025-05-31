<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/layanan.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar px-10 md:flex md:flex-row md:justify-between md:items-center md:px-24 md:py-4">
        <div class="nav-items" id="nav-items">
            <img class="size-28 md:size-36" src="../assets/img/index/kostintxt.svg" alt="kostin-logo" width="180"
                height="40" class="logo">
            <div class="user-menu hidden md:flex mr-4 ml-5" id="user-menu">
                <ul class="nav-links ">
                    <li><a href="../apps/home.php">Home</a></li>
                    <li><a href="../apps/logout.php">About</a></li>
                    <li><a href="../apps/logout.php">Service</a></li>
                    <li><a href="../apps/logout.php">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="flex gap-4 flex-row md:flex-row items-center justify-between">
            <a href="../apps/sewakan.php" class="sewakan-button hidden md:flex rounded-full px-4 py-3">Sewakan Rumah
                Anda</a>
            <button class="user-icon">
                <img class="" src="../assets/img/index/account_profile_user.png" alt="User Icon">
            </button>
            <button class="hamburger w-xs md:hidden md:w-xl" id="hamburger">
                <img class="size-8 md:size-48" src="../assets/img/index/hamburger.svg" alt="User Icon">
            </button>
        </div>
    </nav>

    <section class="sectionatas items-center mx-auto justify-center flex flex-col md:flex-row  md:items-center">
        <div class="flex flex-col justify-center items-center my-auto px-10 md:px-24">
            <h2 class="text-center text-3xl font-semibold ">Layanan Kami</h2>
            <p class="text-center text-m font-light mt-3">Kami menyediakan berbagai layanan untuk membantu Anda
                menemukan
                kost
                yang sesuai.</p>
        </div>


    </section>

    <section class="section-1 py-36 mx-auto justify-center items-center">
        <div
            class="container-content-1 px-6 py-4 md:py-10 md:px-24 max-w-10xl mx-auto flex flex-col md:flex-row items-center justify-center gap-20">

            <!-- Gambar -->
            <div class="container-gambar-layanan items-center justify-center">
                <img src="../assets/img/index/layanan-pencari-kos.png" alt="Layanan Pencari Kos"
                    class="gambar-layanan-pencari-kos rounded-md order-2" />
            </div>

            <!-- Teks -->
            <div
                class="w-full md:w-1/2 flex flex-col justify-center items-center text-center md:text-left md:items-start ">

                <h2 class="text-2xl md:text-3xl font-bold leading-8 text-black mb-8 order-1">
                    Layanan untuk <br> Pencari Kos
                </h2>

                <div class="space-y-8 text-gray-800 order-3">
                    <div>
                        <h3 class="font-semibold text-l ">Pencarian Geolokasi</h3>
                        <p class="text-m leading-8">Cari kos terdekat berdasarkan peta interaktif dan filter radius</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-l">Reservasi Instan</h3>
                        <p class="text-m leading-8">Booking unit dalam hitungan menit, tanpa antre</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-l">Notifikasi Harga & Promo</h3>
                        <p class="text-m leading-8">Dapatkan alert kalau ada kos baru sesuai kriteria atau diskon khusus
                        </p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-l">Ulasan & Rating</h3>
                        <p class="text-m leading-8">Baca pengalaman penghuni sebelumnya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2 py-36 mx-auto justify-center items-center">
        <div
            class="container-content-1 px-6 py-4 md:py-10 md:px-24 max-w-10xl mx-auto flex flex-col md:flex-row items-center justify-center gap-20">

            <!-- Gambar -->
            <div class="container-gambar-layanan items-center justify-center order-1 md:order-2">
                <img src="../assets/img/index/pemilik_kos.png" alt="Layanan Pemilik Kos"
                    class="gambar-layanan-pencari-kos rounded-md max-w-full object-contain" />
            </div>

            <!-- Teks -->
            <div
                class="w-full md:w-1/2 flex flex-col justify-center items-center text-center md:text-left md:items-start order-2 md:order-1">
                <h2 class="text-2xl md:text-3xl font-bold leading-8 text-black mb-8">
                    Layanan untuk <br> Pemilik Kos
                </h2>

                <div class="space-y-8 text-gray-800">
                    <div>
                        <h3 class="font-semibold text-l">Pasang Iklan Mudah</h3>
                        <p class="text-m leading-8">Upload foto, deskripsi, harga, dan fasilitas dalam satu langkah</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-l">Manajemen Listing</h3>
                        <p class="text-m leading-8">Dashboard untuk memantau view, chat, dan reservasi</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-l">Verifikasi Aman</h3>
                        <p class="text-m leading-8">Proses KYC untuk calon penyewa demi keamanan bersama</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-l">Analytics & Laporan</h3>
                        <p class="text-m leading-8">Statistik kunjungan dan pendapatan real‑time</p>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <section class="bg-gray-100 py-36 px-24">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-black text-center mb-12">Apa Kata Mereka?</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <!-- Testimoni 1 -->
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center shadow-sm py-10">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.67 0 8 1.34 8 4v2H4v-2c0-2.66 5.33-4 8-4zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-black">Budi</h3>
                        <p class="text-gray-600 italic">“KOSTIN memudahkan aku buat nyari kos di magelang”</p>
                    </div>
                </div>

                <!-- Testimoni 2 -->
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center shadow-sm py-10">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.67 0 8 1.34 8 4v2H4v-2c0-2.66 5.33-4 8-4zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-black">Dani</h3>
                        <p class="text-gray-600 italic">“KOSTIN keren banget”</p>
                    </div>
                </div>

                <!-- Testimoni 3 -->
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center shadow-sm py-10">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.67 0 8 1.34 8 4v2H4v-2c0-2.66 5.33-4 8-4zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-black">Ihza</h3>
                        <p class="text-gray-600 italic">“Nyari kos murah dan aman, ya di KOSTIN nyarinya”</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer class="footer md:px-24 px-10 py-10">
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


    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>