document.addEventListener('DOMContentLoaded', function () {
    const burger = document.getElementById('burger');
    burger.addEventListener('click', (e) => {
        const nav = document.querySelector('nav.site-nav');
        nav.classList.toggle('show');
    })
});