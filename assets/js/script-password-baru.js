const eyeOpen   = '/assets/img/register/eye-open.png';
const eyeClosed = '/assets/img/register/eye-closed.png';

function setupToggle(fieldId, iconId) {
    const field = document.getElementById(fieldId);
    const icon  = document.getElementById(iconId);
    if (!field || !icon) return;

    icon.addEventListener('click', () => {
    const hidden = field.type === 'password';
    field.type  = hidden ? 'text' : 'password';
    icon.src    = hidden ? eyeOpen : eyeClosed;
    });
}

document.addEventListener('DOMContentLoaded', () => {
    setupToggle('newpass', 'toggle-newpass');
    setupToggle('confirmpass', 'toggle-confirmpass');
});