$(document).ready(function () {
    console.log("Página completamente cargada");
    const preloader = $(".centrado");

    // Ocultar el preloader una vez que todos los recursos hayan terminado de cargar
    $(window).on("load", function () {
        preloader.hide();
    });

    var isOnline = window.navigator.onLine;

    if (!isOnline) {
        console.log("No hay conexión a Internet");
        Swal.fire(
            "Error de conexion a internet",
            "Revisa tu conexion a internet.",
        );
    }
});
