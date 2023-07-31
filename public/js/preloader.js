/* JavaScript Preloader Juliana */
//  Esta funcion sirve para ocultar el preloader después de un pequeño retraso si hay internet
// Si no hay internet, el preloader seguirá mostrándose hasta que se recupere la conexión

window.addEventListener("load", function () {
    const preloader = document.querySelector('.centrado');

    // Verificar si hay internet (online)
    if (navigator.onLine) {
        // Si hay internet, ocultar el preloader después de 0.5 segundos (500 milisegundos)
        setTimeout(function() {
            preloader.style.display = 'none';
        }, 500);
    } else {
        // Si no hay internet, mantener el preloader visible
        // El preloader seguirá mostrándose hasta que se recupere la conexión
    }
});

// Evento para detectar cambios en la conexión a internet (online/offline)
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