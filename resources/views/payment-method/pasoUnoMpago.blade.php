@extends('layouts.contenedor')
@section('title', 'Paso Uno Compra')
@section('component')

    <head>
        <link rel="stylesheet" href="{{ asset('css/compra.css') }}">
    </head>
    <script>
        var example = "false";
    </script>
    <section class="mt-2" style="font-family: 'Roboto', sans-serif;">
        <div class="container ml-5">
            <div class="row g-5 pl-5 ml-5">
                @include('components.cart.cart-resume')
                <div class="col-md-7 col-lg-8">
                    <h2 style="color:black">
                        Tus datos <a class="abrirEdit" style="border: 0; background: none; font-size: 30px;cursor:pointer;"
                            href="#">
                            <svg width="30px" height="30px" fill="currentColor" class="bi bi-pencil-square"
                                viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>

                    </h2>
                    <strong>
                        <p class="form_parrafo">Verificalos para seguir con la compra
                        </p>
                    </strong>
                    <div class="row g-3">
                        <form action="" method="post" style=" min-width: 100px;max-width: 100%;max-height: 100%;">
                            <div class="containe">
                                <div class="row">
                                    <div class="col-sm-6 text-center ">
                                        <label for="firstName" class="form-label">Nombre</label>
                                        <input type="text" class=" form-control text-center" id="firstName" readonly
                                            onselectstart="return false;" value="">
                                    </div>

                                    <div class="col-sm-6 text-center">
                                        <label for="lastName" class="form-label">Apellido</label>
                                        <input type="text" class="form-control text-center" readonly
                                            onselectstart="return false;" id="lastName">

                                    </div>
                                    <div class="col-sm-6 text-center">
                                        <label for="num" class="form-label">Teléfono</label>
                                        <input id="numTel" class=" form-control text-center" readonly
                                            onselectstart="return false;">
                                    </div>

                                    <div class="col-sm-6 text-center mb-2">
                                        <label class="form-label">Identificación</label>
                                        <input class="form-control text-center" readonly onselectstart="return false;"
                                            id="identificacion">
                                    </div>
                                    <div class="col-sm-8 w-100 text-center">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="input-email" class="form-control text-center" readonly
                                            onselectstart="return false;">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row g-3">
                            <div class="col-12">

                                <div class="selectBox">
                                    <div class="select" id="select">
                                        <div class="contenedorSelect">
                                            <h5 class="titulo">Seleccione el tipo de entrega</h4>
                                                <p><strong class="descripcion">Elige como quieres tu entrega
                                                    </strong></p>
                                        </div>
                                        <img src="{{ asset('img/abajo.png') }}" style="width: 40px;">
                                    </div>
                                    <div class="opciones" id="opciones">
                                        <a href="#" class="opcion" style="text-decoration:none; color: inherit;">
                                            <button type="button" style="width: 100%; border: none;background:white"
                                                onclick="mostrarForm('domicilios')">
                                                <div class="contenidOption mt-1">
                                                    <img src="{{ asset('img/logistics-delivery.png') }}">
                                                    <div class="textos">
                                                        <h5 class="titulo">Domicilio</h5>
                                                        <p class="descripcion">pide tu producto desde la
                                                            comodidad de tu
                                                            hogar<i class="bi bi-house-door-fill"></i> </p>
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                        <a href="#" class="opcion" style="text-decoration:none; color: inherit;">
                                            <button type="button" style="width: 100%; border: none;background:white"
                                                onclick="mostrarForm('Pfisico')">
                                                <div class="contenidOption mt-1">
                                                    <img src="{{ asset('img/shopping-store.png') }}">
                                                    <div class="textos">
                                                        <h5 class="titulo">Punto Físico</h5>
                                                        <p class="descripcion">Acercate a nuestros puntos
                                                            fisicos y toma
                                                            tu pedido <i class="bi bi-geo-alt-fill"></i></p>
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 text-center">
                                <form action="" id="FormDomicilios" style="display: none">
                                    <div class="container">
                                        <div class="row g-3">
                                            <div>
                                                <h4><label for="" class="form-label">Dirección</label>
                                                </h4>
                                                <select class="selectAddress mb-2" id="direciones">
                                                    <option value="-1">Elige la direccion</option>

                                                </select>
                                            </div>

                                        </div>

                                </form>
                            </div>
                            <div class="col-12 mb-4">
                                <form action="" id="formDirecciones" style="display: none">
                                    <div class="container">
                                        <div class="row g-3">

                                            <div class="col-6">
                                                <label for="address2" class="form-label">Departamento</label>
                                                <input type="text" class="intputs text-center" id="NombreDepartment"
                                                    readonly onselectstart="return false;">
                                            </div>
                                            <div class="col-6">
                                                <label for="address2" class="form-label">Ciudad</label>
                                                <input type="text" class="intputs text-center" id="city" readonly
                                                    onselectstart="return false;">
                                            </div>

                                            <div class="col-6">
                                                <label for="address2" class="form-label mt-2 ">Barrio</label>
                                                <input type="text" class="intputs text-center" id="hood" readonly
                                                    onselectstart="return false;">
                                            </div>
                                            <div class="col-6 mb-4">
                                                <label for="address2" class="form-label mt-2 ">Dirección</label>
                                                <input type="text" class="intputs text-center" id="address" readonly
                                                    onselectstart="return false;">

                                            </div>

                                            <div
                                                class="container-fluid h-100 d-flex align-items-center justify-content-center">
                                                <div class="col-8">
                                                    <label for="address2" class="form-label mt-2 ">Detalle</label>
                                                    <input type="text" class="intputs text-center" id="floor"
                                                        readonly onselectstart="return false;">

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </form>
                                <div class="container  d-flex justify-content-center align-items-center">
                                    <a name="" id="agregarDireccion2" class="btn btn-primary mt-2 w-50"
                                        href="#" role="button" style="display:none;">Agregar Dirección</a>
                                </div>
                            </div>
                            <label id="labelAdress" style="font-size: 20px;display:none;">¿Aun no tienes
                                direcciones?</label>
                            <div class="container  d-flex justify-content-center align-items-center">
                                <a name="" id="agregarDireccion" class="btn btn-primary" href="#"
                                    style="display:none;width: 80%;
                                font-weight: 500;"
                                    role="button">Agregar Dirección</a>
                            </div>

                            <div class="col-12 text-center ">
                                <form action="" id="puntoFisico" style="display: none">
                                    <div class="container">
                                        <div class="row g-3">
                                            <div class="mb-2">
                                                <div class="mb-3">
                                                    <h4>
                                                        <label for="" class="form-label">Puntos
                                                            Físicos</label>
                                                    </h4>
                                                    <select class="selectAddress mb-2" id="direcionesAdmin">
                                                        <option value="-1"> Elige Punto Físico</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12 mb-4">
                                <form action="" id="formPuntoFisico" style="display: none">
                                    <div class="container">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label for="address2" class="form-label mt-2 ">Ciudad</label>
                                                <input type="text" class="intputs text-center" id="cityAdmin" readonly
                                                    onselectstart="return false;">
                                            </div>

                                            <div class="col-6">
                                                <label for="address2" class="form-label mt-2 ">Barrio</label>
                                                <input type="text" class="intputs text-center" id="hoodAdmin" readonly
                                                    onselectstart="return false;">
                                            </div>
                                            <div class="col-6 mb-4">
                                                <label for="address2" class="form-label mt-2 ">Dirección</label>
                                                <input type="text" class="intputs text-center" id="addressAdmin"
                                                    readonly onselectstart="return false;">

                                            </div>

                                            <div class="col-6">
                                                <label for="address2" class="form-label mt-2 ">Detalle</label>
                                                <input type="text" class="intputs text-center" id="floorAdmin"
                                                    readonly onselectstart="return false;">

                                            </div>
                                            <div class="">
                                                <a href="#" id="okPfisico"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="35" height="35" fill="currentColor"
                                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg></a>
                                            </div>
                                        </div>
                                </form>
                            </div>

                        </div>
                        <div class="userdit " id="userModal">
                            <div class=" editContainer">
                                <form id="userUpdateFomr" style="display: none">
                                    <div class="container col-12">
                                        <h4 class="mb-2">Modificar tus datos </h4>

                                        <img src="{{ asset('img/user-interface.png') }}" style="height: 50px; width:50px"
                                            alt="">
                                        <div class="row g-3">
                                            <div class=" col-sm-6">
                                                <label for="" class="form-label">Teléfono</label>
                                                <input type="text" id="editPhone" class="form-control text-center"
                                                    name="" placeholder="Numero teléfonico">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="" class="form-label">Correo</label>
                                                <input type="text" id="editEmail" class="form-control text-center"
                                                    placeholder="Correo electronico" aria-describedby="helpId">
                                            </div>

                                            <div class="float-end mb-5">
                                                <input type="submit" value="Guardar datos" class="savaDate">
                                                <button type="button" class=" closeEdit ">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="addAddress" style="display: none">
                                    <h4 class="mb-2">Agrega tu dirección preferencia</h4>
                                    <div class="container mb-2">
                                        <div class="row ">
                                            <div class="col-6 mb-2">
                                                <label for="">Ciudad<strong class="text-danger">
                                                        *</strong></label>
                                                <select class="form-select" id="creataCity">
                                                    <option value="">--Seleccionar--</option>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="">Departamento<strong class="text-danger">
                                                        *</strong></label>
                                                <select class="form-select" id="createDepartmens">
                                                    <option value="">--Seleccionar--</option>
                                                    @foreach ($departaments as $departamento)
                                                        <option value="{{ $departamento->id }}">{{ $departamento->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="">Barrio<strong class="text-danger">
                                                        *</strong></label>
                                                <input type="text" class="form-control text-center" id="createHood"
                                                    placeholder="Digite Barrio">
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="">Dirección<strong class="text-danger">
                                                        *</strong></label>
                                                <input type="text" class="form-control text-center" id="createAddress"
                                                    placeholder="Ejemplo: Cra # Bis ">
                                            </div>
                                            <div
                                                class="container-fluid h-100 d-flex align-items-center justify-content-center">
                                                <div class="col-6">
                                                    <label for="">Detalle</label>
                                                    <input type="text" class="form-control text-center"
                                                        id="crateFloor" placeholder="Ejemplo: piso,torre,casa... ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <input type="submit" value="Agregar dirección" class="AddDireccion">
                                        <button type="button" class=" closeEdit ">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

    </section>
@section('js')
    <script>
        var BasUrl = "{{ url('/') }}";
        const id = "{{ Auth::user()->id }}";
        const url = BasUrl + "/api/users/" + id;
        const urlAddress = BasUrl + "/api/address_user/" + id;
        const urlAddressAdmin = BasUrl + "/api/direccionesAdmin/";
        const token = '{{ csrf_token() }}';
    </script>
    <script>
        const csrfToken = "{{ csrf_token() }}";
        var cities = "{{ route('cities') }}"
        document.getElementById("createDepartmens").addEventListener("change", (e) => {
            console.log(e.target.value);
            fetch(cities, {
                method: 'POST',
                body: JSON.stringify({
                    "texto": e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken
                }

            }).then(response => {
                return response.json();
            }).then(data => {
                var opciones = '<option value="">-- Seleccionar --</option>';
                for (let i in data.city) {
                    opciones += `<option value="${data.city[i].id}">${data.city[i].name}</option>`;
                }
                document.getElementById("creataCity").innerHTML = opciones;
            }).catch(error => console.error(error));
        });
    </script>

    <script src="{{ asset('js/compra.js') }}"></script>
@endsection
@extends('layouts.footer')
