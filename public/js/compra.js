//CONSUMIENDO API USUARIOS

//AQUI VA EL TIPO DE DOCUMENTO
// async function tipoDocumento(){
//     const tipo_documento= document.getElementById('tipo_Documento');
//     try {
//         const response= await fetch('/type_documents/15');
//         const data= await response.json();
//         data.forEach(type=>{
//             const option= document.createElement('option');
//             option.value=type.id;
//             option.textContent=type.name;
//             tipo_documento.appendChild(option);
//         });

//     } catch (error) {
//         console.error(error,'error al traer los datos');
//     }
// }
//Actualizar USUARIOS








//NOMBRE DEL DEPARTAMENTO
async function DepartmentsName(nameDepartment) {
    try {
        const response = await fetch("/departments/" + nameDepartment);
        const data = await response.json()

        return data.departments[0].name;
    } catch (error) {
        console.error(`Error al obtener datos ${error}`);
        return null;
    }
};


//DIRECCIONES

async function cargarDirecciones(seleccionarDireccion,formDirecciones,btnAddAdress,labelAddress) {
    try {
        const response = await fetch(urlAddress);
        const data = await response.json();
       const addresses = data.data;

        let html = '<option value="-1">Elige la direccion</option>';
        let addressInactive=false;
        for (let i = 0; i < addresses.length; i++) {
            const addressData=addresses[i];
           html += '<option value="' + i + '">Dirección ' + (i + 1) + ' - ' + addressData.address + ' - ' + addressData.hood + '</option>';
        if (addressData.state==6) {
            addressInactive=true;
        }
        }
        seleccionarDireccion.innerHTML = html;
        if (addressInactive) {
            btnAddAdress.style.display='block';
            labelAddress.style.display='block';
        }else{
            btnAddAdress.style.display='none';
            labelAddress.style.display='none';

        }

        seleccionarDireccion.addEventListener('change', async function (event) {
            const addressIndex = event.target.value;
            if (addressIndex === '-1') {
                formDirecciones.style.display = 'none';

            } else {
                try {
                    const addressData = addresses[addressIndex];
                    const address2 = addressData.city;
                    const departmentId = address2.foreign;
                    const departmentName = await DepartmentsName(departmentId);

            document.getElementById('NombreDepartment').value= departmentName;
         document.getElementById('city').value=address2.city_name;
         document.getElementById('hood').value=addressData.hood;
        document.getElementById('address').value=addressData.address;

            document.getElementById('floor').value=addressData.floor;

            // const optionalFields = [
            //     { id: 'NombreDepartment', value: departmentName },
            //     { id: 'city', value: address2.city_name },
            //     { id: 'hood', value: addressData.hood },
            //     { id: 'address', value: addressData.address },
            //     { id: 'floor', value: addressData.floor }
            // ];

            // optionalFields.forEach(field => {
            //     if (field.value) {
            //         document.getElementById(field.id).value = field.value;
            //         document.getElementById(field.id).style.display = 'block'; // Mostrar el campo
            //     } else {
            //         document.getElementById(field.id).style.display = 'none'; // Ocultar el campo
            //     }
            // });

        formDirecciones.style.display='block';

                } catch (error) {
                    console.error(`Error al obtener datos de la API: ${error}`);

                }
            }
        });
        return addresses;

        
    } catch (error) {
        console.error(`Error al obtener datos de la API: ${error}`);
        return[];
    }
};
async function AddressAdmin(){
    try {
    const response2 = await fetch(urlAddressAdmin);
    const data2 = await response2.json();
    const addressAdmin= data2.data;
  let direccionAdmin = document.getElementById('direcionesAdmin');

  let html2 = ' <option value="-1"> Elige Punto Fisico</option>';
        for (let i = 0; i <addressAdmin.length; i++) {
            const addressData2=addressAdmin[i];
           html2 += '<option value="' + i + '">Dirección ' + (i + 1) + ' - ' + addressData2.address + ' - ' + addressData2.hood + '</option>';
        }
       direccionAdmin.innerHTML=html2;
       direccionAdmin.addEventListener('change',async function(event){
        const addressIndex2 = event.target.value;
        if (addressIndex2==='-1') {
   document.getElementById('formPuntoFisico').style.display="none";

        } else {
            try {
                const addressData2 = addressAdmin[addressIndex2 ];
                const addressCity =addressData2.city;
                document.getElementById("cityAdmin").value=addressCity.city_name;
                document.getElementById("hoodAdmin").value=addressData2.hood;
                document.getElementById("addressAdmin").value=addressData2.address;
                document.getElementById("floorAdmin").value=addressData2.floor;

                document.getElementById('formPuntoFisico').style.display="block";
            }
            catch (error) {
                console.error(error,"Error al traer los datos del api");
                }

        }

       });
    } catch (error) {
        console.error(error,"Error al traer los datos del api");
    }

};

async function mostrarForm(tipoLugar) {
    const formDirecciones = document.getElementById('formDirecciones');
    const formDomicilios = document.getElementById('FormDomicilios');
    const formPunto = document.getElementById('formPuntoFisico');
    const direcionesAdmin= document.getElementById('direcionesAdmin');
    const seleccionarDireccion = document.getElementById('direciones');
    const seleccionarpuntoFisico = document.getElementById('puntoFisico');
    const btnAddAdress = document.getElementById('agregarDireccion');
    const labelAddress= document.getElementById('labelAdress');
    seleccionarDireccion.selectedIndex=0;
    direcionesAdmin.selectedIndex=0;

    if (tipoLugar == "domicilios") {
        document.getElementById("btnContainer").style.display = "block";
        btnAddAdress.style.display = 'none';
        formPunto.style.display = 'none';
        formDomicilios.style.display = 'none';
        formDirecciones.style.display = 'none';
        seleccionarDireccion.style.display = 'none';
        seleccionarpuntoFisico.style.display = 'none';
        labelAddress.style.display='none';

        if (myGlobalAddress.length>0) {
            formDomicilios.style.display = 'block';
            seleccionarDireccion.style.display = 'block';

        }else{
            btnAddAdress.style.display = 'block';
        labelAddress.style.display='block';


        }
    } else if (tipoLugar == "Pfisico") {
        document.getElementById("btnContainer").style.display = "none";
        btnAddAdress.style.display = 'none';
        labelAddress.style.display='none';
        formPunto.style.display = 'none';
        formDomicilios.style.display = 'none';
        formDirecciones.style.display = 'none';
        seleccionarDireccion.style.display = 'none';
        seleccionarpuntoFisico.style.display = 'block';
        seleccionarpuntoFisico.style.display = 'block';


    }

};
const select = document.querySelector('#select');
const opciones = document.querySelector('#opciones');
const contenedorSelect = document.querySelector('#select .contenedorSelect');
const hiddenIn = document.querySelector('inputS');
document.querySelectorAll('#opciones > .opcion').forEach((opcion) => {
    opcion.addEventListener('click', (e) => {
        event.preventDefault();

        contenedorSelect.innerHTML = e.currentTarget.innerHTML;
        select.classList.toggle('active');
        opciones.classList.toggle('active');

    });
});

select.addEventListener('click', () => {
    select.classList.toggle('active');
    opciones.classList.toggle('active');
});



window.addEventListener('load', async () => {
const formDirecciones = document.getElementById('formDirecciones');
const seleccionarDireccion = document.getElementById('direciones');
const btnAddAdress = document.getElementById('agregarDireccion');
const labelAddress= document.getElementById('labelAdress');

myGlobalAddress = await cargarDirecciones(seleccionarDireccion, formDirecciones, btnAddAdress,labelAddress);
await AddressAdmin();


});

fetch(url)
.then(function (response){
if (!response.ok) {
    throw new Error('Network response was not ok');
}
return response.json();
})
.then(function (data) {
    const user = data.data[0];
    document.getElementById('firstName').value = user.first_name;
    document.getElementById('lastName').value = user.last_name;
    const typeId = user.document_type.name + ' ' + user.document;
    document.getElementById('identificacion').value = typeId;
    $('#input-email').val(user.email);
    $('#numTel').val(user.phone);
    $('#editPhone').val(user.phone);
    $('#editEmail').val(user.email);
})
.catch(function (error) {
    console.log(error);
});

$(document).ready(function(){
    const abrirEdit=$('.abrirEdit');
    const userdit= $('.userdit');
    const closeEdit =$('.closeEdit ');
    const guardarDatos=$('.savaDate');
    const AddDireccion=$('.AddDireccion');
    const addAddres=$('#agregarDireccion');
    let isButtonDisabled = false;
    abrirEdit.click(function(e){
    e.preventDefault();
    
    guardarDatos.click(function (e) {
        e.preventDefault();
        if (!isButtonDisabled) {
            isButtonDisabled=true
            guardarDatos.prop('disable',true)
            const numTel=$('#editPhone').val();
            const emailData= $('#editEmail').val();
            $.ajax({
                method:'post',
                url:"/updateUser/"+id,
                data:{
                    _token: token,
                    phone:numTel,   
                    email:emailData 
                },
                success: function(response) {
                    $('#input-email').val(emailData);
                    $('#numTel').val(numTel);
                   swal.fire({
                    position:'top-center',
                    icon:'success',
                    title:'Modificado correctamente',
                    showConfirmButton:false,
                    timer:1500
                   });
                    userdit.removeClass('userdit--openEdit');
                    setTimeout(() => {
                        isButtonDisabled=false;
                        guardarDatos.prop('disable',false)
                    }, 1000);
                   
                },
                error: function(xhr, status, error) {
                    // Manejar errores en caso de falla
                    isButtonDisabled = false;
                    guardarDatos.prop('disabled', false);
                    console.error('Error en la solicitud:', error);
                }
    
            });

        }
       
    });
    userdit.addClass('userdit--openEdit');
    $('#addAddress').hide();
        $('#userUpdateFomr').show();
    });
    addAddres.click(function (e) { 
        e.preventDefault();
    userdit.addClass('userdit--openEdit');

        $('#addAddress').show();
        $('#userUpdateFomr').hide();

     });
    closeEdit.click( function(e){
        e.preventDefault();
        userdit.removeClass('userdit--openEdit');
        });
    });