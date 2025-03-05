document.addEventListener("DOMContentLoaded", function () {
    // Navbar Hide/Show on Scroll
    let lastScrollTop = 0;
    const navbar = document.querySelector(".navbar");

    document.addEventListener("scroll", function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scroll down: Sembunyikan navbar
            navbar.style.top = "-100px"; // Sesuaikan dengan tinggi navbar Anda
        } else {
            // Scroll up: Tampilkan navbar
            navbar.style.top = "0";
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Reset jika scroll ke atas halaman
    });

    // Language Selector Dropdown
    const languageSelector = document.getElementById("language-selector");
    const languageDropdown = document.getElementById("language-dropdown");
    const selectedLanguage = document.getElementById("selected-language");

    languageSelector.addEventListener("click", function () {
        languageDropdown.style.display = languageDropdown.style.display === "block" ? "none" : "block";
    });

    // Pilih bahasa
    languageDropdown.querySelectorAll("li").forEach(item => {
        item.addEventListener("click", function () {
            let langCode = this.getAttribute("data-lang");
            let flagImg = this.querySelector("img").src;
            let langText = this.querySelector("span").textContent;

            // Ubah tampilan selected language
            selectedLanguage.innerHTML = `
                <img src="${flagImg}" alt="Flag" class="flag-icon">
                <span>${langCode.toUpperCase()}</span>
                <img src="/assets/bottom_arrow_icon.png" alt="Dropdown Icon" class="arrow-icon">
            `;

            // Sembunyikan dropdown
            languageDropdown.style.display = "none";
        });
    });

    // Tutup dropdown jika klik di luar
    document.addEventListener("click", function (e) {
        if (!languageSelector.contains(e.target)) {
            languageDropdown.style.display = "none";
        }
    });

    // FAQ Toggle
    document.querySelectorAll(".faq-question").forEach((question) => {
        question.addEventListener("click", () => {
            const faqItem = question.parentElement;
            faqItem.classList.toggle("active");
        });
    });

    const userMenu = document.getElementById('user-menu');
    const userDropdown = document.getElementById('user-dropdown');

    userMenu.addEventListener('click', () => {
      userDropdown.style.display = userDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Klik di luar dropdown untuk menutup
    document.addEventListener('click', (e) => {
      if (!userMenu.contains(e.target)) {
        userDropdown.style.display = 'none';
      }
    });
});