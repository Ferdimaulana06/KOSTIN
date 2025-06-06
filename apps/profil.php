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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</head>

<body>
  <!-- Tombol Back to Home -->
  <?php include '../apps/include/navbar.php'; ?>
  <section class="section-profil pt-10 md:pt-0">
    <div class="container-profile flex flex-col md:flex-row">
      <div
        class="hidden md:flex container-kiri px-10  md:px-24 md:py-10 order-2 md:order-1 flex-col items-center md:items-start text-center md:text-left">
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
        <div
          class="w-full judul-container-kanan justify-center md:justify-start items-center md:items-start flex flex-col md:flex-row">
          <h2
            class="text-center justify-center items-center md:justify-start md:items-start md:text-left text-2xl font-semibold">
            Tentang Saya</h2>
          <a href="#" class="edit-profile hidden md:items-start md:justify-start md:flex">
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
  <?php include '../apps/include/footer.php'; ?>
</body>

</html>