<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

$user_id   = $_SESSION['user_id'];
$kos_id    = intval($_POST['kos_id']);
$nama_kos  = trim($_POST['nama_kos'] ?? '');
$kategori  = $_POST['kategori'] ?? '';
$alamat    = trim($_POST['alamat'] ?? '');
$harga     = intval($_POST['harga'] ?? 0);
$rawPhone  = trim($_POST['telepon'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');
$fasilitas = $_POST['fasilitas'] ?? [];
$delImgs   = $_POST['delete_images'] ?? [];

// 1. Cek Kepemilikan
$chk = $conn->prepare("SELECT user_id FROM data_kos WHERE id = ?");
$chk->bind_param("i", $kos_id);
$chk->execute();
$chk->bind_result($owner_id);
if (!$chk->fetch() || $owner_id !== $user_id) {
    die("Akses ditolak.");
}
$chk->close();

// 2. Validasi & Format Telepon
if (!preg_match('/^08(\d+)$/', $rawPhone, $m)) {
    die("Format telepon salah.");
}
// Ubah "08xxx" → "+628xxx"
$telepon = '+62' . $m[1];

// Direktori upload
$uploadDir = __DIR__ . "/uploads/gambar_kos/{$kos_id}/";

// 3. Hapus Gambar Lama (jika dicentang)
if (!empty($delImgs)) {
    // Siapkan dua statement: satu untuk ambil nama_file, satu untuk delete row
    $st1 = $conn->prepare("SELECT nama_file FROM gambar_kos WHERE id = ?");
    $st2 = $conn->prepare("DELETE FROM gambar_kos WHERE id = ?");
    foreach ($delImgs as $imgId) {
        $imgId = intval($imgId);

        // Ambil nama file
        $st1->bind_param("i", $imgId);
        $st1->execute();
        $st1->bind_result($fname);
        $st1->fetch();
        $st1->close();

        // Jika file fisik ada, hapus
        if ($fname && file_exists($uploadDir . $fname)) {
            unlink($uploadDir . $fname);
        }

        // Hapus record di database
        $st2->bind_param("i", $imgId);
        $st2->execute();
    }
    $st2->close();
}

// 4. Upload Gambar Baru (jika ada)
if (!empty($_FILES['new_gambar']['tmp_name'])) {
    // Buat direktori jika belum ada
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $inst = $conn->prepare("
      INSERT INTO gambar_kos (id_gambar_kos, nama_file)
      VALUES (?, ?)
    ");
    foreach ($_FILES['new_gambar']['tmp_name'] as $i => $tmp) {
        if ($tmp && $_FILES['new_gambar']['error'][$i] === UPLOAD_ERR_OK) {
            $ext  = pathinfo($_FILES['new_gambar']['name'][$i], PATHINFO_EXTENSION);
            $file = "edit_{$i}_" . time() . ".$ext";
            move_uploaded_file($tmp, $uploadDir . $file);

            $inst->bind_param("is", $kos_id, $file);
            $inst->execute();
        }
    }
    $inst->close();
}

// 5. Update Tabel data_kos
$up = $conn->prepare("
  UPDATE data_kos
    SET nama_kos   = ?,
        kategori   = ?,
        alamat     = ?,
        harga      = ?,
        telepon    = ?,
        deskripsi  = ?,
        updated_at = NOW()
  WHERE id = ?
");
$up->bind_param(
  "sssissi",
  $nama_kos,
  $kategori,
  $alamat,
  $harga,
  $telepon,
  $deskripsi,
  $kos_id
);
$up->execute();
$up->close();

// 6. Update daftar_fasilitas: hapus & insert ulang
$conn->query("DELETE FROM daftar_fasilitas WHERE id_daftar_fasilitas = {$kos_id}");
if (!empty($fasilitas)) {
    $insF = $conn->prepare("
      INSERT INTO daftar_fasilitas (id_daftar_fasilitas, id_fasilitas)
      VALUES (?, ?)
    ");
    foreach ($fasilitas as $fid) {
        $fid = intval($fid);
        $insF->bind_param("ii", $kos_id, $fid);
        $insF->execute();
    }
    $insF->close();
}

$conn->close();

// Redirect kembali ke halaman detail
header("Location: lihat-kos.php?id={$kos_id}");
exit();
