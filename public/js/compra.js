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
        console.log(data);
        return data.departments[0].name;
    } catch (error) {
        console.error(`Error al obtener datos ${error}`);
        return null;
    }
}

//DIRECCIONES

async function cargarDirecciones() {
    const seleccionarDireccion = document.getElementById('direciones');
    const formDirecciones = document.getElementById('formDirecciones');
    const agregrarDireccion = document.getElementById('agregarDireccion');
    try {
        const response = await fetch(urlAddress);
        const data = await response.json();
        const addresses = data.data;
        console.log(addresses);
        let html = '<option value="-1">Elige la direccion</option>';
        for (let i = 0; i < addresses.length; i++) {
            const addressData=addresses[i];
           html += '<option value="' + i + '">Dirección ' + (i + 1) + ' - ' + addressData.address + ' - ' + addressData.hood + '</option>';
        }
        seleccionarDireccion.innerHTML = html;
        seleccionarDireccion.addEventListener('change', async function (event) {
            const addressIndex = event.target.value;
            if (addressIndex === '-1') {
                formDirecciones.style.display = 'none';
                agregrarDireccion.style.display = 'block';
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
        agregrarDireccion.style.display='none';
                } catch (error) {
                    console.error(`Error al obtener datos de la API: ${error}`);
                }
            }
        });
        //FUNCIÓN DL BOTON
    } catch (error) {
        console.error(`Error al obtener datos de la API: ${error}`);

    }
}



function mostrarForm(tipoLugar) {
    document.getElementById("FormDomicilios").style.display = "none";
    document.getElementById("puntoFisico").style.display = "none";
    document.getElementById('agregarDireccion').style.display = 'none';

    if (tipoLugar == "domicilios") {
        document.getElementById("FormDomicilios").style.display = "block";
        // agragrarDireccion();
    } else if (tipoLugar == "Pfisico") {
        document.getElementById("puntoFisico").style.display = "block";
        document.getElementById('formDirecciones').style.display = 'none';

        // formularioElement.style.display = 'none'; // Ocultar el formulario
        // formularioVisible = false;

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

});





