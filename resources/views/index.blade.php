@extends('layouts.contenedor')
@section('title','Home')
@section('component')
<section>
    <div id="section">
        <div id="carrusel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carrusel" data-slide-to="0" class="active"></li>
                <li data-target="#carrusel" data-slide-to="1"></li>
                <li data-target="#carrusel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/imagen4.jpg') }}" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/imagen2.jpg') }}" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/imagen3.jpg') }}" alt="Slide 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="red-div">
        <h2>Categorias</h2>
    </div>

    <div id="contenedorbotones">
        <div class="row d-flex flex-row justify-content-center flex-wrap">
            <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Estuche.jpg') }}" width="120" height="120" role="img">
                </a>

                <h4 class="fw-normal my-4">Estuches</h4>
            </div>


            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Cargador.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Cargadores</h4>
            </div>

            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Parlantes.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Parlantes</h4>
            </div>


            <div class="col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Audifonos.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Audífonos</h4>
            </div>
        </div>
    </div>

    <div class="red-div">
        <h2>Productos</h2>
    </div>

    <div class="album py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-1.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            @component("components.cart.SendToCart")


                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <input type="hidden" name="id" value="1">
                                {{--  <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>  --}}
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-2.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <input type="hidden" name="id" value="2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-3.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <div class="btn-group">
                                    <input type="hidden" name="id" value="3">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-4.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <div class="btn-group">
                                    <input type="hidden" name="id" value="4">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-1.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-2.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-3.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-4.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('img/Producto-1.jpg') }}" alt="Thumbnail [100%x225]">
                        <div class="card-body">
                            <h4 class="card-title">Samsung Galaxy S23 Ultra</h4>
                            <p class="card-text">Precio $ 6.999.920 COP</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Ver Producto</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Agregar Al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="red-div">
        <h2>Informacion</h2>
    </div>


    <div id="contenedorbotones">
        <div class="row d-flex flex-row justify-content-center flex-wrap">
            <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Sobre-Nosotros.png') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Sobre nosotros</h4>
            </div>

            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Medio-Pago.png') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Metodos de pago</h4>
            </div>

            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Contacto.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Contacto</h4>
            </div>
        </div>
    </div>
</section>
@include("components.PQRS.FAQS")
@include('layouts.footer')
@endsection
