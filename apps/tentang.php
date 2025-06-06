<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="../assets/css/tentang.css">
</head>

<body>
    <?php include '../apps/include/navbar.php'; ?>
    <section
        class="sectionatas items-center mx-auto justify-center flex flex-col md:flex-row  md:items-center bg-cover bg-center max-w-[100rem] h-[500px] w-full">
        <div class="flex flex-col justify-center items-center my-auto px-10 md:px-24">
            <h2 class="text-center text-3xl font-semibold text-white">Tentang Kami</h2>
            <p class="text-center text-m font-light mt-3 text-white text-wrap">KOSTIN hadir sebagai solusi cerdas bagi
                siapa saja
                yang mencari tempat tinggal nyaman mulai dari mahasiswa, pekerja perantau, hingga keluarga kecil.</p>
        </div>


    </section>
    <section class="section-1 py-[40px] mx-auto justify-center items-center md:px-[100px] px-[40px]">
        <div
            class="lg:bg-white md:bg-white px-6 py-6 md:py-10 md:px-24 max-w-[100rem] flex flex-col md:flex-row lg:flex-row lg:justify-between items-center justify-center lg:gap-20 lg:rounded-none lg:shadow-none bg-white rounded-lg shadow-xl">
            <div class=" flex flex-col md:flex-col lg:flex-row items-start md:items-center gap-8">
                <!-- Konten Teks -->
                <div class="w-full flex flex-col text-left">
                    <!-- H2 -->
                    <h2 class="text-2xl md:text-3xl font-bold leading-8 text-black mb-8">
                        Layanan untuk Pencari Kos
                    </h2>

                    <!-- Gambar (tampil setelah h2 saat mobile) -->
                    <div class="lg:hidden order-2 mb-8">
                        <img src="../assets/img/index/tentang.png" alt="Layanan Pencari Kos"
                            class="rounded-md w-full h-auto" />
                    </div>

                    <!-- Deskripsi -->
                    <div class="space-y-8 text-gray-800 order-3">
                        <p class="leading-8"><span class="text-blue-600">KOSTIN</span> adalah platform pencarian kos
                            <br> sewa yang menghubungkan pencari
                            hunian dengan <br>
                            pemilik properti secara langsung.
                        </p>
                        <p class="leading-8">Kami berkomitmen memberikan pengalaman terbaik:</p>
                        <ul class="list-disc pl-5 leading-8">
                            <li>Antarmuka yang mudah digunakan</li>
                            <li>Filter pencarian lengkap</li>
                            <li>Informasi detail properti</li>
                            <li>Fitur komunikasi langsung</li>
                        </ul>
                    </div>
                </div>

                <!-- Gambar untuk versi desktop -->
                <div class="hidden lg:block md:order-2 md:hidden">
                    <img src="../assets/img/index/tentang.png" alt="Layanan Pencari Kos"
                        class="rounded-md w-full h-auto md:hidden hidden lg:flex " />
                </div>
            </div>

    </section>
    <section
        class="max-w-[100rem] py-[40px] mx-auto justify-center items-center md:px-[100px] px-[40px] lg:bg-gray-100 bg-white">
        <div
            class=" lg:bg-gray-100 md:bg-white px-6 py-6 md:py-10 md:px-24 max-w-[100rem] flex flex-col md:flex-col lg:flex-row lg:items-start lg:justify-between items-center justify-center lg:gap-20 lg:rounded-none lg:shadow-none bg-white rounded-lg shadow-xl">
            <div class="space-y-6 text-gray-800">
                <!-- 1. Kemudahan -->
                <div>
                    <h3 class="font-bold text-lg">1. Kemudahan</h3>
                    <p class="mt-1 text-base leading-8">
                        Kami merancang seluruh fitur agar proses pencarian dan penyewaan hunian bisa dilakukan dengan
                        cepat dan tanpa ribet.
                    </p>
                </div>

                <!-- 2. Kepercayaan -->
                <div>
                    <h3 class="font-bold text-lg">2. Kepercayaan</h3>
                    <p class="mt-1 text-base leading-8">
                        Data pemilik dan properti telah melalui proses verifikasi agar pengguna merasa aman dan nyaman.
                    </p>
                </div>

                <!-- 3. Transparansi -->
                <div>
                    <h3 class="font-bold text-lg">3. Transparansi</h3>
                    <p class="mt-1 text-base leading-8">
                        Informasi harga, fasilitas, dan ketentuan sewa ditampilkan secara jujur dan lengkap, tanpa ada
                        yang ditutupi.
                    </p>
                </div>

                <!-- 4. Inovasi -->
                <div>
                    <h3 class="font-bold text-lg">4. Inovasi</h3>
                    <p class="mt-1 text-base leading-8">
                        Kami terus menghadirkan teknologi dan pembaruan terbaru untuk meningkatkan pengalaman pengguna
                        secara menyeluruh.
                    </p>
                </div>
            </div>
            <div
                class="hidden lg:flex md:hidden flex-col md:flex-row items-start md:items-center md:mr-[150px] md:order-1 mr-0">
                <!-- Gambar untuk versi desktop -->
                <div
                    class="hidden lg:flex md:hidden h-[440px] w-[300px] bg-[url(../assets/img/index/card-tentang.png)] bg-cover bg-center rounded-xl">
                </div>
                <!-- Konten Teks -->

            </div>
    </section>
    <?php include '../apps/include/footer.php'; ?>
</body>

</html>