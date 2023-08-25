
window.addEventListener("load",async ()=>{
    commentContainer = document.querySelectorAll(".cardComment");
    if (userCheck == "false") {
        document.querySelector("#commentForm").addEventListener("submit",(e)=>{
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes iniciar sesión para comentar!',
              })
        })
    }
   
    botonCargar = document.getElementById("CargarBoton");
    botonCargar.addEventListener("click", handleClick )
    //contenedor a guardar los comentarios
     const container  =document.querySelector("#comments-cont");

    //id del producto
    const id = document.querySelector("#product_id").value;
    //url base 
    const url = BASE + '/api/comment/' +id;

    //Fetch
    const response = await fetch(url);
    const data = await response.json();

   
    if (data.data.length <=3) {
        botonCargar.style.display = "none";
    }
if (data.data.length <=0) {
   
    const comments = document.querySelector("#commentSection");
    const messageContainer = document.createElement("div");
    const messagge = document.createElement("h6");
    messagge.innerHTML = "<div>No hay comentarios.</div> <div>Se el primero en dar tu opinion.</div>";
    messageContainer.appendChild(messagge);
    comments.appendChild(messageContainer);
    
    
    // document.querySelector("#commentTitle").style.display = "none"
    botonCargar.style.display = "None";
    
}else{
    var i = 0;

    data.data.forEach(element => {
    
        i++;
      //--------------------//

    //Creacion de div para los comentarios//
    
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

    card.classList = (i<=3)?"card" : "inactive card cardComment" ;
    card_Header.classList = "card-header";
    card_Body.classList ="card-body";
    star_rating.classList ="star_rating";

    //sacar la fecha del comentario
    const fecha = element.hora.split(" ");
    

    card_Header.innerHTML="<span>"+fecha[0]+"</span>" + "<span> Usuario: "+element.name+"</span>";
    card_Body.innerHTML = "<span>"+element.comentario+"</span>"

    //-------appendchilds---//
    card.appendChild(card_Header);
    card_Body.appendChild(star_rating);
    card.appendChild(card_Body);
    
    container.appendChild(card);



    //-------------------//
  
    });
}
    
    


    
   

});

function handleClick(){
   
  
    if(botonCargar.innerHTML  == "Ver menos"){
        botonCargar.innerHTML = "Ver mas"
    }else{
        botonCargar.innerHTML = "Ver menos"

    }
    commentContainer.forEach((element)=>{
        element.classList.toggle("inactive")
    });
}


