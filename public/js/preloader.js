document.addEventListener("DOMContentLoaded", function () {
    const preloader = document.querySelector(".centrado");

    window.onload = function () {
        $(document).ready(function() {
            $(".centrado").css("display", "none");
        });
    };

    var isOnline = navigator.onLine;

    if (!isOnline) {
        Swal.fire(
            "Error de conexion a internet",
            "Revisa tu conexion a internet."
        );
    }
});
