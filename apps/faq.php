<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FAQ - KOSTIN</title>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet"
  />

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            poppins: ["Poppins", "sans-serif"],
          },
          colors: {
            primary: "#246bfd",
          },
        },
      },
    };
  </script>

  <link rel="stylesheet" href="../assets/css/sewakan.css" />
</head>

<body class="font-poppins bg-gray-100 text-gray-800">

  <?php include '../apps/include/navbar.php'; ?>

  <!-- Hero Section -->
  <section
    class="relative h-64 bg-cover bg-center"
    style="background-image: url('../assets/img/index/image 15 faq.svg')"
  >
    <div
      class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center"
    >
      <h1 class="text-white text-3xl md:text-4xl font-semibold">
        Frequently Asked Questions
      </h1>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="max-w-3xl mx-auto px-4 md:px-0 py-12">
    <div class="space-y-4">
      <!-- FAQ Item 1 -->
      <div class="bg-white rounded-lg shadow-md">
        <button
          class="w-full flex justify-between items-center px-6 py-4 text-left font-medium faq-toggle"
        >
          <span
            >Bagaimana cara mencari kos yang sesuai dengan kebutuhan
            saya?</span
          >
          <svg
            class="w-5 h-5 transition-transform duration-300 transform"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 9l-7 7-7-7"
            ></path>
          </svg>
        </button>
        <div class="faq-content hidden px-6 pb-4 text-sm text-gray-600">
          Gunakan fitur pencarian dan filter lokasi, kategori, dan harga untuk
          menyesuaikan dengan kebutuhan Anda.
        </div>
      </div>

      <!-- FAQ Item 2 -->
      <div class="bg-white rounded-lg shadow-md">
        <button
          class="w-full flex justify-between items-center px-6 py-4 text-left font-medium faq-toggle"
        >
          <span
            >Apakah saya bisa langsung memesan kos melalui website ini?</span
          >
          <svg
            class="w-5 h-5 transition-transform duration-300 transform"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 9l-7 7-7-7"
            ></path>
          </svg>
        </button>
        <div class="faq-content hidden px-6 pb-4 text-sm text-gray-600">
          Ya, setelah login Anda dapat memesan kos langsung dari halaman
          detail kos.
        </div>
      </div>

      <!-- FAQ Item 3 -->
      <div class="bg-white rounded-lg shadow-md">
        <button
          class="w-full flex justify-between items-center px-6 py-4 text-left font-medium faq-toggle"
        >
          <span
            >Bagaimana jika saya ingin bertanya lebih lanjut kepada pemilik
            kos?</span
          >
          <svg
            class="w-5 h-5 transition-transform duration-300 transform"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 9l-7 7-7-7"
            ></path>
          </svg>
        </button>
        <div class="faq-content hidden px-6 pb-4 text-sm text-gray-600">
          Anda dapat menggunakan fitur kontak langsung atau chat dengan
          pemilik melalui profil kos yang tersedia.
        </div>
      </div>
    </div>
  </section>


  <?php include '../apps/include/footer.php'; ?>

  <!-- Accordion Script -->
  <script>
    const toggles = document.querySelectorAll(".faq-toggle");
    toggles.forEach((toggle) => {
      toggle.addEventListener("click", () => {
        const content = toggle.nextElementSibling;
        const icon = toggle.querySelector("svg");
        content.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
      });
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
