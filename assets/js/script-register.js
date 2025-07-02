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

// Paths ke ikon
const eyeOpen  = '/assets/img/login/eye-open.png';
const eyeClosed = '/assets/img/login/eye-closed.png';

// Fungsi toggle generic
function setupToggle(fieldId, iconId) {
  const pwdField = document.getElementById(fieldId);
  const toggle   = document.getElementById(iconId);

  if (!pwdField || !toggle) return;

  toggle.addEventListener('click', () => {
    const isHidden = pwdField.type === 'password';
    pwdField.type  = isHidden ? 'text' : 'password';
    toggle.src     = isHidden ? eyeOpen : eyeClosed;
  });
}

document.addEventListener('DOMContentLoaded', () => {
  setupToggle('password', 'toggle-password');
  setupToggle('passwordvalidasi', 'toggle-password-2');
});
