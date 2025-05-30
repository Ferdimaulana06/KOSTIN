<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navbar</title>
  <link rel="stylesheet" href="../assets/css/detail.css" />
  <title>KOSTIN</title>
  <link rel="icon" href="/assets/kostin.svg" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <script defer src="/js/script.js"></script>
</head>

<body>
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
  <section>
    <div class="gallery">
      <img src="../assets/img/index/gambaromah.jpg" class="main-image" alt="Main Image" />
      <div class="small-images">
        <img src="../assets/img/index/gambaromah.jpg" alt="Image 2" class="image1" />
        <img src="../assets/img/index/gambaromah.jpg" alt="Image 3" class="image2" />
        <img src="../assets/img/index/gambaromah.jpg" alt="Image 4" class="image3" />
        <img src="../assets/img/index/gambaromah.jpg" alt="Image 5" class="image4" />
      </div>
    </div>
    <div class="kos-container">
      <div class="kos-info">
        <h1>Kos Kicau Mania Sanden</h1>
        <div class="kos-details">
          <span class="kos-category">Kos Putra</span>
          <span class="dot">•</span>
          <span class="kos-location">📍 Sanden Magelang Utara 56511</span>
        </div>
        <div class="kos-rating">
          <span class="star">⭐</span>
          <span class="rating-value">4.8</span>
        </div>
      </div>
      <div class="kos-actions">
        <button class="share">🔗 Bagikan</button>
        <button class="save">🔖 Simpan</button>
      </div>
    </div>

    <div class="kos-container2">
      <div class="kos-left-container">
        <div class="kos-info2">
          <img class="profile-photos" src="assets\Lagooooooooooooooooon.png" />
          <div class="kos-sub1">
            <h4>Kos dikelola oleh Ferdi Maulana</h4>
            <p id="online-text">Online</p>
          </div>
        </div>

        <div class="kos-info3">
          <h3>Spesifikasi</h3>
          <div class="spesifikasi1">
            <img src="assets\lebarrumah.svg" />
            <p>3 x 4 meter</p>
          </div>
          <div class="spesifikasi2">
            <img src="../assets/img/index/bath.svg" />
            <p>kamar mandi dalam</p>
          </div>
        </div>

        <div class="kos-info4">
          <h3>Fasilitas</h3>
          <div class="fasilitas-container">
            <div class="fasilitas1">
              <div class="fas1">
                <img src="../assets/img/index/AC.svg" />
                <p>AC</p>
              </div>
              <div class="fas2">
                <img src="../assets/img/index/wifi.svg" />
                <p>Wi-Fi</p>
              </div>
              <div class="fas3">
                <img src="../assets/img/index/meja.svg" />
                <p>Meja</p>
              </div>
              <div class="fas4">
                <img src="../assets/img/index/kursi.svg" />
                <p>Kursi</p>
              </div>
            </div>

            <div class="fasilitas2">
              <div class="fas2-1">
                <img src="../assets/img/index/kasur.svg" />
                <p>Kasur</p>
              </div>
              <div class="fas2-2">
                <img src="../assets/img/index/lemari.svg" />
                <p>Lemari</p>
              </div>
              <div class="fas2-3">
                <img src="../assets/img/index/listrik.svg" />
                <p>Listrik</p>
              </div>
              <div class="fas2-4">
                <img src="../assets/img/index/air.svg" />
                <p>Air</p>
              </div>
            </div>
          </div>
        </div>

        <div class="kos-info5">
          <h3>Peraturan</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
            commodo ligula eget dolor. Aenean massa.<br />Cum sociis natoque
            penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
            sem. Nulla consequat massa quis enim.<br />Donec pede justo,
            fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
            rhoncus ut, imperdiet a, venenatis vitae, justo.
          </p>
        </div>
      </div>
      <div class="container-total-pembayaran">
        <div class="total-pembayaran">
          <div class="text-total">
            <h2>Rp. 750.000</h2>
            <p>per bulan</p>
          </div>
          <div class="container-sewa">
            <button class="tombol-tanya-pemilik">
              <img src="assets/tanya.svg" />
              <p>Tanya Pemilik</p>
            </button>
          </div>
        </div>
      </div>
  </section>
  <footer class="footer">
    <div class="footer-top">
      <div class="logo-kostin">
        <img src="../assets/img/index/kostin-white.svg" alt="KOSTIN Logo">
      </div>
      <nav class="footer-nav">
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