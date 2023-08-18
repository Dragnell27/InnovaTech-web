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

window.addEventListener("load",async ()=>{
    //contenedor a guardar los comentarios
     const container  =document.querySelector("#comments-cont");

    //id del producto
    const id = document.querySelector("#product_id").value;
    //url base 
    const url = BASE + '/api/comentario/' +id;

    //Fetch
    const response = await fetch(url);
    const data = await response.json();

   

    data.data.forEach(element => {

      //--------------------//

    //Creacion de div para los comentarios//
console.log(element)
    const card = document.createElement("div");
    card.style.margin ="10px 0";
    const card_Header = document.createElement("div");
    const card_Body = document.createElement("div");
    const star_rating = document.createElement("div");

    for (let i = 1; i <=5; i++) {
        if (i <=  element.estrellas) {
            const star = document.createElement("i");
            star.className =""
            star.innerHTML ="&#9733;";
            star_rating.appendChild(star);
        }else{
            const star = document.createElement("i");
            star.innerHTML ="&#9734;";
            star_rating.appendChild(star);
        } 
    }
    //------Asignacion de clases----//

    card.classList = "card";
    card_Header.classList = "card-header";
    card_Body.classList ="card-body";
    star_rating.classList ="star_rating";

    //sacar la fecha del comentario
    const fecha = element.hora.split(" ");

    card_Header.innerHTML=fecha[0];
    card_Body.innerHTML = "<span>"+element.comentario+"</span>"

    //-------appendchilds---//
    card.appendChild(card_Header);
    card_Body.appendChild(star_rating);
    card.appendChild(card_Body);
    
    container.appendChild(card);



    //-------------------//
  
    });

    
   

});



