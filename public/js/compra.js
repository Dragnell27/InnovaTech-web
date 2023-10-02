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
let numDirecciones = 0;
let direccion = "";
let textoDireccion = "";
var html;
async function cargarDirecciones(seleccionarDireccion, formDirecciones, btnAddAdress, labelAddress) {
    try {
        const response = await fetch(urlAddress);
        const data = await response.json();
        const addresses = data.data;

        html = '<option value="-1">Elige la direccion</option>';
        let addressInactive = false;
        for (let i = 0; i < addresses.length; i++) {
            numDirecciones++;
            const addressData = addresses[i];
            html += '<option value="' + i + '">Dirección ' + (i + 1) + ' - ' + addressData.address + ' - ' + addressData.hood + '</option>';
            if (addressData.state == 6) {
                addressInactive = true;
            }
        }
        seleccionarDireccion.innerHTML = html;
        if (addressInactive) {
            btnAddAdress.style.display = 'block';
            labelAddress.style.display = 'block';
        } else {
            btnAddAdress.style.display = 'none';
            labelAddress.style.display = 'none';

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

                    document.getElementById('NombreDepartment').value = departmentName;
                    document.getElementById('city').value = address2.city_name;
                    document.getElementById('hood').value = addressData.hood;
                    document.getElementById('address').value = addressData.address;
                    document.getElementById('floor').value = addressData.floor;
                    const DireccionFacturaD = addressData.city_name + ", " + addressData.hood + ",  " + addressData.address + "," + addressData.floor;
                    if (window.location.pathname === 'Mpago') {
                        textoDireccion = "Lugar de envío";
                        direccion = DireccionFacturaD;

                    }
                    document.getElementById('idDireccion').textContent = `${textoDireccion}: ${direccion}`;
                    formDirecciones.style.display = 'block';

                } catch (error) {
                    console.error(`Error al obtener datos de la API: ${error}`);

                }
            }
        });
        return addresses;


    } catch (error) {
        console.error(`Error al obtener datos de la API: ${error}`);
        return [];
    }
};
async function AddressAdmin() {
    try {
        const response2 = await fetch(urlAddressAdmin);
        const data2 = await response2.json();
        const addressAdmin = data2.data;
        let direccionAdmin = document.getElementById('direcionesAdmin');
        let addressInactive = false;
        let html2 = ' <option value="-1"> Elige Punto Fisico</option>';
        for (let i = 0; i < addressAdmin.length; i++) {
            const addressData2 = addressAdmin[i];
            html2 += '<option value="' + i + '">Dirección ' + (i + 1) + ' - ' + addressData2.address + ' - ' + addressData2.hood + '</option>';
            + '</option>';
            if (addressData2.state == 6) {
                addressInactive = true;
            }
        }
        direccionAdmin.innerHTML = html2;
        direccionAdmin.addEventListener('change', async function (event) {
            const addressIndex2 = event.target.value;
            if (addressIndex2 === '-1') {
                document.getElementById('formPuntoFisico').style.display = "none";

            } else {
                try {
                    const addressData2 = addressAdmin[addressIndex2];
                    const addressCity = addressData2.city;
                    document.getElementById("cityAdmin").value = addressCity.city_name;
                    document.getElementById("hoodAdmin").value = addressData2.hood;
                    document.getElementById("addressAdmin").value = addressData2.address;
                    document.getElementById("floorAdmin").value = addressData2.floor;
                    const DireccionFacturaP = addressCity.city_name + ", " + addressData2.hood + ",  " + addressData2.address + "," + addressData2.floor;
                    if (window.location.pathname === '/payment-method/1') {
                        textoDireccion = "Lugar de entrega";
                        direccion = DireccionFacturaP;

                    }
                    document.getElementById('idDireccion').textContent = `${textoDireccion}: ${direccion}`;
                    document.getElementById('formPuntoFisico').style.display = "block";
                }
                catch (error) {
                    console.error(error, "Error al traer los datos del api");
                }

            }

        });
    } catch (error) {
        console.error(error, "Error al traer los datos del api");
    }

};

async function mostrarForm(tipoLugar) {
    try {
        const formDirecciones = document.getElementById('formDirecciones');
        const formDomicilios = document.getElementById('FormDomicilios');
        const formPunto = document.getElementById('formPuntoFisico');
        const direcionesAdmin = document.getElementById('direcionesAdmin');
        const seleccionarDireccion = document.getElementById('direciones');
        const seleccionarpuntoFisico = document.getElementById('puntoFisico');
        const btnAddAdress = document.getElementById('agregarDireccion');
        const labelAddress = document.getElementById('labelAdress');
        const btnAddAdress2 = document.getElementById('agregarDireccion2');
        seleccionarDireccion.selectedIndex = 0;
        direcionesAdmin.selectedIndex = 0;

        if (tipoLugar == "domicilios") {
            document.getElementById("btnContainer").style.display = "block";
            btnAddAdress2.style.display = 'block';
            btnAddAdress.style.display = 'none';
            formPunto.style.display = 'none';
            formDomicilios.style.display = 'none';
            formDirecciones.style.display = 'none';
            seleccionarDireccion.style.display = 'none';
            seleccionarpuntoFisico.style.display = 'none';
            labelAddress.style.display = 'none';


            if (myGlobalAddress.length > 0) {
                formDomicilios.style.display = 'block';
                seleccionarDireccion.style.display = 'block';

            } else {
                btnAddAdress.style.display = 'block';
                labelAddress.style.display = 'block';
                btnAddAdress2.style.display = 'none';



            }
        } else if (tipoLugar == "Pfisico") {
            document.getElementById("btnContainer").style.display = "none";
            btnAddAdress.style.display = 'none';
            btnAddAdress2.style.display = 'none';
            labelAddress.style.display = 'none';
            formPunto.style.display = 'none';
            formDomicilios.style.display = 'none';
            formDirecciones.style.display = 'none';
            seleccionarDireccion.style.display = 'none';
            seleccionarpuntoFisico.style.display = 'block';
            seleccionarpuntoFisico.style.display = 'block';


        }
    } catch (error) {

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
const direcionesAdmin = document.querySelector('#direcionesAdmin');
const labelPfisico = document.getElementById('labelPfisico');
direcionesAdmin.addEventListener('change', function () {
    if (direcionesAdmin.value == '-1') {
        labelPfisico.style.display = 'block';

    } else {
        labelPfisico.style.display = 'none';

    }
});




window.addEventListener('load', async () => {
    try {
        const formDirecciones = document.getElementById('formDirecciones');
        const seleccionarDireccion = document.getElementById('direciones');
        const btnAddAdress = document.getElementById('agregarDireccion');
        const labelAddress = document.getElementById('labelAdress');

        myGlobalAddress = await cargarDirecciones(seleccionarDireccion, formDirecciones, btnAddAdress, labelAddress);
        await AddressAdmin();
    } catch (error) {
        console.error(error, 'Error');
    }


});


fetch(url)
    .then(function (response) {
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


$(document).ready(function () {
    const abrirEdit = $('.abrirEdit');
    const userdit = $('.userdit');
    const closeEdit = $('.closeEdit ');
    const guardarDatos = $('.savaDate');
    const AddDireccion = $('.AddDireccion');


    let isButtonDisabled = false;
    abrirEdit.click(function (e) {
        e.preventDefault();

        guardarDatos.click(function (e) {
            e.preventDefault();
            if (!isButtonDisabled) {
                isButtonDisabled = true;
                guardarDatos.prop('disabled', true);
                const numTel = $('#editPhone').val();
                const emailData = $('#editEmail').val();
                $.ajax({
                    method: 'post',
                    url: "/updateUser/" + id,
                    data: {
                        _token: token,
                        phone: numTel,
                        email: emailData
                    },
                    success: function (response) {
                        $('#input-email').val(emailData);
                        $('#numTel').val(numTel);
                        swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Modificado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        userdit.removeClass('userdit--openEdit');
                        setTimeout(() => {
                            isButtonDisabled = false;
                            guardarDatos.prop('disabled', false)
                        }, 1000);

                    },
                    error: function (xhr, status, error) {
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
    $("#agregarDireccion,#agregarDireccion2").on("click", function (e) {
        e.preventDefault();
        if (numDirecciones >= 3) {
            Swal.fire({
                icon: 'error',
                title: 'ops...',
                text: 'Limite de direcciones alcanzada',
            });
            $('#addAddress').hide();
            $('#userUpdateFomr').hide();
            userdit.remove('userdit--openEdit');
        }
        if (numDirecciones < 3) {
            AddDireccion.click(function (e) {
                if (!isButtonDisabled) {
                    isButtonDisabled = true;
                    AddDireccion.prop('disabled', true);
                    const createDepartmens = $('#createDepartmens').val();
                    const createCity = $('#createCity').val();
                    const createHood = $('#createHood').val();
                    const createAddress = $('#createAddress').val();
                    const createFloor = $('#createFloor').val();

                    if (createDepartmens == '' || createCity == '' ||
                        createHood == '' || createAddress == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Por favor, complete todos los campos.',
                        });
                        $('.mensaje-aviso').css('display', 'block');
                        isButtonDisabled = false;
                        AddDireccion.prop('disabled', false);
                        return;
                    } else {

                        $('.mensaje-aviso').hide();
                        $.ajax({
                            method: 'post',
                            url: '/perfil/direcciones',
                            data: {
                                _token: token,
                                address: createAddress,
                                hood: createHood,
                                floor: createFloor,
                                param_city: createCity,
                                department: createDepartmens
                            },
                            success: function (response) {

                                swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'Dirección Creada',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                                userdit.removeClass('userdit--openEdit');


                                window.location.reload();
                                setTimeout(() => {
                                    isButtonDisabled = false;
                                    AddDireccion.prop('disabled', false)
                                }, 1000);

                            },
                            error: function (xhr, status, error) {
                                // Manejar errores en caso de falla
                                isButtonDisabled = false;
                                AddDireccion.prop('disabled', false);
                                console.error('Error en la solicitud:', error);
                            }
                        });

                    }



                }

            });
            $('#createDepartmens').on('input', function () {
                if ($(this).val() !== "") {
                    $('#mensaje-Departamento').css('display', 'none');
                }
            });
            $('#createCity').on('input', function () {
                if ($(this).val() !== "") {
                    $('#mensaje-Ciudad').css('display', 'none');
                }

            });
            $('#createHood').on('input', function () {
                if ($(this).val() !== "") {
                    $('#mensaje-barrio').css('display', 'none');
                }

            });
            $('#createAddress').on('input', function () {
                if ($(this).val() !== "") {
                    $('#mensaje-Direccion').css('display', 'none');
                }

            });

            userdit.addClass('userdit--openEdit');

            $('#addAddress').show();
            $('#userUpdateFomr').hide();
        }
    });

    closeEdit.click(function (e) {
        e.preventDefault();
        userdit.removeClass('userdit--openEdit');
    });
});








const okFactura = $('#okPfisico');
const modal = $('.modal');
const cerrar = $('.btnCerrar');
$('#direciones').change(function() {
const id_address = $('#direciones').val();
alert(id_address.val());
console.log(html);
})
okFactura.click(function (e) {
    swal.fire({
        title: 'Confirmar compra!',
        text: "Estas a solo pasos de realizar tu compra!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Comprar',
        confirmButtonColor: '#5cb85c',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.isConfirmed) {
            swal.fire({
                title: '¿Deseas ver tu recibo en pantalla?',
                text: "De igual forma este será Descargado en tu dispositivo",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#808080',
                cancelButtonText: 'Terminar compra',
                confirmButtonText: 'Ver recibo',
                allowOutsideClick: false,
                allowEscapeKey: false,

            }).then((result) => {
                function PDF() {

                    const content = document.getElementById('pdf');
                    Swal.fire({
                        title: 'Descargando',
                        html: 'Espera un momento... <i class="bi bi-download"></i>',
                        icon: 'info',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 2500,
                    })
                    html2pdf()
                        .set({
                            margin: 1,
                            filename: 'Factura.pdf',
                            Image: {
                                type: 'jpeg',
                                quality: 8.98,
                            },
                            html2canvas: {
                                scale: 3,
                                letterRendering: true,
                            },
                            jsPDF: {
                                unit: 'in',
                                format: 'a2',
                                orientation: 'portrait'
                            }
                        })
                        .from(content)
                        .save()
                        .catch(err => console.log(err))
                        .finally()
                        .then(() => {
                            modal.removeClass('modal--openModal');
                            $('.centrado').show();
                            $.ajax({
                                method: 'get',
                                url: '/shooping/' + id + "/2286/"+ id_address,
                                data: {
                                    _token: token
                                }, beforeSend: function () {
                                    $('.centrado').show();
                                },
                                success: function (response) {
                                    $('.centrado').hide();
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Compra exitosa',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });

                                    setTimeout(function () {
                                        $('.centrado').show();
                                        setTimeout(function () {
                                            window.location.href = '/';
                                        }, 1500);
                                    }, 1500);
                                },

                                error: function (xhr, status, error) {
                                    console.error('Error al comprar:', error);
                                    $('.centrado').hide();
                                }

                            });

                        })
                }
                if (result.isConfirmed) {
                    modal.addClass('modal--openModal');
                    $('#factura').show();

                    modal.on('click', function (event) {
                        if ($(event.target).hasClass('modal')) {
                            PDF();

                        }
                        event.stopPropagation();
                    });
                    cerrar.on('click', function (event) {
                        event.preventDefault();

                        PDF();

                    });

                } else {

                    PDF();
                }
            });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        );
    });

});





