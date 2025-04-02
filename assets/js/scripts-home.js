document.addEventListener("DOMContentLoaded", function () {
    // Navbar Hide/Show on Scroll
    let lastScrollTop = 0;
    const navbar = document.querySelector(".navbar");
    
    window.addEventListener("scroll", function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.style.top = "-80px";
        } else {
            navbar.style.top = "0";
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });

    // FAQ Toggle
    document.querySelectorAll(".faq-question").forEach((question) => {
        question.addEventListener("click", () => {
            const faqItem = question.parentElement;
            const arrowIcon = question.querySelector(".arrow-icon");
            
            faqItem.classList.toggle("active");
            arrowIcon.style.transform = faqItem.classList.contains("active") 
                ? "rotate(180deg)"
                : "rotate(0deg)";
        });
    });

    // User Menu Dropdown
    const userMenu = document.getElementById('user-menu');
    const userDropdown = document.getElementById('user-dropdown');
    
    userMenu.addEventListener('click', (e) => {
        e.stopPropagation();
        const isVisible = userDropdown.style.display === 'block';
        userDropdown.style.display = isVisible ? 'none' : 'block';
    });

    // Tutup dropdown saat klik di luar
    document.addEventListener('click', (e) => {
        if (!userMenu.contains(e.target)) {
            userDropdown.style.display = 'none';
        }
    });

    // Tutup dropdown saat scroll
    window.addEventListener('scroll', () => {
        userDropdown.style.display = 'none';
    });
});