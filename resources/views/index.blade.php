<head>
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
    <script>
        var baseURL = "{{ url('/') }}";
    </script>
</head>
@extends('layouts.contenedor')
@section('title', 'Home')
@section('component')
    <section>
        <div id="section">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
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
                    <span class="visually-hidden">Después</span>
                </button>
            </div>
            <br>
            <div class="red-div">
                <h2>Categorias Destacadas</h2>
            </div>

            <div id="contenedorbotones">
                <div class="row d-flex flex-row justify-content-center flex-wrap">
                    <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/accesories.png') }}" width="120" height="120"
                                role="img">
                        </a>

                        <h4 class="fw-normal my-4">Accesorios Computador</h4>
                    </div>


                    <div class=" col-md-3 col-sm-6 col-12 text-center ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/smartwatch.png') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">SmartWatch</h4>
                    </div>

                    <div class=" col-md-3 col-sm-6 col-12 text-center ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/airpods.png') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">Airpods</h4>
                    </div>


                    <div class="col-md-3 col-sm-6 col-12 text-center ">
                        <a href="palinkear.html" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/headphones.png') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">Auriculares</h4>
                    </div>
                </div>
            </div>

            <div class="red-div">
                <h2>Productos Destacados</h2>
            </div>

            @include('components.cart.cartAlert')
            <section class="product" id="carrusel-personalizado">

                <button class="pre-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>
                <button class="nxt-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>

                <div class="product-container">
                    @foreach ($products as $productos)
                        @php
                            $images = explode(':', $productos->images);
                            $coloresProducto = explode(':', $productos->param_color);

                            $colores = '';

                            $lista_favortitos = '';

                            $agregado_lista = 'no_agregado_favoritos';

                            if (Auth::check()) {
                                foreach ($favoritos as $favorito => $f) {
                                    if ($f->product_id == $productos->id) {
                                        $agregado_lista = 'agregado_favoritos';
                                        $lista_favortitos = $f->id;
                                        break;
                                    }
                                }
                            }

                            foreach ($coloresProducto as $coloresP => $cP) {
                                foreach ($colors as $key => $value) {
                                    if ($cP == $value->id) {
                                        $colores .= $value->name . ', ';
                                    }
                                }
                            }
                            $colores = substr($colores, 0, -2);
                        @endphp
                        <div class="product-card">
                            <div class="product-image">
                                <button class="{{ $agregado_lista }} btn float-end"
                                    data-product_id="{{ $productos->id . ':' . $lista_favortitos }}">
                                    <svg width="16" height="16">
                                        <path
                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                    </svg>
                                </button>
                                <img id="imgCard" class="ir-producto" data-url="{{ route('productos.show', $productos->id) }}"
                                    class="product-thumb" alt="300px" width="240px"
                                    src="{{ 'https://innovatechcol.com.co/img/productos/' . $images[0] }}">
                                {{-- <img id="imgCard" class="product-thumb" alt="" src="{{asset('productos/'.$images[0])}}" alt="
                                    onclick="window.location.href='{{ route('productos') }}'"> --}}
                                <button class="card-btn btn-cart" data-id="{{ $productos->id }}">Añadir al
                                    Carrito</button>
                            </div>
                            @component('components.cart.SendToCart')

                                <div class="product-info ir-producto"
                                    data-url="{{ route('productos.show', $productos->id) }}">
                                    <h4 class="product-brand" id="name">{{ $productos->name }}</h4>
                                    <p class="product-short-description" id="desc">{{ $productos->description }}</p>
                                    @php
                                        $descuento = ($productos->price * $productos->discount) / 100;
                                        $precioDescuento = $productos->price - $descuento;
                                    @endphp
                                    @if ($productos->discount == 0)
                                        <span class="price" id="price">${{ $productos->price }}</span>
                                    @else
                                        <span class="precioReal">${{ $precioDescuento }}</span>
                                        <br>
                                        <span class="descuento-valor">{{ $productos->discount }}% OFF</span>
                                        <span class="actual-price" style="font-size: 20px">${{ $productos->price }}</span>
                                    @endif
                                    <span class="color" id="color">{{ $colores }}</span>
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
        <script src="{{ asset('js/carrousel.js') }}"></script>


        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        @include('components.PQRS.FAQS')
        @include('layouts.footer')

        <script>
            $(document).ready(function() {
                $('.ir-producto').on('click', function() {
                    var url = $(this).attr('data-url');
                    window.location.href = url;
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.no_agregado_favoritos').on('click', function() {
                    var button = $(this);
                    var idProducto = button.data('product_id').split(':');
                    var productoId = idProducto[0];
                    $.ajax({
                        url: "{{ route('wishlist.store') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productoId
                        },
                        success: function(response) {
                            button.removeClass('no_agregado_favoritos');
                            button.addClass('agregado_favoritos');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error al agregar a la lista.');
                        }
                    });
                });

                $('.agregado_favoritos').on('click', function() {
                    var button = $(this);
                    var idProducto = button.data('product_id').split(':');
                    var productoId = idProducto[1];
                    $.ajax({
                        url: "{{ route('wishlist.destroy', ':product_id') }}".replace(':product_id',
                            productoId),
                        method: 'delete',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productoId
                        },
                        success: function(response) {
                            button.removeClass('agregado_favoritos');
                            button.addClass('no_agregado_favoritos');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                            alert('Error al eliminar de la lista.');
                        }
                    });
                });
            });
        </script>
    @endsection
