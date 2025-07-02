<?php
// ==========================================
// cari-kos.php
// ==========================================
session_start();

// include 'config.php' berisi koneksi database ($conn)
include 'config.php';

// Ambil data pengguna (untuk avatar di navbar)
$user_id = $_SESSION['user_id'] ?? null;
$fotoSrc = '/assets/img/home/account_profile_user.png';
if ($user_id) {
    $stmt = $conn->prepare("SELECT foto FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!empty($user['foto'])) {
        $fotoSrc = "uploads/foto/" . htmlspecialchars($user['foto']);
    }
}

// Ambil kata kunci pencarian
$query   = trim($_GET['query'] ?? '');
$page    = max(1, intval($_GET['page'] ?? 1));
$perPage = 10;
$offset  = ($page - 1) * $perPage;

// Jika query kosong, redirect ke home
if ($query === '') {
    header("Location: home.php");
    exit();
}

// Hitung total hasil (cari di nama_kos atau alamat)
$countStmt = $conn->prepare("
    SELECT COUNT(*) 
    FROM data_kos 
    WHERE nama_kos LIKE CONCAT('%', ?, '%')
       OR alamat   LIKE CONCAT('%', ?, '%')
");
$countStmt->bind_param("ss", $query, $query);
$countStmt->execute();
$countStmt->bind_result($total);
$countStmt->fetch();
$countStmt->close();

$totalPages = max(1, ceil($total / $perPage));

// Ambil data hasil pencarian
$stmt = $conn->prepare("
    SELECT dk.id,
           dk.nama_kos,
           dk.kategori,
           dk.alamat,
           dk.harga,
           -- Ambil satu gambar pertama (jika ada)
           (SELECT nama_file 
            FROM gambar_kos 
            WHERE id_gambar_kos = dk.id 
            LIMIT 1) AS thumb
    FROM data_kos dk
    WHERE dk.nama_kos LIKE CONCAT('%', ?, '%')
       OR dk.alamat   LIKE CONCAT('%', ?, '%')
    ORDER BY dk.created_at DESC
    LIMIT ? OFFSET ?
");
$stmt->bind_param("ssii", $query, $query, $perPage, $offset);
$stmt->execute();
$results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cari Kost: <?= htmlspecialchars($query) ?></title>
  <link rel="stylesheet" href="/assets/css/style-cari.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="icon" href="/assets/img/home/kostin.svg" />
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

  <!-- Bagian Pencarian -->
  <section class="search-section">
    <div class="search-container">
      <form action="cari-kos.php" method="GET" class="search-box">
        <input
          type="text"
          name="query"
          placeholder="Ketik nama kost atau lokasi..."
          value="<?= htmlspecialchars($query) ?>"
          class="search-input-custom"
          required
        />
        <button type="submit" class="search-button-custom">
          <img src="/assets/img/home/fi-br-search.svg" alt="Cari" class="icon-cari" />
        </button>
      </form>
    </div>
  </section>

  <!-- Hasil Pencarian -->
  <section class="results-section">
    <div class="results-container">
      <?php if ($results): ?>
        <?php foreach ($results as $r): ?>
          <div class="result-card">
            <?php if (!empty($r['thumb'])): ?>
              <img
                src="/apps/uploads/gambar_kos/<?= $r['id'] ?>/<?= htmlspecialchars($r['thumb']) ?>"
                alt="<?= htmlspecialchars($r['nama_kos']) ?>"
                class="result-image"
              />
            <?php else: ?>
              <div class="no-image">No Image</div>
            <?php endif; ?>

            <div class="result-content">
              <!-- Judul jadi tautan ke detail -->
              <h3 class="result-title">
                <a href="lihat-kos.php?id=<?= $r['id'] ?>" class="title-link">
                  <?= htmlspecialchars($r['nama_kos']) ?>
                </a>
                <span class="badge"><?= ucfirst(htmlspecialchars($r['kategori'])) ?></span>
              </h3>

              <p class="result-location">
                <img src="/assets/img/home/lokasi.svg" alt="Lokasi" class="location-icon" />
                <?= htmlspecialchars($r['alamat']) ?>
              </p>
              <p class="result-price">Rp <?= number_format($r['harga'], 0, ',', '.') ?>/bulan</p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="no-results">Tidak ada hasil untuk “<?= htmlspecialchars($query) ?>”.</p>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
      <div class="pagination">
        <?php if ($page > 1): ?>
          <a href="?query=<?= urlencode($query) ?>&page=<?= $page - 1 ?>" class="page-link">Prev</a>
        <?php endif; ?>
        <span class="page-info">Halaman <?= $page ?> / <?= $totalPages ?></span>
        <?php if ($page < $totalPages): ?>
          <a href="?query=<?= urlencode($query) ?>&page=<?= $page + 1 ?>" class="page-link">Next</a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
