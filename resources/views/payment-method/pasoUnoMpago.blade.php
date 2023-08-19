@extends('layouts.contenedor')
@section('title','Paso Uno Compra')
@section('component')

<head>
    <link rel="stylesheet" href="{{ asset('css/compra.css') }}">
</head>

<section class="mt-2" style="font-family: 'Roboto', sans-serif;
background-color: #e5e5f7;">

    <div class="container ml-5">

        <div class="row g-5 pl-5 ml-5">
            <div class="col-md-5 col-lg-4 order-md-last" style="height: 20%">
                <h3 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-danger">Resumen de compra</span>

                    <span class="badge bg-danger rounded-pill">3</span>
                </h3>
                <div>
                    <ul class="list-group mb-3">
                        <div id="resumen">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">Nombre de Producto</h6>
                                        <small class="text-body-secondary">En esta parte va el producto y la
                                            descripción</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="text-success">
                                <h6 class="my-0">Total (USD)</h6>
                            </div>
                            <span class="text-success">−$20</span>

                        <li class="list-group-item  justify-content-between text-center">
                            <a href="" class="text-dark text-decoration-none ">
                                <span>
                                    <i class="bi bi-cart4"></i>
                                    volver al carro
                                </span>
                            </a>
                        </li>
                        </li>

                    </ul>

                </div>

                <form class="card p-2">
                    <div class="input-group">
                        <a name="" id="" class=" w-100 btn btn-primary  btn-lg" href="{{ route('Mpago') }}"
                            role="button">Ir a Pagar
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <h2 style="color:black">
                    Tus datos </h2>
                <strong>
                    <p class="form_parrafo">Verificalos para seguir con la compra
                    </p>
                </strong>
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6 text-center">
                            <label for="firstName" class="form-label">Nombre</label>
                            <input type="text" class=" text-center intputs " id="firstName" readonly
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

                        <div class="col-sm-12 text-center">
                            {{-- {{ route('users.edit', Auth::user()->id) }} --}}
                            <a href="#"id="userEdit" data-edit-url="{{ route('users.edit', Auth::user()->id) }}">Modificar datos</a>
                        </div>
                        <div id="editModal">
                            <div id="ContenedorUserEdit" class="modal">


                            </div>
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
                                                <div >
                                                    <h4><label for="" class="form-label">Dirección</label></h4>
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
                                                        <label for="" class="form-label">Puntos Físicos</label>                                                      </h4>
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
                                                    <input type="text" class="intputs text-center" id="addressAdmin" readonly
                                                        onselectstart="return false;">

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
        </div>


    </div>

</section>
@section('js')
<script>
    var BasUrl = "{{ url('/')}}";
    const url = BasUrl + "/api/users/" + '{{Auth::user()->id}}';
    const id = "{{ Auth::user()->id }}";
    const urlAddress = BasUrl + "/api/address_user/" + id;
    const urlAddressAdmin= BasUrl+ "/api/direccionesAdmin/";
</script>

<script src="{{ asset('js/compra.js') }}"></script>
@endsection
@extends('layouts.footer')
