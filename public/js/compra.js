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

        }else{
        console.error('Error al obtner los datatos del usuario');

        }
    } catch (error) {
        console.error('Error', error);
    }
}
async function DepartmentsName(cityid){
    try{
        const response =await fetch("http://localhost/proyecto_web/public/api/address");
        const data = await response.json();
        const ciudad= data.data[0].city;
        let departmentName="Departamento desconocido";
        ciudad.forEach(city=>{
            if(city.foraign==cityid){
                
            }
        })


        // for(const datacity of ciudad){
        //     if(datacity.foreign==departmentId){
        //         return datacity.name || "Departamento Desconocido";
        //     }
        // }
        // return "Departamento Desconocido";

    }catch(error){
        console.error(`Error al obtener datos de la API: ${error}`);
        return null;
    }
}
async function address(){
    const response =await fetch("http://localhost/proyecto_web/public/api/address");
     const data = await response.json();
     const address=data.data[0];
     console.log(address);

}
async function AdressAdmin(){

}
window.addEventListener('load', async () => {
    await compra();
    await user();
 await address();
    await DepartmentsName();
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


function mostrarForm(tipoLugar) {
document.getElementById("FormDomicilios").style.display="none";
document.getElementById("puntoFisico").style.display="none";
if(tipoLugar=="domicilios"){
    document.getElementById("FormDomicilios").style.display="block";
}else if(tipoLugar=="Pfisico"){
    document.getElementById("puntoFisico").style.display="block";

}
}



// funcion para que cuando yo le de click a un boton o alguna etiqueta me muestre algo, por ejemplo tengo dos botones 1domicilios y 2punto fisico si le doy click al boton domicilio que me muestre un formulario que tenga la direccion y ese tipo de cosas; o si le doy al boton punto fisico tambien me muestre otros input con otros datos todo esto mostrando datos de un api esto se puede con un if y pasandole la funcion al boton con un onclik? pero si l vuelvo a dar al boton

