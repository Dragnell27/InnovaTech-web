// Obtén una referencia al botón y al elemento de la vista cargada
const BotonCargar = document.getElementById("CargarBoton");
const vistaCargada = document.getElementById("VistaCargada");

// Agrega un oyente de eventos al botón
BotonCargar.addEventListener("click", function() {
    // Cambia el estilo para mostrar la vista cargada y ocultar el botón
    vistaCargada.style.display = "block";
    BotonCargar.style.display = "none";
});
