<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

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

// === Persiapan Paginasi “Kos Saya” ===
$page    = max(1, intval($_GET['page'] ?? 1));
$perPage = 5;
$offset  = ($page - 1) * $perPage;

// Hitung total listing milik user
$countStmt = $conn->prepare("SELECT COUNT(*) FROM data_kos WHERE user_id = ?");
$countStmt->bind_param("i", $user_id);
$countStmt->execute();
$countStmt->bind_result($total);
$countStmt->fetch();
$countStmt->close();
$totalPages = ceil($total / $perPage);

// Ambil data listing untuk halaman ini
$listStmt = $conn->prepare("
    SELECT id, nama_kos 
    FROM data_kos 
    WHERE user_id = ?
    ORDER BY created_at DESC
    LIMIT ? OFFSET ?
");
$listStmt->bind_param("iii", $user_id, $perPage, $offset);
$listStmt->execute();
$myKos = $listStmt->get_result()->fetch_all(MYSQLI_ASSOC);
$listStmt->close();

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="/assets/css/style-profile-baru.css" />
  <link rel="icon" href="/assets/img/home/kostin.svg" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
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
                  <li>
                      <a href="logout.php"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Keluar</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <!-- Section Profil -->
  <section class="section-profil pt-10 md:pt-0">
    <div class="container-profile flex flex-col md:flex-row">
      <!-- Sidebar Kiri -->
      <div class="hidden md:flex container-kiri px-10 md:px-24 md:py-10 order-2 md:order-1 flex flex-col items-center md:items-start text-center md:text-left">
        <h2 class="profil text-2xl font-semibold">Profil</h2>
        <div class="list-menu">
          <a href="#">Tentang Saya</a>
          <a href="#">Kos Saya</a>
        </div>
        <hr class="divider" />
        <a href="logout.php" class="logout">
          <div class="keluar">Keluar</div>
        </a>
      </div>

      <!-- Konten Kanan -->
      <div class="container-kanan px-10 md:px-24 md:pt-10 order-1 md:order-2">
        <!-- Judul dan Tombol Edit -->
        <div class="judul-container-kanan flex items-center gap-3">
          <h2 class="text-center w-full md:text-left text-2xl font-semibold md:w-auto mb-0">Tentang Saya</h2>
          <a href="edit-profile.php" class="edit-profile hidden md:flex">
            <div class="Edit">Edit</div>
          </a>
        </div>

        <!-- Kartu Profil -->
        <div class="w-full flex justify-center md:justify-start">
          <div class="card">
            <div class="card-body flex flex-col items-center justify-center">
              <a href="edit-profile.php">
          <img src="<?= $fotoSrc ?>" alt="Avatar Pengguna" class="foto-profile mb-2" style="cursor:pointer;" />
              </a>
              <p class="profil-nama"><?= htmlspecialchars($user['full_name']) ?></p>
            </div>
          </div>
        </div>

        <!-- Bio / Deskripsi Diri -->
        <div class="w-full flex justify-center md:justify-start">
          <p id="biography" class="mt-10 text-center md:text-left max-w-md px-4 md:mt-4">
            <?= $user['bio'] !== null
                ? nl2br(htmlspecialchars($user['bio']))
                : '<em>Biografi belum tersedia.</em>' ?>
          </p>
        </div>

        <hr class="divider w-full" />

        <!-- Bagian “Kos Saya” -->
        <h2 class="text-center md:flex text-2xl font-semibold md:text-left">Kos Saya</h2>

        <?php if ($myKos): ?>
          <!-- Daftar Listing -->
          <div class="mt-4 space-y-4">
            <?php foreach ($myKos as $kos): ?>
              <div class="card-kos-saya w-full">
                <div class="kos-nama"><?= htmlspecialchars($kos['nama_kos']) ?></div>
                <div class="actions-kos-saya">
                  <a href="lihat-kos.php?id=<?= $kos['id'] ?>" class="lihat">Lihat</a>
                  <a href="edit-kos.php?id=<?= $kos['id'] ?>" class="edit">Edit</a>
                  <a href="hapus-kos.php?id=<?= $kos['id'] ?>" class="hapus"
                     onclick="return confirm('Yakin ingin menghapus kos ini?');">Hapus</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Pagination -->
          <?php if ($totalPages > 1): ?>
            <div class="pagination mt-6 flex justify-center gap-4">
              <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="px-3 py-1 border rounded">Prev</a>
              <?php endif; ?>
              <span class="px-3 py-1">Halaman <?= $page ?> / <?= $totalPages ?></span>
              <?php if ($page < $totalPages): ?>
                <a href="?page=<?= $page + 1 ?>" class="px-3 py-1 border rounded">Next</a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        <?php else: ?>
          <p class="mt-4">
            Anda belum punya kos. <a href="sewakan-kos.php" class="text-blue-600">Sewakan kos sekarang!</a>
          </p>
        <?php endif; ?>
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

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>
