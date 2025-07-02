<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Ambil ID Kos dari query string
$kos_id = intval($_GET['id'] ?? 0);
if ($kos_id <= 0) {
    die("ID Kos tidak valid.");
}

// Ambil data pengguna
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT full_name, email, foto, bio FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Tentukan sumber foto (avatar)
$defaultFoto = '/assets/img/home/account_profile_user.png';
$fotoSrc = !empty($user['foto'])
    ? "uploads/foto/" . htmlspecialchars($user['foto'])
    : $defaultFoto;

// Ambil data utama (termasuk owner_id untuk cek hak edit/hapus)
$stmt = $conn->prepare("
  SELECT dk.nama_kos,
         dk.kategori,
         dk.alamat,
         dk.harga,
         dk.telepon,
         dk.deskripsi,
         dk.user_id AS owner_id,
         u.full_name
  FROM data_kos dk
  JOIN users u ON dk.user_id = u.id
  WHERE dk.id = ?
");
$stmt->bind_param("i", $kos_id);
$stmt->execute();
$stmt->bind_result($nama_kos, $kategori, $alamat, $harga, $telepon, $deskripsi, $owner_id, $owner_name);
if (!$stmt->fetch()) {
    die("Kos tidak ditemukan.");
}
$stmt->close();

// Ambil semua nama_file gambar untuk gallery
$images = [];
$gst = $conn->prepare("
  SELECT nama_file
  FROM gambar_kos
  WHERE id_gambar_kos = ?
");
$gst->bind_param("i", $kos_id);
$gst->execute();
$gst->bind_result($gf);
while ($gst->fetch()) {
    $images[] = $gf;
}
$gst->close();

// Ambil daftar nama fasilitas
$fats = [];
$fst = $conn->prepare("
  SELECT f.nama
  FROM daftar_fasilitas df
  JOIN fasilitas f ON df.id_fasilitas = f.id
  WHERE df.id_daftar_fasilitas = ?
");
$fst->bind_param("i", $kos_id);
$fst->execute();
$fst->bind_result($fname);
while ($fst->fetch()) {
    $fats[] = $fname;
}
$fst->close();

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($nama_kos) ?></title>
  <!-- User akan menyesuaikan sendiri file CSS -->
  <link rel="stylesheet" href="/assets/css/style-lihat-kos.css" />
  <link rel="icon" href="/assets/img/home/kostin.svg" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar px-10 md:flex md:justify-between md:items-center md:px-24 md:py-4 max-w-[100rem] mx-auto">
      <div class="nav-items" id="nav-items">
          <img class="h-[36px] md:h-[42px]" src="/assets/img/home/kostintxt.svg" alt="kostin-logo" width="180"
              height="40" class="logo">
          <div class="user-menu hidden md:hidden lg:flex" id="user-menu md:flex mr-4 ml-4">
              <ul class="nav-links ">
                  <li><a href="/apps/home.php">Beranda</a></li>
                  <li><a href="/apps/tentang.php">Tentang</a></li>
                  <li><a href="/apps/layanan.php">Layanan</a></li>
                  <li><a href="/apps/kontak.php">Kontak</a></li>
              </ul>
          </div>
      </div>
      <div class="flex gap-4 flex-row md:flex-row items-center justify-between">
          <a href="/apps/sewakan-kos.php"
              class="hidden md:hidden lg:flex items-center justify-center bg-[#2966CB] text-white px-[30px] py-[12px] h-[42px] text-center transition ease-in-out duration-300 hover:bg-[#3482ff] hover:scale-105">
              Sewakan Rumah Anda
          </a>

          <button class="user-icon" onclick="window.location.href='profil.php';">
              <img src="<?= $fotoSrc ?>" alt="User Icon" class="user-icon-image h-[36px] md:h-[42px]">
          </button>

          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="w-xs flex md:flex lg:hidden md:w-xl "
              type="button"><img class="h-[36px] md:h-[42px]" src="../assets/img/home/hamburger.svg" alt="User Icon">
          </button>

          <!-- Dropdown menu -->
          <div id="dropdown"
              class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                  <li>
                      <a href="home.php"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Beranda</a>
                  </li>
                  <li>
                      <a href="sewakan-kos.php"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sewakan
                          Kos</a>
                  </li>
                  <li>
                      <a href="tentang.php"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tentang</a>
                  </li>
                  <li>
                      <a href="layanan.php"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Layanan</a>
                  </li>
                  <li>
                      <a href="kontak.php"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kontak</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <!-- Search Section -->
  <section class="w-full bg-gray-50 py-8">
    <div class="container mx-auto px-6 md:px-24">
      <form action="cari-kos.php" method="GET" class="flex max-w-xl mx-auto">
        <input
          type="text"
          name="query"
          placeholder="Ketik nama kost atau lokasi..."
          value="<?= htmlspecialchars($query) ?>"
          required
          class="flex-1 p-3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#2966CB]"
        />
        <button type="submit"
                class="bg-[#2966CB] hover:bg-[#153366] px-4 rounded-r-md flex items-center justify-center">
          <img src="/assets/img/home/fi-br-search.svg" alt="Cari" class="h-5 w-5" />
        </button>
      </form>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="w-full py-8">
    <div class="container mx-auto px-6 md:px-24">
      <?php if (count($images) > 0): ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
          <?php foreach ($images as $img): ?>
            <img
              src="/apps/uploads/gambar_kos/<?= $kos_id ?>/<?= htmlspecialchars($img) ?>"
              alt="Gambar <?= htmlspecialchars($nama_kos) ?>"
              class="w-full h-40 object-cover rounded-md shadow-sm"
            />
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="text-center text-gray-500 italic">Belum ada foto</div>
      <?php endif; ?>
    </div>
  </section>

  <!-- Main Info Section -->
  <section class="w-full py-8 bg-white">
    <div class="container mx-auto px-6 md:px-24">
      <div class="mb-6">
        <h1 class="text-3xl font-semibold"><?= htmlspecialchars($nama_kos) ?></h1>
        <div class="flex items-center text-gray-600 mt-2 space-x-2">
          <span class="px-2 py-1 bg-gray-100 rounded"><?= ucfirst(htmlspecialchars($kategori)) ?></span>
          <span>•</span>
          <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 16 16"><path d="M8 0a5.5 5.5 0 0 0-5.5 5.5c0 4.418 5.5 10.5 5.5 10.5s5.5-6.082 5.5-10.5A5.5 5.5 0 0 0 8 0zm0 8a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg><?= nl2br(htmlspecialchars($alamat)) ?></span>
        </div>
      </div>

      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Left Column -->
        <div class="flex-1 space-y-8">
          <!-- Owner Info -->
          <div class="flex items-center space-x-4">
            <img src="<?= $fotoSrc ?>" alt="Owner" class="h-12 w-12 rounded-full object-cover" />
            <div>
              <p class="font-medium">Kos dikelola oleh <?= htmlspecialchars($owner_name) ?></p>
            </div>
          </div>

          <!-- Fasilitas -->
          <?php if ($fats): ?>
            <div>
              <h3 class="text-xl font-semibold mb-2">Fasilitas</h3>
              <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <?php foreach ($fats as $fn): ?>
                  <div class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-md text-gray-700">
                    <?= htmlspecialchars($fn) ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- Deskripsi & Peraturan -->
          <div>
            <h3 class="text-xl font-semibold mb-2">Peraturan & Deskripsi</h3>
            <p class="text-gray-700 leading-relaxed whitespace-pre-line"><?= htmlspecialchars($deskripsi) ?></p>
          </div>
        </div>

        <!-- Right Column: Pricing & CTA -->
        <div class="w-full lg:w-1/3">
          <div class="border border-gray-200 rounded-lg p-6 shadow-sm">
            <div class="text-center mb-4">
              <p class="text-3xl font-bold">Rp <?= number_format($harga, 0, ',', '.') ?></p>
              <p class="text-gray-600">per bulan</p>
            </div>
            <a href="https://wa.me/<?= urlencode(ltrim($telepon, '+')) ?>" target="_blank" rel="noopener">
              <button class="w-full bg-[#2966CB] hover:bg-[#153366] text-white py-3 rounded-md font-medium">
                Tanya Pemilik
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

     <!-- Footer -->
  <footer class="footer md:px-24 px-10">
    <div class="footer-top justify-center flex-col md:flex md:justify-between md:flex-row">
      <div class="logo-kostin flex justify-center md:justify-start">
        <img src="/assets/img/home/kostin-white.svg" alt="KOSTIN Logo" />
      </div>
      <nav class="footer-nav flex-col justify-center items-center md:flex-row md:items-start">
        <a href="tentang.php">Tentang Kami</a>
        <a href="faq.php">FAQ</a>
        <a href="kontak.php">Kontak Kami</a>
        <a href="kebijakan-privasi.php">Kebijakan Privasi</a>
      </nav>
    </div>
    <div class="footer-bottom">
      © 2025 KOSTIN. Made with Love ❤️.
    </div>
  </footer>
    <!-- Script Lightbox -->
    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <img src="" id="lightbox-img">
    </div>

    <script>
    // Ganti gambar utama saat thumbnail diklik
    function changeMainImage(element) {
        const mainImage = document.querySelector('.gallery-main');
        mainImage.src = element.src;
        mainImage.alt = element.alt;
    }

    // Efek Lightbox
    document.querySelectorAll('.gallery img').forEach(img => {
        img.addEventListener('click', function() {
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        lightbox.style.display = 'flex';
        lightboxImg.src = this.src;
        });
    });

    function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
