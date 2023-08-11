@extends('layouts.contenedor')
@section('title', 'Home')
@section('component')
    <section>
        <div id="section">
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="{{ asset('img/imagen4.jpg') }}" class="d-block w-90" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/imagen2.jpg') }}" class="d-block w-90" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/imagen3.jpg') }}" class="d-block w-90" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Antes</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Despues</span>
                </button>
            </div>
            <br>
            <div class="red-div">
                <h2>Categorias</h2>
            </div>

            <div id="contenedorbotones">
                <div class="row d-flex flex-row justify-content-center flex-wrap">
                    <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/Estuche.jpg') }}" width="120" height="120"
                                role="img">
                        </a>

                        <h4 class="fw-normal my-4">Estuches</h4>
                    </div>


                    <div class=" col-md-3 col-sm-6 col-12 text-center ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/Cargador.jpg') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">Cargadores</h4>
                    </div>

                    <div class=" col-md-3 col-sm-6 col-12 text-center ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/Parlantes.jpg') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">Parlantes</h4>
                    </div>


                    <div class="col-md-3 col-sm-6 col-12 text-center ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/Audifonos.jpg') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">Audífonos</h4>
                    </div>
                </div>
            </div>

            @include('components.cart.cartAlert')
            <section class="product" id="carrusel-personalizado">

                <button class="pre-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>
                <button class="nxt-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>

                <div class="product-container">
                    @foreach ($product as $productos)
                    @php
                        $images = explode(":", $productos->images);
                        $coloresProducto = explode(":", $productos->param_color);

                        $colores = "";

                        foreach ($coloresProducto as $coloresP => $cP) {
                            foreach ($colors as $key => $value) {
                                if ($cP == $value->id ) {
                                    $colores .= $value->name . ", ";
                                }
                            }
                        }
                        $colores = substr($colores, 0, -2);
                    @endphp
                        <div class="product-card" data-url="{{ route('productos.show', $productos->id)}}" role="button">
                            <div class="product-image">
                                <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                                <img id="imgCard" class="product-thumb" alt="300px" src="{{'https://innovatechcol.com.co/img/productos/'.$images[0]}}">
                                {{-- <img id="imgCard" class="product-thumb" alt="" src="{{asset('productos/'.$images[0])}}" alt="
                                    onclick="window.location.href='{{ route('productos') }}'"> --}}
                                <button class="card-btn btn-cart" data-id="{{$productos->id}}">Añadir al
                                    Carrito</button>
                            </div>
                            @component('components.cart.SendToCart')

                                <div class="product-info">
                                    <h4 class="product-brand" id="name">{{$productos->name}}</h4>
                                    <p class="product-short-description" id="desc">{{$productos->description}}</p>
                                    <span class="price" id="price">{{$productos->price}}</span>
                                    <br>
                                    <span class="color-descuento" id="color">{{$colores}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <div class="red-div">
                    <h2>Informacion</h2>
                </div>


                <div id="contenedorbotones">
                    <div class="row d-flex flex-row justify-content-center flex-wrap">
                        <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                            <a href="{{ asset('about') }}" class="btn btn-link btn-image">
                                <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                    alt="..." src="{{ asset('img/Sobre-Nosotros.png') }}" width="120"
                                    height="120" role="img">
                            </a>
                            <h4 class="fw-normal my-4">Sobre nosotros</h4>
                        </div>

                        <div class=" col-md-3 col-sm-6 col-12 text-center ">
                            <a href="/contact" class="btn btn-link btn-image">
                                <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                    alt="..." src="{{ asset('img/Contacto.jpg') }}" width="120" height="120"
                                    role="img">
                            </a>
                            <h4 class="fw-normal my-4">Contacto</h4>
                        </div>
                    </div>
                </div>
        </section>
        <script src="{{ asset('js/cartas.js') }}"></script>
        <script src="{{ asset('js/producto.js') }}"></script>

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        @include('components.PQRS.FAQS')
        @include('layouts.footer')

        <script>
            $(document).ready(function() {
                $('.product-card').on('click', function() {
                    var url = $(this).attr('data-url');
                    window.location.href = url;
                });
            });
        </script>
    @endsection
