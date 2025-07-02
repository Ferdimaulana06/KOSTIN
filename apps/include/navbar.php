<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include_once 'config.php'; // Ganti path jika file koneksi ada di lokasi berbeda

// Ambil foto user
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT foto FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($foto);
$stmt->fetch();
$stmt->close();
$conn->close();

// Siapkan path
$defaultFoto = '/assets/img/home/account_profile_user.png';
$navFotoSrc  = !empty($foto)
    ? "uploads/foto/" . htmlspecialchars($foto)
    : $defaultFoto;
?>

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
            <img src="<?= $navFotoSrc ?>" alt="User Icon" class="user-icon-image h-[36px] md:h-[42px]">
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