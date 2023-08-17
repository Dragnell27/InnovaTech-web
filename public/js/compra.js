//CONSUMIENDO API USUARIOS
async function user() {
    try {
        const response = await fetch(url);
        const data = await response.json();
        const user = data.data[0];
        if (response.ok) {

            document.getElementById('firstName').value = user.first_name;
            document.getElementById('lastName').value = user.last_name;
            document.getElementById('email').value = user.email;
            const typeId = user.document_type.name + ' ' + user.document;
            document.getElementById('identificacion').value = typeId;
            document.getElementById('numTel').value = user.phone;

        }

    } catch (error) {
        console.error('Error', error);
    }

}
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
}

//DIRECCIONES

async function cargarDirecciones(seleccionarDireccion,formDirecciones,btnAddAdress) {
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
        }else{
            btnAddAdress.style.display='none';
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

        formDirecciones.style.display='block';

                } catch (error) {
                    console.error(`Error al obtener datos de la API: ${error}`);

                }
            }
        });
        return addresses;
       
        //FUNCIÓN DL BOTON
    } catch (error) {
        console.error(`Error al obtener datos de la API: ${error}`);
        return[];
    }
}
async function AddressAdmin(){
    try {
    const response = await fetch(urlAddressAdmin);
    const data = await response.json();
    const addressAdmin= data.data;
  const direccionAdmin = document.getElementById('direcionesAdmin');
  let html = ' <option value="-1"> Elige Punto Fisico</option>';
        for (let i = 0; i <addressAdmin.length; i++) {
            const addressData=addressAdmin[i];
           html += '<option value="' + i + '">Dirección ' + (i + 1) + ' - ' + addressData.address + ' - ' + addressData.hood + '</option>';
        }
       direccionAdmin.innerHTML=html;
       direccionAdmin.addEventListener('change',async function(event){
        try {
            const addressData = addressAdmin[0];
            const address2 =addressData.city;
            document.getElementById("cityAdmin").value=address2.city_name;
            document.getElementById("hoodAdmin").value=addressData.hood;
            document.getElementById("addressAdmin").value=addressData.address;
            document.getElementById("floorAdmin").value=addressData.floor;

            formPuntoFisico.style.display='block';
        } catch (error) {
        console.error(error,"Error al traer los datos del api");
        }
       

       });
    } catch (error) {
        console.error(error,"Error al traer los datos del api");
    }

}


async function mostrarForm(tipoLugar) {
    const seleccionarDireccion = document.getElementById('direciones');
    const formDirecciones = document.getElementById('formDirecciones');
    const formPuntoFisico= document.getElementById('formPuntoFisico');
    const btnAddAdress = document.getElementById('agregarDireccion');
    // document.getElementById('formPuntoFisico').style.display="none";
    document.getElementById("FormDomicilios").style.display = "none";
    document.getElementById("puntoFisico").style.display = "none";
    btnAddAdress.style.display='none';
    if (tipoLugar == "domicilios") {
    const addresses= await cargarDirecciones(seleccionarDireccion, formDirecciones,btnAddAdress);

        if (addresses.length>0) {
            document.getElementById("FormDomicilios").style.display = "block";
            document.getElementById('formPuntoFisico').style.display="none";

        }else{
            btnAddAdress.style.display='block';
            document.getElementById("FormDomicilios").style.display = "none";
        document.getElementById('formPuntoFisico').style.display="none";

        }


    } else if (tipoLugar == "Pfisico") {
        document.getElementById("puntoFisico").style.display = "block";
        document.getElementById('formDirecciones').style.display = 'none';

    }

}
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

    await user();
    await cargarDirecciones();
    await AddressAdmin();

});



document.getElementById("userEdit").addEventListener('click',function (e) {
e.preventDefault();
var editUser=this.getAttribute("data-edit-url");
var viewEditUser= new XMLHttpRequest();

viewEditUser.onreadystatechange=function() {
    if (viewEditUser.readyState==4 && viewEditUser.status === 200) {
        document.getElementById('ContenedorUserEdit').innerHTML=viewEditUser.responseText;
        document.getElementById("editModal").style.display = "flex";
    document.getElementById('ContenedorUserEdit').style.display='block';
    }
};
viewEditUser.open("GET", editUser, true);
viewEditUser.send();
});
function closeEditModal() {
    document.getElementById("ContenedorUserEdit").style.display = "none";
    document.getElementById("editModal").style.display = "none";
  }


