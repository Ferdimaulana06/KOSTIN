// assets/js/toggle-password.js

document.addEventListener('DOMContentLoaded', function() {
  const pwdField = document.getElementById('password-field');
  const toggleIcon = document.getElementById('toggle-password');

  // paths ke gambar
  const eyeOpen = '/assets/img/login/eye-open.png';
  const eyeClosed = '/assets/img/login/eye-closed.png';

  toggleIcon.addEventListener('click', function() {
    const isHidden = pwdField.type === 'password';
    pwdField.type = isHidden ? 'text' : 'password';
    toggleIcon.src = isHidden ? eyeOpen : eyeClosed;
  });
});
