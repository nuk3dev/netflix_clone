
const menuButton = document.querySelector('[aria-controls="mobile-menu"]');
const mobileMenu = document.getElementById('mobile-menu');


menuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    const expanded = mobileMenu.classList.contains('hidden') ? 'false' : 'true';
    menuButton.setAttribute('aria-expanded', expanded);
});
