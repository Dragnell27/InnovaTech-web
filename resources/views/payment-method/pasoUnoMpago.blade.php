@extends('layouts.contenedor')
@section('title','Home')
@section('component')

<head>
    <link rel="stylesheet" href="{{ asset('css/compra.css') }}">
</head>

<section class="mt-2">
    <div class="container" style="margin-left: 10%">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last" style="margin-top: 6%">
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
                            <a name="" id="" class=" btn btn-primary  btn-lg" href="{{ route('LuEnvio') }}"
                                role="button" style="margin-left: 8%">Lugar de envio
                            </a>&nbsp;&nbsp;
                            <a name="" id="" class="btn btn-warning  btn-lg" href="#" role="button">Descartar</a>
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
                                <label for="num" class="form-label">Telefono</label>
                                <input type="" class="intputs text-center" readonly onselectstart="return false;"
                                    id="numTel">
                            </div>

                            <div class="col-sm-6 text-center">
                                <label for="email" class="form-label">identificacion</label>
                                <input type="email" class="intputs text-center" readonly onselectstart="return false;"
                                    id="identificacion">
                            </div>
                            <div class="col-sm-12 text-center">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="intputs text-center" readonly onselectstart="return false;"
                                    id="email">
                            </div>

                            <div class="col-sm-12 text-center">
                                <a href="{{ route('users.edit', Auth::user()->id) }}">Modificar datos</a>
                            </div>

                            <div class="col-12 mb-2">
                                <form action="">
                                    <div class="selectBox">
                                        <div class="select" id="select">
                                            <div class="contenedorSelect">
                                                <h5 class="titulo">selecione el tipo de entrega</h4>
                                                    <p><strong class="descripcion">Elige como quires tu entrega
                                                        </strong></p>
                                            </div>
                                            <img src="{{ asset('img/abajo.png') }}" style="width: 40px;">
                                        </div>
                                        <div class="opciones" id="opciones">
                                            <a href="#" class="opcion" style="text-decoration:none; color: inherit;" >
                                                <button style="width: 100%; border: none;background:white" onclick="mostrarForm('domicilios')">
                                                <div class="contenidOption">
                                                    <img src="{{ asset('img/logistics-delivery.png') }}">
                                                    <div class="textos">
                                                        <h5 class="titulo">Domicilio</h5>
                                                        <p class="descripcion">pide tu producto desde la comodidad de tu
                                                            hogar<i class="bi bi-house-door-fill"></i> </p>
                                                    </div>
                                                </div>
                                            </button>
                                            </a>
                                            <a href="#" class="opcion" style="text-decoration:none; color: inherit;" formData="PuntoFi">
                                                <div class="contenidOption">
                                                    <img src="{{ asset('img/shopping-store.png') }}">
                                                    <div class="textos">
                                                        <h5 class="titulo">Punto Fisico</h5>
                                                        <p class="descripcion">Acercate a nuestros puntos fisicos y toma
                                                            tu pedido <i class="bi bi-geo-alt-fill"></i></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                                <form action="" id="FormDomicilios" class="row g-3 mb-4" style="display: none">
                                    <div class="col-12 text-center mb-2">
                                        <div class="col-6">
                                            <label for="address2" class="form-label">Departamento</label>
                                        <input type="text" class="intputs text-center" id="address2" readonly onselectstart="return false;"   placeholder="Cra">
                                    
                                        </div>
                                        
                                        <div class="col-6 text-center mb-2">
                                            <label for="address2" class="form-label mt-2 ">ciudad</label>
                                            <input type="text" class="intputs text-center" id="address2">
                                        </div>
                                        <div class="col-6 text-center mb-2">
                                            <label for="address2" class="form-label mt-2 ">Barrio</label>
                                            <input type="text" class="intputs text-center" id="address2">
                                        </div>
                                        <div class="col-6 text-center mb-2">
                                            <label for="address2" class="form-label mt-2 ">Dirección</label>
                                            <input type="text" class="intputs text-center" id="address2">
                                        </div>
                                        <div class="col-6 text-center mb-2">
                                            <label for="address2" class="form-label mt-2 ">Piso</label>
                                            <input type="text" class="intputs text-center" id="address2">
                                        </div>
                                    </div>
                                    
                                </form>

                                <form action="" id="puntoFisico"class="row mb-4" style="display: none">
                                    <div class="col-6 text-center mb-2">
                                        <label for="address2" class="form-label mt-2 ">Barrio</label>
                                        <input type="text" class="intputs text-center" id="address2">
                                    </div>
                                    <div class="col-6 text-center mb-2">
                                        <label for="address2" class="form-label mt-2 ">Dirección</label>
                                        <input type="text" class="intputs text-center" id="address2">
                                    </div>
                                    <div class="col-6 text-center mb-2">
                                        <label for="address2" class="form-label mt-2 ">Piso</label>
                                        <input type="text" class="intputs text-center" id="address2">
                                    </div>
                                </form>
                            </form>
                            
                    

                        
                        </div>
                        <div>

                            <script>
                                const url = "{{ env('API') . '/users/' . Auth::user()->id }}";
                            </script>
                            <script src="{{ asset('js/compra.js') }}"></script>

</section>