document.addEventListener("DOMContentLoaded", function() {
    var botonCargar = document.getElementById("CargarBoton");
    var comentariosContainer = document.getElementById("comentarios-container");

    if (!botonCargar || !comentariosContainer) {
        console.error("El botón o el contenedor de comentarios no se encontraron.");
        return;
    }
    comentariosContainer.style.display = "none";

    botonCargar.addEventListener("click", function() {
        if (comentariosContainer.style.display === "none") {
            comentariosContainer.style.display = "block";
            botonCargar.textContent = "Cerrar comentarios";
        } else {
            comentariosContainer.style.display = "none";
            botonCargar.textContent = "Ver comentarios";
        }
    });
});


