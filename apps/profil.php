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
$stmt = $conn->prepare("SELECT full_name, biografi, profil_pictures FROM users WHERE id = ?");
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
</head>

<body>
  <!-- Tombol Back to Home -->
  <nav class="navbar">
    <div class="nav-items" id="nav-items">
      <img src="../assets/img/index/kostintxt.svg" alt="kostin-logo" width="180" height="40" class="logo">
      <div class="user-menu" id="user-menu">
        <ul class="nav-links">
          <li><a href="../apps/home.php">Home</a></li>
          <li><a href="../apps/logout.php">About</a></li>
          <li><a href="../apps/logout.php">Service</a></li>
          <li><a href="../apps/logout.php">Contact</a></li>
        </ul>
      </div>
    </div>
    <button class="user-icon">
      <img src="../assets/img/index/account_profile_user.png" alt="User Icon">
    </button>
  </nav>
  <section class="section-profil">
    <div class="container-profile">
      <div class="container-kiri">
        <h2 class="profil">Profil</h2>
        <div class="list-menu">
          <a href="#">Tentang Saya</a>
          <a href="#">Riwayat</a>
        </div>
        <hr class="divider" />
        <a href="#" class="logout">
          <div class="keluar">Keluar</div>
        </a>
      </div>
      <div class="container-kanan">
        <div class="judul-container-kanan">
          <h2>Tentang Saya</h2>
          <a href="#" class="edit-profile">
            <div class="Edit">Edit</div>
          </a>
        </div>
        <div class="card">
          <div class="card-body">
            <img src="<?php echo htmlspecialchars($user['profil_pictures'] ?? 'raiso.jpg'); ?>" alt="Profile"
              class="foto-profile" />
            <p class=" profil-nama"><?php echo htmlspecialchars($user['full_name']); ?></p>
          </div>
        </div>
        <p id="biography">
          <?php echo htmlspecialchars($_SESSION['biografi'] ?? 'Biografi belum tersedia.'); ?>
        </p>
        <hr class="divider" />
        <h2>Kos Saya</h2>
        <div class="card-kos-saya">
          <div class="kos-nama">Kos Wahjo</div>
          <div class="actions-kos-saya">
            <a href="#" class="lihat">Lihat</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="hapus">Hapus</a>
          </div>
        </div>

      </div>
  </section>
</body>

</html>