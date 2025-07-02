# KOSTIN

Website pencari kos yang memudahkan pengguna dalam mencari dan memesan tempat tinggal sesuai kebutuhan. Proyek ini dikembangkan secara kolaboratif oleh tim.

## Daftar Isi
1. [Tentang Proyek](#tentang-proyek)
2. [Prasyarat](#prasyarat)
3. [Cara Memulai](#cara-memulai)
4. [Aturan Kolaborasi](#aturan-kolaborasi)

---

## Tentang Proyek
**KOSTIN** adalah website yang bertujuan untuk:
- Menyediakan platform bagi pemilik kos untuk memasarkan kamar kos mereka.
- Mempermudah pencari kos menemukan kos sesuai kriteria (lokasi, harga, fasilitas, dll).

---

## Prasyarat
- [Git](https://git-scm.com/) untuk clone dan version control.
- Web Browser (Chrome, Firefox, dsb.) untuk mengakses halaman web.
- (Opsional) [VSCode](https://code.visualstudio.com/) atau editor lain untuk mengedit kode.

---

## Cara Memulai

### 1. Clone Repositori
Untuk mulai menggunakan repositori ini, ikuti langkah-langkah berikut:

1. Buka **File Explorer** di lokasi tempat Anda ingin menyimpan repositori.
2. **Shift + Klik Kanan** pada area kosong di dalam folder tersebut.
3. Pilih **"Open Git Bash here"** (atau "Git Bash di sini").
4. Jalankan perintah berikut untuk meng-clone repositori:
   ```sh
   git clone git@github.com:FerdiMaulana06/KOSTIN.git
   ```
5. Setelah proses clone selesai, masuk ke folder repositori dengan:
   ```sh
   cd kostin
   ```

### 2. Membuka di Browser
- Cukup buka file `index.html` di browser, atau
- Gunakan live server (misal, VSCode extension "Live Server").

---

## Aturan Kolaborasi

### 1. Membuat Fitur / Mengedit Kode
1. Pastikan selalu **pull** perubahan terbaru sebelum mulai mengedit:
   ```sh
   git pull origin main
   ```
2. Lakukan perubahan pada file yang diperlukan.
3. Setelah selesai, jalankan:
   ```sh
   git add .
   git commit -m "pesan perubahan"
   git push origin main
   ```

### 2. Jangan Menghapus / Memindahkan Folder
- Mohon tidak mengubah struktur folder secara drastis tanpa diskusi terlebih dahulu.
- Buat branch terpisah untuk perubahan besar, kemudian ajukan pull request agar tim bisa meninjau.

### 3. Komunikasi & Diskusi
- Gunakan [Issues](../../issues) untuk melaporkan bug atau request fitur.
- Gunakan [Pull Requests](../../pulls) untuk review kode.
- Diskusikan perubahan besar sebelum diimplementasikan agar semua tim sepakat.

---

**Selamat berkontribusi dan terima kasih!**  
Jika ada pertanyaan, jangan ragu untuk menghubungi anggota tim lain atau membuat [Issue](../../issues).
