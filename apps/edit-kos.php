<?php
session_start();
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

$kos_id = intval($_GET['id'] ?? 0);
$user_id = $_SESSION['user_id'];

// Ambil data kos (cek kepemilikan sekaligus)
$stmt = $conn->prepare("
  SELECT nama_kos, kategori, alamat, harga, telepon, deskripsi, user_id
  FROM data_kos
  WHERE id = ?
");
$stmt->bind_param("i", $kos_id);
$stmt->execute();
$stmt->bind_result($nama_kos, $kategori, $alamat, $harga, $telepon, $deskripsi, $owner_id);
if (!$stmt->fetch() || $owner_id !== $user_id) {
    die("Akses ditolak atau Kos tidak ditemukan.");
}
$stmt->close();

// Ubah format telepon “+62xxx” → “0xxx” untuk ditampilkan di form
$rawPhone = preg_replace('/^\+62/', '0', $telepon);

// Ambil semua fasilitas (checkbox master)
$allFasilitas = $conn
    ->query("SELECT id, nama FROM fasilitas ORDER BY nama")
    ->fetch_all(MYSQLI_ASSOC);

// Ambil fasilitas yang sudah dipilih untuk kos ini
$rs = $conn->prepare("
  SELECT id_fasilitas
  FROM daftar_fasilitas
  WHERE id_daftar_fasilitas = ?
");
$rs->bind_param("i", $kos_id);
$rs->execute();
$selFasilitas = array_column(
    $rs->get_result()->fetch_all(MYSQLI_ASSOC),
    'id_fasilitas'
);
$rs->close();

// Ambil data gambar lama (jika ada)
$imgs = [];
$gst = $conn->prepare("
  SELECT id, nama_file
  FROM gambar_kos
  WHERE id_gambar_kos = ?
");
$gst->bind_param("i", $kos_id);
$gst->execute();
$gst->bind_result($img_id, $img_file);
while ($gst->fetch()) {
    $imgs[] = ['id' => $img_id, 'file' => $img_file];
}
$gst->close();

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Kos #<?= $kos_id ?></title>
  <link rel="icon" href="/assets/img/home/kostin.svg" type="image/x-icon" />
  <link rel="stylesheet" href="/assets/css/style-sewakan.css" />
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

<section class="w-full container mx-auto px-6 md:px-[100px] py-[40px]">
  <h2 class="text-2xl font-semibold mb-8">Edit Kos #<?= $kos_id ?></h2>

  <form action="update-kos.php" method="POST" enctype="multipart/form-data" class="space-y-10">
    <input type="hidden" name="kos_id" value="<?= $kos_id ?>">

    <!-- Upload Gambar Baru -->
    <label for="imageInput" id="uploadLabel"
           class="relative block w-full h-48 border-2 border-dashed border-gray-300 rounded-md cursor-pointer overflow-hidden">
      <input type="file" id="imageInput" name="new_gambar[]" accept="image/*" multiple
             class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
      <div id="icon" class="absolute inset-0 flex flex-col items-center justify-center text-gray-400">
        <span class="text-5xl">+</span>
        <span class="mt-2">Klik atau seret foto ke sini</span>
      </div>
      <img id="preview" class="preview-img absolute inset-0 object-cover w-full h-full hidden" />
    </label>

    <div class="flex flex-col lg:flex-row gap-10">
      <!-- Kolom Kiri -->
      <div class="flex-1 space-y-6">
        <!-- Nama Kos -->
        <div class="flex items-center">
          <label for="namakos" class="w-32 font-medium">Nama Kos</label>
          <div class="mx-2">:</div>
          <input type="text" id="namakos" name="nama_kos" required
                 value="<?= htmlspecialchars($nama_kos) ?>"
                 class="flex-1 p-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#2966CB]" />
        </div>

        <!-- Kategori -->
        <div class="flex items-start">
          <label class="w-32 font-medium pt-1">Kategori</label>
          <div class="mx-2 pt-1">:</div>
          <div class="flex-1 flex gap-4">
            <?php foreach (['cowok','cewek','campur'] as $cat): ?>
              <label class="flex-1">
                <input type="radio" name="kategori" value="<?= $cat ?>" required
                       class="sr-only peer" <?= $cat === $kategori ? 'checked' : '' ?>/>
                <div class="py-2 text-center border border-gray-300 rounded cursor-pointer
                            peer-checked:bg-[#2966CB] peer-checked:text-white
                            hover:bg-gray-100">
                  <?= ucfirst($cat) ?>
                </div>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Alamat -->
        <div class="flex items-start">
          <label for="alamatkos" class="w-32 font-medium pt-1">Alamat</label>
          <div class="mx-2 pt-1">:</div>
          <textarea id="alamatkos" name="alamat" rows="2" required
                    class="flex-1 p-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#2966CB]"><?= htmlspecialchars($alamat) ?></textarea>
        </div>

        <!-- Harga -->
        <div class="flex items-center">
          <label for="hargakos" class="w-32 font-medium">Harga</label>
          <div class="mx-2">:</div>
          <input type="number" id="hargakos" name="harga" min="0" required
                 value="<?= $harga ?>"
                 class="flex-1 p-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#2966CB]" />
        </div>

        <!-- Telepon Pemilik -->
        <div class="flex items-center">
          <label for="teleponkos" class="w-32 font-medium">Telepon Pemilik</label>
          <div class="mx-2">:</div>
          <input type="text" id="teleponkos" name="telepon" pattern="08[0-9]{8,}"
                 required value="<?= htmlspecialchars($rawPhone) ?>"
                 class="flex-1 p-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#2966CB]" />
        </div>
      </div>

      <!-- Kolom Kanan -->
      <div class="flex-1 space-y-6">
        <!-- Fasilitas -->
        <div class="flex items-start">
          <label class="w-32 font-medium pt-1">Fasilitas</label>
          <div class="mx-2 pt-1">:</div>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4 flex-1">
            <?php foreach ($allFasilitas as $f): ?>
              <label>
                <input type="checkbox" name="fasilitas[]" value="<?= $f['id'] ?>"
                       class="sr-only peer" <?= in_array($f['id'],$selFasilitas)?'checked':'' ?>/>
                <div class="py-2 text-center border border-gray-300 rounded cursor-pointer
                            peer-checked:bg-[#2966CB] peer-checked:text-white
                            hover:bg-gray-100">
                  <?= htmlspecialchars($f['nama']) ?>
                </div>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Deskripsi & Peraturan -->
        <div class="flex items-start">
          <label for="peraturankos" class="w-32 font-medium pt-1">Deskripsi & Peraturan</label>
          <div class="mx-2 pt-1">:</div>
          <textarea id="peraturankos" name="deskripsi" rows="4"
                    class="flex-1 p-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#2966CB]"><?= htmlspecialchars($deskripsi) ?></textarea>
        </div>
      </div>
    </div>

    <!-- Gambar Lama dengan Opsi Hapus -->
    <div class="space-y-4">
      <h3 class="font-medium">Gambar Lama:</h3>
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php if (count($imgs) > 0): ?>
          <?php foreach ($imgs as $im): ?>
            <div class="relative border rounded overflow-hidden">
              <img src="/apps/uploads/gambar_kos/<?= $kos_id ?>/<?= htmlspecialchars($im['file']) ?>"
                   alt="Gambar Kos" class="w-full h-32 object-cover"/>
              <label class="absolute top-2 right-2 bg-white bg-opacity-75 p-1 rounded">
                <input type="checkbox" name="delete_images[]" value="<?= $im['id'] ?>" class="mr-1"/>
                Hapus
              </label>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p><em>Tidak ada gambar.</em></p>
        <?php endif; ?>
      </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex flex-col sm:flex-row gap-4">
      <button type="submit"
              class="flex-1 bg-[#2966CB] hover:bg-[#153366] text-white font-medium py-3 rounded">
        Update Kos
      </button>
      <button type="reset"
              class="flex-1 border border-gray-300 text-gray-700 font-medium py-3 rounded hover:bg-gray-100">
        Reset
      </button>
    </div>
  </form>
</section>

<script>
  const input = document.getElementById('imageInput'),
        preview = document.getElementById('preview'),
        icon    = document.getElementById('icon');

  input.addEventListener('change', () => {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        icon.parentElement.querySelector('#icon').classList.add('hidden');
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
</script>

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

  <script>
    // Preview gambar baru yang dipilih
    document.getElementById('imageInput').addEventListener('change', function (event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const preview = document.getElementById('preview');
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
        // Hilangkan ikon plus ketika file dipilih
        document.getElementById('icon').textContent = '';
      }
    });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
