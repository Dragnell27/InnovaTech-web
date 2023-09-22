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
    // const pattern = new RegExp('^[A-Z]+$', 'i');
const phone = document.querySelector("#phone");
if(phone.value.length < 10  || phone.value.length >10 ){
    Swal.fire('El Numero de Teléfono Debe Tener 10 Digitos!')

}else{

    Swal.fire({
        title: '¿Estas seguro de enviar este Mensaje?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        confirmButtonColor: '#3085d6',
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


