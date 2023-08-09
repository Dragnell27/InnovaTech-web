/* JavaScript Preloader Juliana */
window.addEventListener("load", function () {
    const preloader = document.querySelector('.centrado');
    if (navigator.onLine) {
        // Si hay internet se oculta
        setTimeout(function() {
            preloader.style.display = 'none';
        }, 500);
    } else {
        // Si no hay internet, mantener el preloader visible
        // El preloader seguirá mostrándose hasta que se recupere la conexión
    }
});
// conexión a internet (online/offline)
window.addEventListener('offline', function() {
    const preloader = document.querySelector('.centrado');
    preloader.style.display = 'flex';
});
window.addEventListener('online', function() {
    const preloader = document.querySelector('.centrado');
    setTimeout(function() {
        preloader.style.display = 'none';
    }, 500);
});
