document.addEventListener("DOMContentLoaded", function() {
    var botonCargar = document.getElementById("CargarBoton");
    var comentariosContainer = document.getElementById("comentarios-container");

    if (!botonCargar || !comentariosContainer) {
        console.error("El botón o el contenedor de comentarios no se encontraron.");
        return;
    }
    comentariosContainer.style.display = "none";

    botonCargar.addEventListener("click", async function() {
        if (comentariosContainer.style.display === "none") {
            comentariosContainer.style.display = "block";
            botonCargar.textContent = "Cerrar comentarios";


            //aqui hace el fecth
            const id = document.querySelector("#product_id").value;
            console.log(BASE);
            const response = await fetch( BASE+ `/api/comentario/`+id);
             const data = await response.json();
             var datos =data["data"];
             console.log(datos);
             const div = document.createElement("div");
             div.classList ="col-md-8";
             const divmenor = document.createElement("div");
             divmenor.classList ="comments"
             div.appendChild(divmenor);
            const divComentario = document.createElement("div");
            divComentario.classList = "comment"
            divmenor.appendChild(divComentario);


        } else {
            comentariosContainer.style.display = "none";
            botonCargar.textContent = "Ver comentarios";
        }
    });
});

function obtenerComentarios() {
    const comentariosContainer = document.getElementById("comentarios-container");
    const comentarios = comentariosContainer.querySelectorAll(".comment");
    const resultados = [];
    comentarios.forEach(comentario => {
        const nombre = comentario.querySelector("#user_id").textContent;
        const estrellas = comentario.querySelector("#starts").textContent;
        const comentarioTexto = comentario.querySelector("#comments").textContent;

        resultados.push({
            nombre: nombre,
            estrellas: estrellas,
            comentario: comentarioTexto
        });
    });
    return resultados;
}
const comentarios = obtenerComentarios();
console.log(comentarios);



