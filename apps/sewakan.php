<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/sewakan.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <?php include '../apps/include/navbar.php'; ?>

    <section class="w-full container md:px-[100px] py-[40px] justify-center items-center mx-auto  px-20">
        <h2 class="">Sewakan Rumah Anda</h2>
        <form>
            <label class="upload-area" id="uploadLabel">
                <input type="file" id="imageInput" accept="image/*">
                <div class="upload-icon" id="icon">+</div>
                <img id="preview" class="preview-img" style="display:none;" />
            </label>
        </form>
        <div
            class="input-group md:flex md:justify-between md:items-start justify-start items-center lg:flex-row md:flex-col flex-col gap-10">
            <div class="input-group-kiri w-full">
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
            <div class="input-group-kanan lg:w-1/2 md:w-full w-full">
                <div class="fasilitas-container flex flex-row w-full">
                    <label class="label-fasilitas-item" for="fasilitasitem">Fasilitas</label>
                    <div>:</div>
                    <div class="ml-[24px] w-full grid md:grid-cols-4 grid-cols-2 md:gap-4 gap-2">
                        <label class="fasilitas-item" id="fasilitasitem">
                            <input class="align-center bg-blue-500" type="checkbox" name="fasilitas" value="meja">
                            <span class="text-m flex items-center justify-center w-full px-2 py-2">Meja</span>
                        </label>
                        <label class="fasilitas-item" id="fasilitasitem">
                            <input class="" type="checkbox" name="fasilitas" value="kursi">
                            <span class="text-m flex items-center justify-center w-full px-2 py-2  ">Kursi</span>
                        </label>
                    </div>
                </div>
                <div class="peraturan-kos">
                    <label for="peraturankos">Peraturan</label>
                    <div>:</div>
                    <textarea id="peraturankos" name="alamat" rows="2" placeholder="Aturan Kos Anda"></textarea>

                </div>
            </div>
    </section>
    <hr class="divider max-w-[100rem] mx-auto">
    <div class="button-container md:px-[100px] px-20 max-w-[100rem] mx-auto">
        <button type="submit" class="submit-button">Simpan</button>
        <button type="reset" class="reset-button">Reset</button>
    </div>
    <?php include '../apps/include/footer.php'; ?>
    <script src="../assets/js/sewakan.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>