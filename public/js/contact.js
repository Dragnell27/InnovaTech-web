
window.addEventListener("load",()=>{

    const form = document.querySelector("#formulario");
    form.addEventListener("submit",(e)=>{
       
        e.preventDefault();
        
        const phone = document.querySelector("#phone");
  if (userCheck == "false") {
    document.querySelector("#formulario").addEventListener("submit",(e)=>{
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debes iniciar sesión para enviarnos un mensaje!',
          })
    })
      // const pattern = new RegExp('^[A-Z]+$', 'i');
}else if(phone.value.length < 10  || phone.value.length >10 ){
        Swal.fire('El Numero de Teléfono Debe Tener 10 Digitos!')
    
    }else{
    
        Swal.fire({
            title: '¿Estas seguro de enviar este Mensaje?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Enviar',
            denyButtonText: `No Enviar`,
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire('Enviado!', '', 'success')
              form.submit();
            } else if (result.isDenied) {
              Swal.fire('Mensaje No Enviado ', '', 'info')
            }
          })
    }
    
    
    
    
    });



})
