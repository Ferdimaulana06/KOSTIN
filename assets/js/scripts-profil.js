document.addEventListener("DOMContentLoaded", function () {
    const successModal = document.getElementById("popupModal");
    const modalMessage = document.getElementById("modalMessage");
    const closeModalSuccess = document.getElementById("closeModalSuccess");
    const form = document.getElementById("profileForm");

    if (!successModal || !modalMessage || !closeModalSuccess || !form) {
        console.error("Elemen modal atau form tidak ditemukan di halaman!");
        return;
    }

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch("/apps/simpan-profil.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log("Response dari server:", data);
            if (data.success) {
                modalMessage.textContent = data.message || "Perubahan berhasil disimpan!";
                successModal.style.display = "flex"; // Tampilkan modal sukses
            } else {
                alert("Gagal menyimpan data: " + data.message);
            }
        })
        .catch(error => {
            console.error("Terjadi kesalahan:", error);
            alert("Terjadi kesalahan: " + error);
        });
    });

    closeModalSuccess.addEventListener("click", function () {
        successModal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === successModal) {
            successModal.style.display = "none";
        }
    });
});

// Fungsi untuk modal delete account
function openDeleteModal() {
    document.getElementById("deleteModal").style.display = "flex";
}

function closeDeleteModal() {
    document.getElementById("deleteModal").style.display = "none";
}

function deleteAccount() {
    // Redirect ke file delete_account.php untuk menghapus akun
    window.location.href = "hapus-akun.php";
}
