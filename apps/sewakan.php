<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/sewakan.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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
        <div class="right-nav-items">
            <a href="#" class="sewakan-button">Sewakan Rumah Anda</a>
            <button class="user-icon" onclick="window.location.href='profil.php';">
                <img src="../assets/img/index/account_profile_user.png" alt="User Icon">
            </button>
        </div>
    </nav>
    <div class="container">
        <h2>Sewakan Rumah Anda</h2>
        <form>
            <label class="upload-area" id="uploadLabel">
                <input type="file" id="imageInput" accept="image/*">
                <div class="upload-icon" id="icon">+</div>
                <img id="preview" class="preview-img" style="display:none;" />
            </label>
        </form>
        <div class="input-group">
            <div class="input-group-kiri">
                <div class="nama-kos">
                    <label for="namakos">Nama Kos</label>
                    <div>:</div>
                    <input type="text" id="namakos" placeholder="Masukkan Judul">
                </div>
                <div class="kategori-kos">
                    <label for="kategori">Kategori</label>
                    <div>:</div>
                    <div class="kategori-options">
                        <label>
                            <input type="radio" name="kategori" value="putra">
                            <span>Kos Putra</span>
                        </label>
                        <label>
                            <input type="radio" name="kategori" value="putri">
                            <span>Kos Putri</span>
                        </label>
                        <label>
                            <input type="radio" name="kategori" value="campur">
                            <span>Kos Campur</span>
                        </label>
                    </div>

                </div>
                <div class="alamat-kos">
                    <label for="alamatkos">Alamat</label>
                    <div>:</div>
                    <textarea id="alamatkos" name="alamat" rows="2" placeholder="Masukkan Alamat Anda"></textarea>
                </div>
                <div class="harga-kos">
                    <label for="hargakos">Harga</label>
                    <div>:</div>
                    <input id="hargakos" name="alamat" rows="2" placeholder="Masukkan Harga Kos Anda per Bulan"></input>
                </div>
            </div>
            <div class="input-group-kanan">
                <div class="fasilitas-container">
                    <label class="label-fasilitas-item" for="fasilitasitem">Fasilitas</label>
                    <div>:</div>
                    <div class="fasilitas-item-container">
                        <label class="fasilitas-item" id="fasilitasitem">
                            <input type="checkbox" name="fasilitas" value="meja">
                            <span>Meja</span>
                        </label>
                        <label class="fasilitas-item" id="fasilitasitem"><input type="checkbox" name="fasilitas"
                                value="kursi"> <span>Meja</span></label>
                        <label class="fasilitas-item" id="fasilitasitem"><input type="checkbox" name="fasilitas"
                                value="lemari"><span>Lemari</span></label>
                        <label class="fasilitas-item" id="fasilitasitem"><input type="checkbox" name="fasilitas"
                                value="wifi"> <span>Wifi</span></label>
                        <label class="fasilitas-item" id="fasilitasitem"><input type="checkbox" name="fasilitas"
                                value="kasur"> <span>Kasur</span></label>
                        <label class="fasilitas-item" id="fasilitasitem"><input type="checkbox" name="fasilitas"
                                value="ac"> <span>AC</span></label>
                        <label class="fasilitas-item" id="fasilitasitem"><input type="checkbox" name="fasilitas"
                                value="listrik">
                            <span>Listrik</span></label>
                        <label class="fasilitas-item"><input type="checkbox" name="fasilitas"
                                value="air"><span>Air</span></label>
                    </div>
                </div>
                <div class="peraturan-kos">
                    <label for="peraturankos">Peraturan</label>
                    <div>:</div>
                    <textarea id="peraturankos" name="alamat" rows="2" placeholder="Aturan Kos Anda"></textarea>

                </div>
            </div>
        </div>
        <hr class="divider">
        <div class="button-container">
            <button type="submit" class="submit-button">Simpan</button>
            <button type="reset" class="reset-button">Reset</button>
        </div>
    </div>
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
    <script src="../assets/js/sewakan.js"></script>
</body>

</html>