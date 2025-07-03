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
    <title>Kebijakan Privasi - Kostin</title>
    <link rel="icon" href="../assets/img/home/kostin.svg">
    <link rel="stylesheet" href="../assets/css/style-home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navigation -->
    <?php include '../apps/include/navbar.php'; ?>

<main class="max-w-3xl mx-auto px-4 py-10 bg-white rounded-lg shadow-md mt-8 mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Kebijakan Privasi</h1>
    <p class="text-gray-700 mb-6 leading-relaxed">
        Kostin (selanjutnya disebut “kami”, “Kostin”, atau “platform”) berkomitmen untuk menjaga dan melindungi privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, melindungi, dan mengungkapkan informasi pribadi Anda saat Anda mengakses dan menggunakan layanan kami, termasuk namun tidak terbatas pada website, aplikasi mobile, dan sistem backend Kostin.<br>
        Dengan menggunakan layanan Kostin, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini.
    </p>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Informasi yang Kami Kumpulkan</h2>
        <p class="text-gray-700 leading-relaxed">
            Kostin mengumpulkan beberapa jenis informasi untuk keperluan operasional layanan dan peningkatan pengalaman pengguna. Informasi pribadi yang kami kumpulkan meliputi nama lengkap, alamat email, nomor telepon, dan informasi akun seperti username dan kata sandi. Kami juga dapat mengumpulkan informasi lokasi (berdasarkan izin GPS atau alamat IP), informasi teknis seperti jenis perangkat, browser, dan alamat IP, serta riwayat aktivitas Anda di platform, termasuk pencarian kos, pemesanan, dan interaksi melalui chat dan ulasan. Dalam proses transaksi, kami dapat mengumpulkan data pembayaran seperti metode pembayaran, status transaksi, dan informasi terkait bukti pembayaran.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Penggunaan Informasi</h2>
        <p class="text-gray-700 leading-relaxed">
            Informasi yang kami kumpulkan digunakan untuk menyediakan dan mengelola layanan pencarian dan pemesanan kos secara efisien. Data ini membantu kami memverifikasi identitas pengguna, memproses transaksi, menampilkan listing kos yang relevan, dan menghubungkan penyewa dengan pemilik melalui fitur chat. Selain itu, informasi Anda juga digunakan untuk memberikan notifikasi penting, memperbaiki layanan melalui analisis data, serta memastikan sistem tetap aman dari penyalahgunaan atau penipuan. Kami hanya akan menggunakan informasi Anda sesuai dengan tujuan yang dijelaskan di kebijakan ini dan tidak akan menggunakan data Anda untuk keperluan lain tanpa persetujuan Anda.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Dasar Hukum Pengolahan Data</h2>
        <p class="text-gray-700 leading-relaxed">
            Pengolahan data pribadi di Kostin dilakukan berdasarkan beberapa dasar hukum yang sah. Kami mengandalkan persetujuan eksplisit Anda saat Anda mendaftar dan menggunakan layanan kami. Selain itu, pengolahan data juga dapat dilakukan sebagai bagian dari pelaksanaan kontrak layanan yang Anda gunakan, pemenuhan kewajiban hukum tertentu, dan kepentingan sah kami dalam menjaga keamanan serta meningkatkan kualitas layanan.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Pengungkapan Informasi kepada Pihak Ketiga</h2>
        <p class="text-gray-700 leading-relaxed">
            Kostin tidak akan menjual atau menyewakan data pribadi Anda kepada pihak ketiga mana pun. Namun, kami dapat membagikan informasi tertentu kepada mitra layanan yang membantu operasional platform, seperti penyedia layanan peta (misalnya Google Maps), gateway pembayaran, penyedia layanan cloud, dan layanan analitik. Kami juga dapat membagikan data kepada otoritas hukum jika diminta secara sah oleh pengadilan atau lembaga yang berwenang. Semua pihak ketiga yang bekerja sama dengan Kostin diwajibkan mematuhi standar perlindungan data yang ketat.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Keamanan dan Penyimpanan Data</h2>
        <p class="text-gray-700 leading-relaxed">
            Kami menjaga data pribadi Anda menggunakan langkah-langkah teknis dan organisasi yang canggih untuk mencegah akses tidak sah, kehilangan, atau penyalahgunaan data. Data penting seperti kata sandi disimpan dalam bentuk terenkripsi, dan akses ke sistem dibatasi hanya untuk personel yang berwenang. Kami hanya menyimpan data selama diperlukan untuk keperluan layanan, hukum, atau audit internal. Setelah masa penyimpanan berakhir, data akan dihapus secara permanen dari sistem kami.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Hak Anda sebagai Pengguna</h2>
        <p class="text-gray-700 leading-relaxed">
            Sebagai pengguna, Anda memiliki hak penuh atas data pribadi yang Anda berikan kepada kami. Anda dapat mengakses dan memperbarui informasi pribadi Anda kapan saja melalui pengaturan akun. Jika Anda ingin menghapus akun atau menarik persetujuan penggunaan data, Anda dapat mengajukan permintaan kepada kami melalui kontak yang tersedia. Kami juga menghormati hak Anda untuk membatasi atau menolak pemrosesan data tertentu, sepanjang tidak mengganggu fungsi utama layanan.
        </p>
    </section>
    
    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Cookie dan Teknologi Pelacakan</h2>
        <p class="text-gray-700 leading-relaxed">
            Untuk meningkatkan kenyamanan dan kinerja situs, kami menggunakan cookie dan teknologi pelacakan lainnya. Cookie membantu kami mengenali pengguna, menyimpan preferensi, dan menganalisis lalu lintas situs. Anda dapat menonaktifkan cookie melalui pengaturan browser, namun beberapa fitur situs mungkin tidak berfungsi optimal jika cookie dinonaktifkan. Informasi yang dikumpulkan melalui cookie tidak digunakan untuk mengidentifikasi Anda secara pribadi tanpa persetujuan eksplisit.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Integrasi Layanan Pihak Ketiga</h2>
        <p class="text-gray-700 leading-relaxed">
            Kostin dapat mengintegrasikan layanan dari pihak ketiga untuk mendukung fitur seperti peta interaktif, sistem pembayaran, notifikasi, atau autentikasi. Penggunaan layanan tersebut tunduk pada kebijakan privasi dari masing-masing penyedia pihak ketiga. Kami menyarankan Anda untuk membaca kebijakan privasi mereka secara terpisah untuk memahami bagaimana data Anda diproses di luar platform Kostin.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Perubahan terhadap Kebijakan Privasi</h2>
        <p class="text-gray-700 leading-relaxed">
            Kostin dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu untuk menyesuaikan dengan perubahan hukum, teknologi, atau kebijakan internal. Jika terdapat perubahan signifikan, kami akan memberikan pemberitahuan melalui email atau notifikasi di aplikasi. Versi terbaru dari kebijakan ini akan selalu tersedia di halaman resmi kami. Kami menganjurkan Anda untuk secara berkala meninjau kebijakan ini agar tetap memahami bagaimana data Anda diproses.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Hubungi Kami</h2>
        <p class="text-gray-700 leading-relaxed">
            Jika Anda memiliki pertanyaan, keluhan, atau permintaan khusus terkait Kebijakan Privasi ini, Anda dapat menghubungi kami melalui informasi berikut:
        </p>
        <div class="bg-gray-50 border rounded p-4 mt-2 mb-4">
            <p class="font-semibold text-gray-800">Kostin Team</p>
            <p class="text-gray-700">📧 Email: <a href="mailto:support@kostin.id" class="text-blue-600 hover:underline">support@kostin.id</a></p>
            <p class="text-gray-700">📱 Telepon/WhatsApp: +62–812–XXXX–XXXX</p>
            <p class="text-gray-700">🌐 Website: <a href="https://www.kostin.ct.ws" target="_blank" class="text-blue-600 hover:underline">www.kostin.id</a></p>
        </div>
        <p class="text-gray-600"><em>Pembaruan per tanggal 25 Mei 2025</em></p>
    </section>
</main>

    <!-- Footer -->
    <?php include '../apps/include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>