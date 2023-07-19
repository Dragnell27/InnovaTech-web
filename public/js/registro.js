// script.js

// Obtener referencia al botón "Cerrar"
var closeButton = document.querySelector(".close-menu");
// Obtener referencia al menú superpuesto
var overlayMenu = document.querySelector(".overlay-menu");

// Agregar un evento de clic al botón "Cerrar"
closeButton.addEventListener("click", function() {
  // Ocultar el menú superpuesto
  overlayMenu.classList.remove("show");
});

//trasparencia de el menu //
