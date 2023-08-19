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

};
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
    seleccionarDireccion.selectedIndex=0;
    direcionesAdmin.selectedIndex=0;

    if (tipoLugar == "domicilios") {
        btnAddAdress.style.display = 'none';
        formPunto.style.display = 'none';
        formDomicilios.style.display = 'none';
        formDirecciones.style.display = 'none';
        seleccionarDireccion.style.display = 'none';
        seleccionarpuntoFisico.style.display = 'none';

        if (myGlobalAddress.length>0) {
            formDomicilios.style.display = 'block';
            seleccionarDireccion.style.display = 'block';

        }else{
            btnAddAdress.style.display = 'block';

        }
    } else if (tipoLugar == "Pfisico") {
        btnAddAdress.style.display = 'none';
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

    await user();
    myGlobalAddress = await cargarDirecciones(seleccionarDireccion, formDirecciones, btnAddAdress);
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


