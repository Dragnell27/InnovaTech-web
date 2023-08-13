
async function user() {
    try {
        const response = await fetch(url);
        const data = await response.json();
        const user=data.data[0];
        if (response.ok) {

                document.getElementById('firstName').value=user.first_name;
                document.getElementById('lastName').value=user.last_name;
                document.getElementById('email').value=user.email;
                const typeId=user.document_type.name +' ' + user.document;
                document.getElementById('identificacion').value=typeId;
                document.getElementById('numTel').value=user.phone;

        }

    } catch (error) {
        console.error('Error', error);
    }

}

async function DepartmentsName(nameDepartment){
    try{
        const response =await fetch("/departments/"+nameDepartment);
        const data = await response.json()
    console.log(data);
        return data.departments[0].name;
    }catch(error){
        console.error(`Error al obtener datos ${error}`);
        return null;
    }
}
let direccionesUsuario = [];
let direccionIndex = 0;

async function actualizarAdress(direccion,departmentName) {
 document.getElementById('NombreDepartment').value= departmentName;
 document.getElementById('city').value=direccion.city.city_name;
 document.getElementById('hood').value=direccion.hood;
document.getElementById('address').value=direccion.address;
document.getElementById('floor').value=direccion.floor;
}
async function cambiarDireccion(){
    direccionIndex=(direccionIndex+1)%direccionesUsuario.length;
    const direccionActual=direccionesUsuario[direccionIndex];
    const address= direccionActual.city;
    const address2= direccionActual;
    const departmentId = address.foreign;
    const departmentName=await DepartmentsName(departmentId);
actualizarAdress(address2,departmentName);

}
async function Address(){
   try {
    const response =await fetch("http://localhost/proyecto_web/public/api/address_user/"+id);
    const data = await response.json();
    direccionesUsuario=data.data;
    const direccionActual= direccionesUsuario[direccionIndex];
    const address= direccionActual.city;
    const address2= direccionActual;
    const departmentId = address.foreign;
    const departmentName=await DepartmentsName(departmentId);
actualizarAdress(address2,departmentName);

   } catch (error) {
    console.error(`Error al obtener datos de la API: ${error}`);

   }

}
 function agragrarDireccion(){

if(direccionesUsuario.length>0){
    document.getElementById('FormDomicilios').style.display='block';
    document.getElementById('agregarDirecion').style.display='none';
}
else{
    document.getElementById('FormDomicilios').style.display='none';
    document.getElementById('agregarDireccion').style.display='block';
}
}
document.getElementById('agregarDireccion').addEventListener('click',()=>{

});


window.addEventListener('load', async () => {

 await Address();
 await user();

});

//Select Comienzo


const selectElement = document.getElementById('direciones');
const formularioElement = document.getElementById('formirecciones');
let formularioVisible = false;


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

function mostrarForm(tipoLugar) {
document.getElementById("FormDomicilios").style.display="none";
document.getElementById("puntoFisico").style.display="none";
document.getElementById('agregarDireccion').style.display='none';

if(tipoLugar=="domicilios"){
    document.getElementById("FormDomicilios").style.display="block";
    agragrarDireccion();
}else if(tipoLugar=="Pfisico"){
    document.getElementById("puntoFisico").style.display="block";
    formularioElement.style.display = 'none'; // Ocultar el formulario
    formularioVisible = false;

}

}



// Agregar un evento de cambio al elemento select
selectElement.addEventListener('change', function() {
    // Obtener el valor de la opción seleccionada
    const opcionSeleccionada = selectElement.value;
    // Mostrar u ocultar el formulario según la opción seleccionada
    if (opcionSeleccionada === 'dir1') {
      if (formularioVisible) {
          formularioElement.style.display = 'none'; // Ocultar el formulario
           formularioVisible = false;

      }else{
          formularioElement.style.display = 'block';
          formularioVisible = true;

      }
       // Mostrar el formulario
    } else {
      formularioElement.style.display = 'none';
      formularioVisible = false;
      // Ocultar el formulario
    }
    // if (opcionSeleccionada === 'dir2') {
    //     if (formularioVisible) {
    //         formularioElement.style.display = 'none'; // Ocultar el formulario
    //          formularioVisible = false;

    //     }else{
    //         formularioElement.style.display = 'block';
    //         formularioVisible = true;

    //     }
    //      // Mostrar el formulario
    //   } else {
    //     formularioElement.style.display = 'none';
    //     formularioVisible = false;
    //     // Ocultar el formulario
    //   }
    //   if (opcionSeleccionada === 'dir3') {
    //     if (formularioVisible) {
    //         formularioElement.style.display = 'none'; // Ocultar el formulario
    //          formularioVisible = false;

    //     }else{
    //         formularioElement.style.display = 'block';
    //         formularioVisible = true;

    //     }
    //      // Mostrar el formulario
    //   } else {
    //     formularioElement.style.display = 'none';
    //     formularioVisible = false;
    //     // Ocultar el formulario
    //   }
  });







