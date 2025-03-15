// script index

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("forgotPasswordForm");
    const emailInput = document.getElementById("emailInput");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah reload halaman

        const emailValue = emailInput.value.trim();

        if (!emailValue) {
            showModal("Silakan masukkan email Anda."); // Ganti alert dengan modal pop-up
            return;
        }

        console.log("Email yang dimasukkan:", emailValue);

        // redirect ke halaman verifikasi
        setTimeout(() => {
            window.location.href = "verifikasi.html";
        }, 1000);
    });
});

// Fungsi untuk menampilkan modal pop-up
function showModal(message, redirectUrl = null) {
    document.getElementById("modalMessage").innerText = message;
    document.getElementById("popupModal").style.display = "flex";

    const closeButton = document.querySelector(".close-btn");
    closeButton.onclick = function () {
        document.getElementById("popupModal").style.display = "none";
        if (redirectUrl) {
            window.location.href = redirectUrl;
        }
    };
}

// script halaman verifikasi

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const kodeVerifikasi = document.getElementById("kodeVerifikasi");

    // Mencegah input selain angka
    kodeVerifikasi.addEventListener("input", function (event) {
        this.value = this.value.replace(/\D/g, ''); // Hanya angka
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah reload halaman

        const kodeValue = kodeVerifikasi.value.trim();

        if (!kodeValue) {
            showModal("Silakan masukkan kode verifikasi.");
            return;
        }

        console.log("Kode verifikasi yang dimasukkan:", kodeValue);
        showModal("Kode berhasil dikirim! Silakan lanjut.", "password-baru.html");
    });
});

// script password baru

document.addEventListener("DOMContentLoaded", function () {
    const newPasswordForm = document.getElementById("newPasswordForm");
    const newPassword = document.getElementById("newPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    newPasswordForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah reload halaman

        const passwordValue = newPassword.value.trim();
        const confirmPasswordValue = confirmPassword.value.trim();

        // Validasi panjang password
        if (passwordValue.length < 8) {
            showModal("Password harus memiliki minimal 8 karakter.");
            return;
        }

        // Validasi konfirmasi password
        if (passwordValue !== confirmPasswordValue) {
            showModal("Konfirmasi password tidak cocok.");
            return;
        }

        // Jika semua validasi lolos, arahkan ke halaman berhasil
        showModal("Password berhasil diganti!", "berhasil-ganti-password.html");
    });
});
