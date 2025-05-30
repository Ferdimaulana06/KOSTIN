<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['user_id'])) {
  header("Location: /apps/login.php");
  exit();
}

include 'config.php';

// Ambil data pengguna dari database
$user_id = $_SESSION['user_id'];

// Siapkan query untuk ambil full_name, biografi, dan profil_pictures
$stmt = $conn->prepare("SELECT full_name, biografi, profile_pictures FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

// Ambil hasilnya
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Cek jika data tidak ditemukan (misal user dihapus dari database)
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="../assets/css/style-profil.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <!-- Tombol Back to Home -->
  <nav class="navbar px-10 md:flex md:justify-between md:items-center md:px-24 md:py-4">
    <div class="nav-items" id="nav-items">
      <img class="size-28 md:size-36" src="../assets/img/index/kostintxt.svg" alt="kostin-logo" width="180" height="40"
        class="logo">
      <div class="user-menu hidden md:flex" id="user-menu md:flex mr-4 ml-4">
        <ul class="nav-links ">
          <li><a href="../apps/home.php">Home</a></li>
          <li><a href="../apps/logout.php">About</a></li>
          <li><a href="../apps/logout.php">Service</a></li>
          <li><a href="../apps/logout.php">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="flex gap-4 flex-row md:flex-row items-center justify-between">
      <button class="user-icon">
        <img class="" src="../assets/img/index/account_profile_user.png" alt="User Icon">
      </button>
      <button class="hamburger w-xs md:hidden md:w-xl" id="hamburger">
        <img class="size-8 md:size-48" src="../assets/img/index/hamburger.svg" alt="User Icon">
      </button>
    </div>
  </nav>
  <section class="section-profil pt-10 md:pt-0">
    <div class="container-profile flex flex-col md:flex-row">
      <div
        class="hidden md:flex container-kiri px-10  md:px-24 md:py-10 order-2 md:order-1 flex flex-col items-center md:items-start text-center md:text-left">
        <h2 class="profil text-2xl font-semibold">Profil</h2>
        <div class="list-menu">
          <a href="#">Tentang Saya</a>
          <a href="#">Riwayat</a>
        </div>
        <hr class="divider" />
        <a href="#" class="logout">
          <div class="keluar">Keluar</div>
        </a>

      </div>
      <div class="container-kanan px-10 md:px-24 md:pt-10 order-1 md:order-2">
        <div class="judul-container-kanan">
          <h2 class="text-center w-full md:text-left text-2xl font-semibold">Tentang Saya</h2>
          <a href="#" class="edit-profile hidden md:flex-start">
            <div class="Edit">Edit</div>
          </a>
        </div>
        <div class="w-full flex justify-center md:justify-start">
          <div class="card">
            <div class="card-body flex flex-col items-center justify-center">
              <img src="<?php echo htmlspecialchars($user['profil_pictures'] ?? 'raiso.jpg'); ?>"
                alt="Picture Not Found" class="foto-profile mb-2" />
              <p class="profil-nama text-center md:text-left"><?php echo htmlspecialchars($user['full_name']); ?></p>
            </div>
          </div>
        </div>
        <div class="w-full flex justify-center md:justify-start">
          <p id="biography" class="mt-10 text-center md:text-left max-w-md px-4 md:mt-4">
            <?php echo htmlspecialchars($_SESSION['biografi'] ?? 'Biografi belum tersedia.'); ?>
          </p>
        </div>
        <hr class="divider w-full" />
        <h2 class="text-center md:flex text-2xl font-semibold md:text-left">Kos Saya</h2>
        <div class="card-kos-saya w-full">
          <div class="kos-nama">Kos Wahjo</div>
          <div class="actions-kos-saya">
            <a href="#" class="lihat">Lihat</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="hapus">Hapus</a>
          </div>
        </div>

      </div>
  </section>
  <footer class="footer md:px-24 px-10">
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
</body>

</html>