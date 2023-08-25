//æuthor DARKJ
window.addEventListener("load", async ()=>{
   
    try {
        // consumo al API de pqrs, debo cambiar el url cuando se compre el hosting
        // const url ="http://localhost:8012/proyecto_web/public/api/faqs/type/1";
        const response = await fetch(`api/faqs/type/1`);
       const data = await response.json();
//Select donde los voy a meter
       const select = document.querySelector("#param_type");

       const handleData= (data) => {
        data.forEach(element => {
            let name = element.name;
            let id = element.id;

            const option = document.createElement("option");
            option.value = id;
            option.text = name;
            select.appendChild(option);  
        })
      
       }
       handleData(data);

        
    } catch (error) {
        
    }
    




});

// $("#formulario").submit(function(e){
//     e.preventDefault();
//     const nameInput = document.getElementById("name");
//     const phoneInput = document.getElementById("phone");
//     const emailInput = document.getElementById("email");
//     const paramTypeSelect = document.getElementById("param_type");
//     const formulario = document.getElementById('formulario');

  
//     // var data = {
//     //     "name": nameInput.value,
//     //     "phone": phoneInput.value,
//     //     "email" : emailInput.value,
//     //     "type": paramTypeSelect.value
//     // };
//     const data = new FormData(document.getElementById('formulario'));
//    console.log(data)
// fetch("http://localhost:8012/proyecto_web/public/api/faqs/",{
//     method : "POST",
//     body: data
// }).then(function(response) {
//     if(response.ok) {
//         console.log("ok");
//         formulario.reset();
//     } else {
//         throw "Error en la llamada Ajax";
//     }
 
//  });


//     // $.ajax({
//     //     type: "POST",
//     //     url: "http://localhost:8012/proyecto_web/public/api/faqs/",
//     //     data: data,
//     //     dataType: "dataType",
//     //     success: function (data) {
//     //         console.log("success")
//     //         window.location.reload();
//     //     }
//     // });

// });

var buttons = document.querySelectorAll(".actionBt");
buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
        var faqsContainer = document.getElementById("faqs-container");
        var chatContainer = document.getElementById("chat-container");

        if (faqsContainer.classList.contains("active")) {
            faqsContainer.style.opacity = 0;
            faqsContainer.style.height = "0";
        } else {
            faqsContainer.style.opacity = 1;

            faqsContainer.style.height = faqsContainer.scrollHeight + "px";
        }

        faqsContainer.classList.toggle("active");
        chatContainer.classList.toggle("active");
    });
});

const form = document.querySelector("#formulario");
form.addEventListener("submit",(e)=>{
   
    e.preventDefault();
    const pattern = new RegExp('^[A-Z]+$', 'i');
const phone = document.querySelector("#phone");
if(phone.value.length < 10  || phone.value.length >10 || pattern.test(phone.value)){
    Swal.fire('El Numero de Teléfono Debe Tener 10 Digitos!')

}else{

    Swal.fire({
        title: '¿Estas seguro de enviar este Mensaje?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        denyButtonText: `No Enviar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire('Enviado!', '', 'success')
          form.submit();
        } else if (result.isDenied) {
          Swal.fire('Mensaje No Enviado ', '', 'info')
        }
      })
}




});


