<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/cari.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../apps/include/navbar.php'; ?>
    <section>
        <div class="container-cari max-w-4xl md:px-24 px-10 justify-center mx-auto">
            <h2 class="text-center text-2xl font-semibold mt-8">Cari Kost</h2>
            <div class="flex w-full max-w-4xl mt-4 justify-center items-center mx-auto">
                <input type="text" placeholder="Ketik nama kost atau lokasi..."
                    class=" search-input-custom w-full px-4 border border-gray-500 rounded-l-sm focus:outline-none" />

                <button type="submit" class="rounded-r-sm search-button-custom px-4 flex items-center justify-center">
                    <img src="../assets/img/index/fi-br-search.svg"
                        class="w-5 h-5 filter group-hover:invert group-hover:brightness-0 group-hover:contrast-200"
                        alt="Cari">
                </button>
            </div>


            <div class="max-w-xl mx-auto mt-8 space-y-8 md:max-w-5xl">
                <!-- Item Kos -->
                <div
                    class="md:max-w-4xl max-w-xl mx-auto bg-white rounded shadow-md overflow-hidden flex flex-col md:flex-row">

                    <!-- Jika gambar ADA -->
                    <!-- <img src="your-image.jpg" alt="Kos Iking" class="w-full md:w-64 h-48 object-cover" /> -->

                    <!-- Jika gambar BELUM ADA -->
                    <div
                        class="w-full md:w-64 h-48 bg-gray-300 flex items-center justify-center text-gray-500 text-sm italic">
                        No Image
                    </div>

                    <!-- Konten -->
                    <div class="p-5 flex flex-col justify-between flex-1">
                        <div>
                            <h2 class="text-xl font-bold flex items-center gap-2">
                                Kos Iking
                                <span class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded">Kos Putra</span>
                            </h2>
                            <p class="text-sm text-gray-600 mt-3 flex items-center">
                                <img src="..\assets\img\index\fi-br-marker.svg" alt=""
                                    class="w-4 h-4 mr-1 items-center">
                                Kramat Selatan, Magelang Utara
                            </p>
                        </div>
                        <p class="text-lg text-blue-600 font-bold mt-2 md:mt-4">Rp 650.000/Bulan</p>
                    </div>
                </div>

                <!-- Item Kos 2 -->
                <div class="max-w-4xl mx-auto bg-white rounded shadow-md overflow-hidden flex flex-col md:flex-row">

                    <!-- Jika gambar ADA -->
                    <!-- <img src="your-image.jpg" alt="Kos Iking" class="w-full md:w-64 h-48 object-cover" /> -->

                    <!-- Jika gambar BELUM ADA -->
                    <div
                        class="w-full md:w-64 h-48 bg-gray-300 flex items-center justify-center text-gray-500 text-sm italic">
                        No Image
                    </div>

                    <!-- Konten -->
                    <div class="p-5 flex flex-col justify-between flex-1">
                        <div>
                            <h2 class="text-xl font-bold flex items-center gap-2">
                                Kos Iking
                                <span class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded">Kos Putra</span>
                            </h2>
                            <p class="text-sm text-gray-600 mt-3 flex items-center">
                                <img src="..\assets\img\index\fi-br-marker.svg" alt=""
                                    class="w-4 h-4 mr-1 items-center">
                                Kramat Selatan, Magelang Utara
                            </p>
                        </div>
                        <p class="text-lg text-blue-600 font-bold mt-2 md:mt-4">Rp 650.000/Bulan</p>
                    </div>
                </div>

                <!-- Item Kos 3 -->
                <div
                    class="max-w-2xl mx-auto bg-white rounded shadow-md overflow-hidden flex flex-col md:flex-row md:max-w-4xl">

                    <!-- Jika gambar ADA -->
                    <!-- <img src="your-image.jpg" alt="Kos Iking" class="w-full md:w-64 h-48 object-cover" /> -->

                    <!-- Jika gambar BELUM ADA -->
                    <div
                        class="w-full md:w-64 h-48 bg-gray-300 flex items-center justify-center text-gray-500 text-sm italic">
                        No Image
                    </div>

                    <!-- Konten -->
                    <div class="p-5 flex flex-col justify-between flex-1">
                        <div>
                            <h2 class="text-xl font-bold flex items-center gap-2">
                                Kos Iking
                                <span class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded">Kos Putra</span>
                            </h2>
                            <p class="text-sm text-gray-600 mt-3 flex items-center">
                                <img src="..\assets\img\index\fi-br-marker.svg" alt=""
                                    class="w-4 h-4 mr-1 items-center">
                                Kramat Selatan, Magelang Utara
                            </p>
                        </div>
                        <p class="text-lg text-blue-600 font-bold mt-2 md:mt-4">Rp 650.000/Bulan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include '../apps/include/footer.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>