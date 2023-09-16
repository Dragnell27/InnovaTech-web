
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
      if(idUser == element.userId){    
                 document.querySelector("#contenedorcomentarios").style.display = "None"; 
                 document.querySelector("#commentSection2").innerHTML =`<p style="color: red;">Solo puedes dejar un comentario  </p>`; 
              
                     }
    //Creacion de div para los comentarios//
    
    const card = document.createElement("div");
    card.style.margin ="10px 0";
    const card_Header = document.createElement("div");
    const card_Body = document.createElement("div");
    const star_rating = document.createElement("div");
    const cardFooter = document.createElement("div");
    const btn_delete = document.createElement("button");
  
    

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
    cardFooter.classList="card-footer text-body-secondary"

    //verificar si el usuario tiene un comentario para que lo pueda eliminar
    if (idUser == element.userId) {
      cardFooter.dataset.id =element.commentID
      btn_delete.classList = "btn btn-link danger";
      btn_delete.textContent="Eliminar comentario";
      btn_delete.setAttribute("id",element.commentID)
      btn_delete.addEventListener("click",()=>handleDelete(cardFooter.dataset.id ))
      cardFooter.appendChild(btn_delete);
    }

    //sacar la fecha del comentario
    const fecha = element.hora.split(" ");
    

    card_Header.innerHTML="<span style='color:gray;' >"+fecha[0]+"</span>" + "<span style='color:gray;'> Por: "+element.name+"</span>";
    card_Body.innerHTML = "<span>"+element.comentario+"</span>"

    //-------appendchilds---//
    card.appendChild(card_Header);
    card_Body.appendChild(star_rating);
    card.appendChild(card_Body);
    card.appendChild(cardFooter);
    
    container.appendChild(card);



    //-------------------//
  
    });
}

function handleDelete(id){
  Swal.fire({
    title: '¿Estas seguro?',
    text: "No podras deshacer esta acción!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, por favor!',
    cancelButtonText: "Cancelar"
  }).then((result) => {
    if (result.isConfirmed) {
      
    fetch(BASE + '/api/comment/' +id,{ method: 'DELETE'})
    .then(()=>{
      document.getElementById(id).innerHTML = "Cargando..."
    }).finally(()=>{
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Tu comentario ha sido eliminado!',
        showConfirmButton: false,
        timer: 5000
      }).then(()=>{ window.location.reload()})
    })
    .catch(error => console.log(error))
      }//aqui acaba el fetch
  })// aqui acaba el then del alert

}
const form = document.querySelector("#commentForm");
form.addEventListener("submit",(e)=>{
  e.preventDefault();
 //verificar si ya tiene estrellas
  if(document.querySelector("#num_star").value == "null"){
    
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Debes calificar el producto!',
    })


  }else{
      //ponerle clases al swalfire
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger my-2'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: '¿Estas seguro?',
        text: "No podras deshacer esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si,Guardar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
      form.submit();
        
          swalWithBootstrapButtons.fire(
            'Guardado!',
            'Tu comentario ha sido guardado!.',
            'success'
          )
        
        } else if (
        
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'No has enviado tu comentario :)',
            'info'
          )
        }
      }); //Aqui acaba el swalfire

  }

  
});
    
});



function handleClick(){
    commentContainer1 = document.querySelectorAll(".cardComment");
  
      if(botonCargar.innerHTML  == "Ver menos"){
          botonCargar.innerHTML = "Ver mas"
      }else{
          botonCargar.innerHTML = "Ver menos"
  
      }
      commentContainer1.forEach((element)=>{
          element.classList.toggle("inactive")
      });
  }
  