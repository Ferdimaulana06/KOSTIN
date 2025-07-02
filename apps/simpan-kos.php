<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

$user_id   = $_SESSION['user_id'];
$nama_kos  = trim($_POST['nama_kos'] ?? '');
$kategori  = $_POST['kategori'] ?? '';
$alamat    = trim($_POST['alamat'] ?? '');
$harga     = intval($_POST['harga'] ?? 0);
$rawPhone  = trim($_POST['telepon'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');
$fasilitas = $_POST['fasilitas'] ?? [];

// Validasi sederhana
$errors = [];
if ($nama_kos === '')   $errors[] = "Nama kos wajib diisi.";
if ($alamat === '')     $errors[] = "Alamat wajib diisi.";
if ($harga <= 0)        $errors[] = "Harga harus lebih besar dari 0.";
if (!preg_match('/^08\d{8,}$/', $rawPhone)) {
    $errors[] = "Format telepon salah.";
}
if (!in_array($kategori, ['cowok','cewek','campur'])) {
    $errors[] = "Kategori tidak valid.";
}
if ($errors) {
    foreach ($errors as $e) {
        echo "<p style='color:red;'>$e</p>";
    }
    echo "<p><a href='sewakan-kos.php'>Kembali</a></p>";
    exit();
}

// Format telepon: 08xxxx → +628xxxx
preg_match('/^08(\d+)$/', $rawPhone, $m);
$telepon = '+62' . $m[1];

// 1. Insert ke data_kos
$stmt = $conn->prepare("
  INSERT INTO data_kos
    (user_id,nama_kos,kategori,alamat,harga,telepon,deskripsi)
  VALUES (?,?,?,?,?,?,?)
");
$stmt->bind_param(
  "isssiss",
  $user_id,
  $nama_kos,
  $kategori,
  $alamat,
  $harga,
  $telepon,
  $deskripsi
);
$stmt->execute();
$kos_id = $stmt->insert_id;
$stmt->close();

// 2. Upload gambar
$uploadDir = __DIR__ . "/uploads/gambar_kos/{$kos_id}/";
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

if (!empty($_FILES['gambar'])) {
    foreach ($_FILES['gambar']['tmp_name'] as $i => $tmp) {
        if ($tmp && $_FILES['gambar']['error'][$i] === UPLOAD_ERR_OK) {
            $ext  = pathinfo($_FILES['gambar']['name'][$i], PATHINFO_EXTENSION);
            $file = "img_{$i}_" . time() . ".$ext";
            move_uploaded_file($tmp, $uploadDir . $file);

            $st = $conn->prepare("
              INSERT INTO gambar_kos (id_gambar_kos, nama_file)
              VALUES (?, ?)
            ");
            $st->bind_param("is", $kos_id, $file);
            $st->execute();
            $st->close();
        }
    }
}

// 3. Simpan fasilitas di daftar_fasilitas
if ($fasilitas) {
    $stf = $conn->prepare("
      INSERT INTO daftar_fasilitas (id_daftar_fasilitas, id_fasilitas)
      VALUES (?, ?)
    ");
    foreach ($fasilitas as $fid) {
        $fid = intval($fid);
        $stf->bind_param("ii", $kos_id, $fid);
        $stf->execute();
    }
    $stf->close();
}

$conn->close();

// Redirect ke halaman detail atau home
header("Location: home.php");
exit();
