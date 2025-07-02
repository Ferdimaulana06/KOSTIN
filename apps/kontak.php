<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kontak Kami - KOSTIN</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="/assets/img/home/kostin.svg" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style-kontak.css" />
</head>

<body class="font-poppins bg-white text-gray-800">
  <!-- Navigation -->
  <?php include '../apps/include/navbar.php'; ?>

  <!-- Konten Utama -->
  <main class="container mx-auto px-4 py-8 flex flex-col lg:flex-row items-start">
    <!-- Gambar (disembunyikan di mobile) -->
    <div class="hidden md:flex lg:w-1/2 items-stretch">
      <img src="/assets/img/kontak/pic.png" alt="Team Discussion"
      class="w-full h-auto max-h-full object-cover rounded-lg shadow-md self-stretch" style="max-height: 100%;">
    </div>

    <!-- Form Kontak -->
    <div class="w-full lg:w-1/2 mt-6 lg:mt-0 lg:ml-8">
      <h1 class="text-3xl font-semibold text-center lg:text-left mb-2">Kontak Kami</h1>
      <p class="text-center lg:text-left text-gray-600 mb-6">
        Jika Anda memiliki pertanyaan, komentar, atau keluhan, silakan hubungi kami melalui formulir di bawah ini.
      </p>
      <form action="kirim-kontak.php" method="POST" class="space-y-4">
        <!-- Nama Depan & Belakang -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="flex items-center border border-gray-300 rounded-lg px-3">
        <img src="/assets/img/kontak/people.png" alt="People Icon" class="w-5 h-5 mr-2">
        <input type="text" name="first_name" placeholder="First Name" required
           class="w-full py-2 focus:outline-none">
          </div>
          <div class="flex items-center border border-gray-300 rounded-lg px-3">
        <img src="/assets/img/kontak/people.png" alt="People Icon" class="w-5 h-5 mr-2">
        <input type="text" name="last_name" placeholder="Last Name" required
           class="w-full py-2 focus:outline-none">
          </div>
        </div>

        <!-- Email -->
        <div class="flex items-center border border-gray-300 rounded-lg px-3">
          <img src="/assets/img/kontak/email.png" alt="Email Icon" class="w-5 h-5 mr-2">
          <input type="email" name="email" placeholder="Email" required
             class="w-full py-2 focus:outline-none">
        </div>

        <!-- Telepon -->
        <div class="flex items-center border border-gray-300 rounded-lg px-3">
          <img src="/assets/img/kontak/phone.png" alt="Phone Icon" class="w-5 h-5 mr-2">
          <input type="tel" name="telepon" placeholder="Telepon" required
             class="w-full py-2 focus:outline-none">
        </div>

        <!-- Pesan -->
        <textarea name="pesan" placeholder="Pesan" required
          class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none min-h-[120px]"></textarea>

        <!-- Tombol Submit -->
        <div class="flex justify-center">
          <button type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-full transition">
        Submit
          </button>
        </div>
      </form>

      <!-- Social Media -->
      <div class="mt-8 flex flex-col items-center">
        <p class="text-gray-600 text-center">Ikuti Kami di:</p>
        <div class="flex justify-center space-x-4 mt-2">
          <a href="#" class="p-2 bg-gray-200 rounded-full hover:bg-gray-300 transition">
        <img src="/assets/img/kontak/x.png" alt="X Logo" class="w-4 h-4">
          </a>
          <a href="#" class="p-2 bg-gray-200 rounded-full hover:bg-gray-300 transition">
        <img src="/assets/img/kontak/wa.png" alt="WhatsApp Logo" class="w-4 h-4">
          </a>
          <a href="#" class="p-2 bg-gray-200 rounded-full hover:bg-gray-300 transition">
        <img src="/assets/img/kontak/ig.png" alt="Instagram Logo" class="w-4 h-4">
          </a>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include '../apps/include/footer.php'; ?>
</body>
</html>
