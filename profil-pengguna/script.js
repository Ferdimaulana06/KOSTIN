document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("popupModal");
    const modalMessage = document.getElementById("modalMessage"); 
    const closeModal = document.getElementById("closeModal");
    const form = document.querySelector("form");

    if (!modal || !modalMessage || !closeModal || !form) {
        console.error("Elemen modal atau form tidak ditemukan di halaman!");
        return;
    }

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch("simpan_profil.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json()) // Ubah ke JSON
        .then(data => {
            console.log("Response dari server:", data);

            if (data.success) {
                modalMessage.textContent = data.message || "Perubahan berhasil disimpan!";
                modal.style.display = "flex"; // Tampilkan modal
            } else {
                alert("Gagal menyimpan data: " + data.message);
            }
        })
        .catch(error => {
            console.error("Terjadi kesalahan:", error);
            alert("Terjadi kesalahan: " + error);
        });
    });

    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
