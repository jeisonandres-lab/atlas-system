document.addEventListener('DOMContentLoaded', function () {
    // Submenu Toggle
    const menuItems = document.querySelectorAll('.menu-item.has-submenu');

    menuItems.forEach(item => {
        const link = item.querySelector('.menu-link');
        const submenu = item.querySelector('.submenu');

        link.addEventListener('click', function (e) {
            e.preventDefault();

            // Toggle current
            item.classList.toggle('active');

            if (item.classList.contains('active')) {
                submenu.classList.add('open');
            } else {
                submenu.classList.remove('open');
            }
        });
    });

    // Mobile Menu Toggle
    const mobileToggle = document.getElementById('mobileMenuToggle');
    const navbarToggle = document.getElementById('navbarMenuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('menuOverlay');

    function toggleMenu() {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', toggleMenu);
    }

    if (navbarToggle) {
        navbarToggle.addEventListener('click', function (e) {
            e.preventDefault();
            toggleMenu();
        });
    }

    if (overlay) {
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    }
});
