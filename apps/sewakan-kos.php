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

// Ambil daftar amenities untuk checkbox
$fasilitas = [];
$res = $conn->query("SELECT id, nama FROM fasilitas ORDER BY nama");
while ($row = $res->fetch_assoc()) {
    $fasilitas[] = $row;
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Listing Kos</title>
    <link rel="icon" href="/assets/img/home/kostin.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style-sewakan.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
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
  <h2 class="text-2xl font-semibold mb-6">Sewakan Rumah Anda</h2>

  <form action="simpan-kos.php" method="POST" enctype="multipart/form-data" class="space-y-8">
    <!-- Upload Gambar -->
    <label for="imageInput" id="uploadLabel"
           class="upload-area relative block w-full h-48 border-2 border-dashed border-gray-300 rounded-md cursor-pointer overflow-hidden">
      <input type="file" id="imageInput" name="gambar[]" accept="image/*" multiple required
             class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
      <div id="icon" class="absolute inset-0 flex flex-col items-center justify-center text-gray-400">
        <span class="text-5xl">+</span>
        <span class="mt-2">Klik atau seret foto ke sini (max 5)</span>
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
                 placeholder="Masukkan Nama Kos"
                 class="flex-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#2966CB]" />
        </div>

        <!-- Kategori -->
        <div class="flex items-start">
          <label class="w-32 font-medium pt-2">Kategori</label>
          <div class="mx-2 pt-2">:</div>
          <div class="flex-1 flex space-x-4">
            <!-- Cowok -->
            <label class="flex-1">
              <input type="radio" name="kategori" value="cowok" class="sr-only peer" required>
              <div class="py-2 text-center border border-gray-300 rounded cursor-pointer
                          peer-checked:bg-[#2966CB] peer-checked:text-white
                          hover:bg-gray-100">
                Cowok
              </div>
            </label>
            <!-- Cewek -->
            <label class="flex-1">
              <input type="radio" name="kategori" value="cewek" class="sr-only peer" required>
              <div class="py-2 text-center border border-gray-300 rounded cursor-pointer
                          peer-checked:bg-[#2966CB] peer-checked:text-white
                          hover:bg-gray-100">
                Cewek
              </div>
            </label>
            <!-- Campur -->
            <label class="flex-1">
              <input type="radio" name="kategori" value="campur" class="sr-only peer" required>
              <div class="py-2 text-center border border-gray-300 rounded cursor-pointer
                          peer-checked:bg-[#2966CB] peer-checked:text-white
                          hover:bg-gray-100">
                Campur
              </div>
            </label>
          </div>
        </div>

        <!-- Alamat -->
        <div class="flex items-start">
          <label for="alamatkos" class="w-32 font-medium">Alamat</label>
          <div class="mx-2">:</div>
          <textarea id="alamatkos" name="alamat" rows="2" required
                    placeholder="Masukkan Alamat Kos"
                    class="flex-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#2966CB]"></textarea>
        </div>

        <!-- Harga -->
        <div class="flex items-center">
          <label for="hargakos" class="w-32 font-medium">Harga (per bulan)</label>
          <div class="mx-2">:</div>
          <input type="number" id="hargakos" name="harga" min="0" required
                 placeholder="Masukkan Harga Kos"
                 class="flex-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#2966CB]" />
        </div>

        <!-- Telepon -->
        <div class="flex items-center">
          <label for="teleponkos" class="w-32 font-medium">Nomor Telepon</label>
          <div class="mx-2">:</div>
          <input type="text" id="teleponkos" name="telepon" pattern="08[0-9]{8,}" required
                 placeholder="08xxxxxxxxxx"
                 class="flex-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#2966CB]" />
        </div>
      </div>

      <!-- Kolom Kanan -->
      <div class="flex-1 space-y-6">
        <!-- Fasilitas -->
        <div class="flex items-start">
          <label class="w-32 font-medium pt-2">Fasilitas</label>
          <div class="mx-2 pt-2">:</div>
          <div class="flex-1 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php foreach ($fasilitas as $f): ?>
              <label>
                <input type="checkbox" name="fasilitas[]" value="<?= $f['id'] ?>" class="sr-only peer">
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
          <label for="peraturankos" class="w-32 font-medium">Deskripsi & Peraturan</label>
          <div class="mx-2">:</div>
          <textarea id="peraturankos" name="deskripsi" rows="4"
                    placeholder="Deskripsikan kos dan peraturannya"
                    class="flex-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#2966CB]"></textarea>
        </div>
      </div>
    </div>

    <hr class="border-gray-300" />

    <!-- Tombol Aksi -->
    <div class="flex flex-col sm:flex-row gap-4">
      <button type="submit"
              class="flex-1 bg-[#2966CB] hover:bg-[#153366] text-white font-medium py-3 rounded">
        Simpan
      </button>
      <button type="reset"
              class="flex-1 border border-gray-300 text-gray-700 font-medium py-3 rounded hover:bg-gray-100">
        Reset
      </button>
    </div>
  </form>
</section>

<script>
  // Preview preview-img jika user pilih file
  const input = document.getElementById('imageInput');
  const preview = document.getElementById('preview');
  const icon = document.getElementById('icon');

  input.addEventListener('change', () => {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        icon.classList.add('hidden');
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
        // Script untuk menampilkan preview gambar
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
            }
        });

        // Script untuk mengubah ikon upload
        document.getElementById('uploadLabel').addEventListener('click', function () {
            const icon = document.getElementById('icon');
            icon.textContent = '';
        });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>
