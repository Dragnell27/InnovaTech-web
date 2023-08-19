document.addEventListener("DOMContentLoaded", function () {
    const preloader = document.querySelector(".centrado");

    window.onload = function () {
        preloader.style.display = "none";
    };

    var isOnline = navigator.onLine;

    if (!isOnline) {
        console.log("No hay conexión a Internet");
        Swal.fire(
            "Error de conexion a internet",
            "Revisa tu conexion a internet."
        );
    }
});
