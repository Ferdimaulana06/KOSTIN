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
            <img class="h-[36px] md:h-[42px]" src="../assets/img/index/kostintxt.svg" alt="kostin-logo" width="180"
                height="40" class="logo">
            <div class="user-menu hidden md:hidden lg:flex" id="user-menu md:flex mr-4 ml-4">
                <ul class="nav-links ">
                    <li><a href="../apps/home.php">Home</a></li>
                    <li><a href="../apps/logout.php">About</a></li>
                    <li><a href="../apps/logout.php">Service</a></li>
                    <li><a href="../apps/logout.php">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="flex gap-4 flex-row md:flex-row items-center justify-between">
            <a href="../apps/sewakan.php"
                class="sewakan-button hidden md:hidden lg:flex rounded-full px-4 py-3 h-[42px] flex-nowrap">Sewakan
                Rumah
                Anda</a>
            <a href="../apps/profile.php" class="user-icon">
                <img class="h-[36px] md:h-[42px]" src="../assets/img/index/account_profile_user.png" alt="User Icon">
            </a>

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="w-xs flex md:flex lg:hidden md:w-xl " type="button"><img class="h-[36px] md:h-[42px]"
                    src="../assets/img/index/hamburger.svg" alt="User Icon">
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sewakan
                            Kos</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Service</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<main class="container">
    <h1>Kebijakan Privasi</h1>
    <p>Kostin (selanjutnya disebut “kami”, “Kostin”, atau “platform”) berkomitmen untuk menjaga dan melindungi privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, melindungi, dan mengungkapkan informasi pribadi Anda saat Anda mengakses dan menggunakan layanan kami, termasuk namun tidak terbatas pada website, aplikasi mobile, dan sistem backend Kostin.<br></br>
        Dengan menggunakan layanan Kostin, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini.</p>

    <h2>Informasi yang Kami Kumpulkan</h2>
    <p>Kostin mengumpulkan beberapa jenis informasi untuk keperluan operasional layanan dan peningkatan pengalaman pengguna. Informasi pribadi yang kami kumpulkan meliputi nama lengkap, alamat email, nomor telepon, dan informasi akun seperti username dan kata sandi. Kami juga dapat mengumpulkan informasi lokasi (berdasarkan izin GPS atau alamat IP), informasi teknis seperti jenis perangkat, browser, dan alamat IP, serta riwayat aktivitas Anda di platform, termasuk pencarian kos, pemesanan, dan interaksi melalui chat dan ulasan. Dalam proses transaksi, kami dapat mengumpulkan data pembayaran seperti metode pembayaran, status transaksi, dan informasi terkait bukti pembayaran.</p>

    <h2>Penggunaan Informasi</h2>
    <p>Informasi yang kami kumpulkan digunakan untuk menyediakan dan mengelola layanan pencarian dan pemesanan kos secara efisien. Data ini membantu kami memverifikasi identitas pengguna, memproses transaksi, menampilkan listing kos yang relevan, dan menghubungkan penyewa dengan pemilik melalui fitur chat. Selain itu, informasi Anda juga digunakan untuk memberikan notifikasi penting, memperbaiki layanan melalui analisis data, serta memastikan sistem tetap aman dari penyalahgunaan atau penipuan. Kami hanya akan menggunakan informasi Anda sesuai dengan tujuan yang dijelaskan di kebijakan ini dan tidak akan menggunakan data Anda untuk keperluan lain tanpa persetujuan Anda.</p>

    <h2>Dasar Hukum Pengolahan Data</h2>
    <p>Pengolahan data pribadi di Kostin dilakukan berdasarkan beberapa dasar hukum yang sah. Kami mengandalkan persetujuan eksplisit Anda saat Anda mendaftar dan menggunakan layanan kami. Selain itu, pengolahan data juga dapat dilakukan sebagai bagian dari pelaksanaan kontrak layanan yang Anda gunakan, pemenuhan kewajiban hukum tertentu, dan kepentingan sah kami dalam menjaga keamanan serta meningkatkan kualitas layanan.</p>

    <h2>Pengungkapan Informasi kepada Pihak Ketiga</h2>
    <p>Kostin tidak akan menjual atau menyewakan data pribadi Anda kepada pihak ketiga mana pun. Namun, kami dapat membagikan informasi tertentu kepada mitra layanan yang membantu operasional platform, seperti penyedia layanan peta (misalnya Google Maps), gateway pembayaran, penyedia layanan cloud, dan layanan analitik. Kami juga dapat membagikan data kepada otoritas hukum jika diminta secara sah oleh pengadilan atau lembaga yang berwenang. Semua pihak ketiga yang bekerja sama dengan Kostin diwajibkan mematuhi standar perlindungan data yang ketat.</p>

    <h2>Keamanan dan Penyimpanan Data</h2>
    <p>Kami menjaga data pribadi Anda menggunakan langkah-langkah teknis dan organisasi yang canggih untuk mencegah akses tidak sah, kehilangan, atau penyalahgunaan data. Data penting seperti kata sandi disimpan dalam bentuk terenkripsi, dan akses ke sistem dibatasi hanya untuk personel yang berwenang. Kami hanya menyimpan data selama diperlukan untuk keperluan layanan, hukum, atau audit internal. Setelah masa penyimpanan berakhir, data akan dihapus secara permanen dari sistem kami.</p>

    <h2>Hak Anda sebagai Pengguna</h2>
    <p>Sebagai pengguna, Anda memiliki hak penuh atas data pribadi yang Anda berikan kepada kami. Anda dapat mengakses dan memperbarui informasi pribadi Anda kapan saja melalui pengaturan akun. Jika Anda ingin menghapus akun atau menarik persetujuan penggunaan data, Anda dapat mengajukan permintaan kepada kami melalui kontak yang tersedia. Kami juga menghormati hak Anda untuk membatasi atau menolak pemrosesan data tertentu, sepanjang tidak mengganggu fungsi utama layanan.</p>
    
    <h2>Cookie dan Teknologi Pelacakan</h2>
    <p>Untuk meningkatkan kenyamanan dan kinerja situs, kami menggunakan cookie dan teknologi pelacakan lainnya. Cookie membantu kami mengenali pengguna, menyimpan preferensi, dan menganalisis lalu lintas situs. Anda dapat menonaktifkan cookie melalui pengaturan browser, namun beberapa fitur situs mungkin tidak berfungsi optimal jika cookie dinonaktifkan. Informasi yang dikumpulkan melalui cookie tidak digunakan untuk mengidentifikasi Anda secara pribadi tanpa persetujuan eksplisit.</p>

    <h2>Integrasi Layanan Pihak Ketiga</h2>
    <p>Kostin dapat mengintegrasikan layanan dari pihak ketiga untuk mendukung fitur seperti peta interaktif, sistem pembayaran, notifikasi, atau autentikasi. Penggunaan layanan tersebut tunduk pada kebijakan privasi dari masing-masing penyedia pihak ketiga. Kami menyarankan Anda untuk membaca kebijakan privasi mereka secara terpisah untuk memahami bagaimana data Anda diproses di luar platform Kostin.</p>

    <h2>Perubahan terhadap Kebijakan Privasi</h2>
    <p>Kostin dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu untuk menyesuaikan dengan perubahan hukum, teknologi, atau kebijakan internal. Jika terdapat perubahan signifikan, kami akan memberikan pemberitahuan melalui email atau notifikasi di aplikasi. Versi terbaru dari kebijakan ini akan selalu tersedia di halaman resmi kami. Kami menganjurkan Anda untuk secara berkala meninjau kebijakan ini agar tetap memahami bagaimana data Anda diproses.</p>

    <h2>Hubungi Kami</h2>
    <p>Jika Anda memiliki pertanyaan, keluhan, atau permintaan khusus terkait Kebijakan Privasi ini, Anda dapat menghubungi kami melalui informasi berikut:</p>
    <p><strong>Kostin Team</strong><br>
    📧 Email: support@kostin.id<br>
    📱 Telepon/WhatsApp: +62–812–XXXX–XXXX<br>
    🌐 Website: <a href="https://www.kostin.id" target="_blank">www.kostin.id</a></p>
    <p>Kami akan berusaha merespons semua permintaan dalam waktu yang wajar dan sesuai dengan peraturan perundang-undangan yang berlaku.</p>

    <p><em>Pembaruan per tanggal 25 Mei 2025</em></p>

</main>

    <!-- FAQ Section -->

    <!-- Footer -->
    <?php include '../apps/include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/scripts-home.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>