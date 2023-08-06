async function compra() {
    // try {
    //     const response =await fetch("http://localhost/proyecto_web/public/api/products");
    //     const data = await response.json();
    //     data.forEach((producto)=>{
    //     console.log(producto);

    //     document.getElementById("imgP").src=producto.images;
    //     document.getElementById("name").textContent=producto.name;

    // });
    // } catch (error) {
    //     console.error('Error al obtener los datos del producto');
    // }
}

async function user() {
    try {
        if (!url) {
            console.error('el usuario no esta registrado');
            return;
        }
        const response = await fetch(url);
        if (response.ok) {
            const data = await response.json();
            const user=data.data[0];
            document.getElementById('firstName').value=user.first_name;
            document.getElementById('lastName').value=user.last_name;
            document.getElementById('email').value=user.email;
            const typeId=user.document_type.name +' ' + user.document;
            document.getElementById('identificacion').value=typeId;
            document.getElementById('numTel').value=user.phone;




            console.log(user);
        }else{
        console.error('Error al obtner los datatos del usuario');

        }
    } catch (error) {
        console.error('Error', error);
    }
}

window.addEventListener('load', async () => {
    await compra();
    await user();
});

const select= document.querySelector('#select');
const opciones= document.querySelector('#opciones');
const contenedorSelect=document.querySelector('#select .contenedorSelect');
const hiddenIn=document.querySelector('inputS');
document.querySelectorAll('#opciones > .opcion').forEach((opcion)=>{
opcion.addEventListener('click',(e)=>{
    event.preventDefault();

   contenedorSelect.innerHTML=e.currentTarget.innerHTML;
   select.classList.toggle('active');
   opciones.classList.toggle('active');

});
});
select.addEventListener('click',()=>{
select.classList.toggle('active');
opciones.classList.toggle('active');


});

// const mostrarDomi =document.getElementById('mostrarDomi');
// const mostrarPuntoF =document.getElementById('mostrarPfi');
// const domicilios =document.getElementById('domicilios');
// const puntoFisico =document.getElementById('puntoFisico');

// mostrarDomi.addEventListener('click',(event)=>{
//     event.preventDefault();
//     domicilios.style.display='block';
//     domicilios.style.display='none';

// });
// mostrarPuntoF.addEventListener('click',(event)=>{
//     event.preventDefault();
//     puntoFisico.style.display='block';
//     puntoFisico.style.display='none';

// });
// const content=document.body;

// content.addEventListener('click',(event)=>{
// if(event.target.classList.contains('opcion')){
//     event.preventDefault();
//     const formId= event.target.getAttribute('formData');

//     document.querySelectorAll('form').forEach((formulario) => {
//         formulario.style.display = 'none';
//     });
//     const formularioMostrar = document.getElementById(`formulario${formId.charAt(0).toUpperCase() + formularioId.slice(1)}`);
// if (formularioMostrar) {
//     formularioMostrar.style.display = 'block';
// }
// }
// });

function mostrarForm(tipoLugar) {
    document.getElementById("FormDomicilios").style.display="none";

if(tipoLugar=='domicilios'){
    document.getElementById("FormDomicilios").style.display="block";
}


}





