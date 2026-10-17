import './bootstrap';

// Menu "Profil": hover dan fokus dibuka lewat CSS; klik dipakai untuk layar sentuh.
document.querySelectorAll('[data-menu]').forEach((menu) => {
    const button = menu.querySelector('[data-menu-toggle]');
    const setOpen = (open) => {
        menu.toggleAttribute('data-open', open);
        button.setAttribute('aria-expanded', String(open));
    };

    button.addEventListener('click', () => setOpen(!menu.hasAttribute('data-open')));
    document.addEventListener('click', (event) => {
        if (!menu.contains(event.target)) setOpen(false);
    });
    menu.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setOpen(false);
            button.focus();
        }
    });
});
