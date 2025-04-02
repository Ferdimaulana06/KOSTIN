<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /apps/login.php");
    exit();
}

include 'config.php';

// Ambil data pengguna dari database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT full_name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="/assets/css/style-profil.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    /* Styling tambahan untuk tombol Back to Home */
    .back-lobby {
      position: absolute;
      top: 20px;
      right: 20px;
      text-decoration: none;
      font-size: 16px;
      font-weight: 600;
      color: #5E4B8B;
      background: #f5f5f5;
      padding: 5px 10px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <!-- Tombol Back to Home -->
  <a href="home.php" class="back-lobby">Home</a>

  <div class="container">
    <div class="sidebar">
      <div class="menu-container">
        <div class="menu-item active">Profil Pengguna</div>
        <div class="menu-item">Pesanan</div>
        <div class="menu-item">Pembayaran</div>
        <div class="menu-item">Daftar Keinginan</div>
        <div class="divider"></div>
        <!-- Tombol Delete Account -->
        <div class="menu-item red" onclick="openDeleteModal()">Delete Account</div>
        <div class="divider"></div>
        <a href="/apps/logout.php" class="menu-item logout">Keluar</a>
      </div>
    </div>
    
    <form id="profileForm" action="simpan-profil.php" method="POST">
      <!-- Sertakan hidden field untuk user_id -->
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_id); ?>">
      <div class="main-content">
        <div class="header">
          <h1>Profil Pengguna</h1>
          <p class="subtitle">Kelola profil Anda di sini!</p>
        </div>

        <div class="content-row">
          <div class="profile-card">
            <div class="avatar"></div>
            <div class="profile-name"><?php echo htmlspecialchars($user['full_name']); ?></div>
          </div>
          <div class="info-card">
            <h2>Informasi Umum</h2>
            <div class="form-group">
              <input
                type="text"
                name="full_name"
                placeholder="Nama Lengkap"
                class="form-input"
                value="<?php echo htmlspecialchars($user['full_name']); ?>"
              />
            </div>
            <div class="form-group">
              <input
                type="email"
                name="email"
                placeholder="Email"
                class="form-input"
                value="<?php echo htmlspecialchars($user['email']); ?>"
              />
            </div>
          </div>
        </div>

        <div class="button-container">
          <button type="submit" class="save-button">Simpan Perubahan</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Modal untuk Delete Account -->
  <div id="deleteModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeDeleteModal()">&times;</span>
      <div class="modal-header">Delete Account</div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan.
      </div>
      <div class="modal-footer">
        <button class="btn btn-cancel" onclick="closeDeleteModal()">Cancel</button>
        <button class="btn btn-continue" onclick="deleteAccount()">Continue</button>
      </div>
    </div>
  </div>

  <script src="/assets/js/scripts-profil.js"></script>
</body>
</html>
