@extends('layouts.contenedor')
@section('title', 'Paso Uno Compra')
@section('component')

<head>
    <link rel="stylesheet" href="{{ asset('css/compra.css') }}">
</head>

<section class="mt-2" style="font-family: 'Roboto', sans-serif;
background-color: #e5e5f7;">
    <div class="container ml-5">
        <div class="row g-5 pl-5 ml-5">
            @include('components.cart.cart-resume')
            <div class="col-md-7 col-lg-8">

                <h2 style="color:black">
                    Tus datos <a class="abrirEdit" style="border: 0; background: none; font-size: 30px;cursor:pointer;"
                        href="{{ route('users.edit',Auth::user()->id) }}">
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
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6 text-center">
                            <label for="firstName" class="form-label">Nombre</label>
                            <input type="text" class=" text-center intputs" id="firstName" readonly
                                onselectstart="return false;" value="">
                        </div>

                        <div class="col-sm-6 text-center">
                            <label for="lastName" class="form-label">Apellido</label>
                            <input type="text" class="intputs text-center" readonly onselectstart="return false;"
                                id="lastName">

                        </div>
                        <div class="col-sm-6 text-center">
                            <label for="num" class="form-label">Teléfono</label>
                            <input type="" class="intputs text-center" readonly onselectstart="return false;"
                                id="numTel">
                        </div>

                        <div class="col-sm-6 text-center">
                            <label for="email" class="form-label">Identificación</label>
                            <input type="email" class="intputs text-center" readonly onselectstart="return false;"
                                id="identificacion">
                        </div>
                        <div class="col-sm-12 text-center">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="intputs text-center" readonly onselectstart="return false;"
                                id="email">
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">

                                <div class="col-12">
                                    <form action="">
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
                                                <a href="#" class="opcion"
                                                    style="text-decoration:none; color: inherit;">
                                                    <button type="button"
                                                        style="width: 100%; border: none;background:white"
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
                                                <a href="#" class="opcion"
                                                    style="text-decoration:none; color: inherit;">
                                                    <button type="button"
                                                        style="width: 100%; border: none;background:white"
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
                                    </form>
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
                                                        <label for="address2" class="form-label mt-2 ">Piso</label>
                                                        <input type="text" class="intputs text-center" id="floor"
                                                            readonly onselectstart="return false;">

                                                    </div>

                                                </div>

                                            </div>
                                    </form>
                                </div>

                                <div class="col-12 align-text-center">
                                    <a name="" id="agregarDireccion" class="btn btn-primary " href="#"
                                        style="display:none;" role="button">Agregar Dirección</a>
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
                                                    <input type="text" class="intputs text-center" id="cityAdmin"
                                                        readonly onselectstart="return false;">
                                                </div>

                                                <div class="col-6">
                                                    <label for="address2" class="form-label mt-2 ">Barrio</label>
                                                    <input type="text" class="intputs text-center" id="hoodAdmin"
                                                        readonly onselectstart="return false;">
                                                </div>
                                                <div class="col-6 mb-4">
                                                    <label for="address2" class="form-label mt-2 ">Dirección</label>
                                                    <input type="text" class="intputs text-center" id="addressAdmin"
                                                        readonly onselectstart="return false;">

                                                </div>

                                                <div class="col-6">
                                                    <label for="address2" class="form-label mt-2 ">Piso</label>
                                                    <input type="text" class="intputs text-center" id="floorAdmin"
                                                        readonly onselectstart="return false;">

                                                </div>

                                            </div>
                                    </form>
                                </div>

                        </form>
                </form>
            </div>
            <div class="userdit " id="userModal">
                <div class=" editContainer">
                    <form action="{{ route('users.update', Auth::user()->id) }}" id="userUpdateFomr" method="post">
                        @csrf
                        @method('patch')
                        <div class="container col-8">
                            <img src="{{ asset('img/user-interface.png') }}" style="height: 50px; width:50px" alt="">

                            <div class="row g-3">
                                <div class=" col-sm-6">
                                    <label for="" class="form-label">Telefono</label>
                                    <input type="text" class="form-control text-center" name="" id="telefono" placeholder="Numero teléfonico">
                                </div>
                                <div class="col-sm-6">
                                    <label for="tipo_documento" class="form-label">Tipo de Documento:</label>
                                    <select class="form-select text-center" required id="tipo_Documento">
                                        <option value="">--Seleccionar--</option>
                            </select>

                        </div>
                                <div class="col-6 w-100">
                                    <label for="" class="form-label">Correo</label>
                                    <input type="text" name="" id="correo" class=" form-control text-center" placeholder="Correo electronico"
                                        aria-describedby="helpId">
                                </div>

                            <div class="float-end mb-5">
                                <input type="submit" value="Guardar datos" class="savaDate">
                                <button type="button" class=" closeEdit ">Cancelar</button>
                            </div>
                        </div>
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
    const url = BasUrl + "/api/users/" + '{{ Auth::user()->id }}';
    const id = "{{ Auth::user()->id }}";
    const urlAddress = BasUrl + "/api/address_user/" + id;
    const urlAddressAdmin = BasUrl + "/api/direccionesAdmin/";

</script>

<script src="{{ asset('js/compra.js') }}"></script>
@endsection
@extends('layouts.footer')
