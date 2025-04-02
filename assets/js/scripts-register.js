document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registerForm");
    
    form.addEventListener("submit", function (event) {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("passwordvalidasi").value;
        
        if (password !== confirmPassword) {
            alert("Password dan Ulangi Password harus sama!");
            event.preventDefault();
            return false;
        }
    });
});