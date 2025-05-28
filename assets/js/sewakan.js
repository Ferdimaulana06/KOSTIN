document.addEventListener('input', function (e) {
  if (e.target.tagName.toLowerCase() === 'textarea') {
    e.target.style.height = 'auto';
    e.target.style.height = e.target.scrollHeight + 'px';
  }
});