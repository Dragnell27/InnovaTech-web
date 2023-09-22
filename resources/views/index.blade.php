@component('components.cart.SendToCart')

    <head>
        <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
        <script>
            var baseURL = "{{ url('/') }}";
        </script>
    </head>
    @extends('layouts.contenedor')
    @section('title', 'Home')
@section('component')
    @include('components.cart.cartAlert')
    <?php
    $checked = Auth::check() ? 'true' : 'false';
    $index = 0;
    ?>
    <section>
        <div id="section">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($carrusel as $carr)
                        <div class="imagen1 carousel-item @if ($index == 0) active @endif">
                            <img src="{{ asset('img/carrusel/' . $carr->image) }}" class="d-block w-80 imagen2"
                                alt="...">
                        </div>
                        @php
                            $index++;
                        @endphp
                    @endforeach
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
                        <a href="/api/category/2079" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/accesories.png') }}" width="120" height="120"
                                role="img">
                        </a>

                        <h4 class="fw-normal my-4">Accesorios Computador</h4>
                    </div>


                    <div class=" col-md-3 col-sm-6 col-12 text-center ">
                        <a href="/api/category/2081" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/smartwatch.png') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">SmartWatch</h4>
                    </div>

                    <div class=" col-md-3 col-sm-6 col-12 text-center ">
                        <a href="/api/category/2078" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/airpods.png') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">Airpods</h4>
                    </div>


                    <div class="col-md-3 col-sm-6 col-12 text-center ">
                        <a href="/api/category/2077" class="btn btn-link btn-image">
                            <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones"
                                alt="..." src="{{ asset('img/headphones.png') }}" width="120" height="120"
                                role="img">
                        </a>
                        <h4 class="fw-normal my-4">Auriculares</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="red-div">
                <h2>Recién agregados</h2>
            </div>

            <?php
                if(Session::has("success_mjs")){
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '{{ Session::get('success_mjs') }}',
                    confirmButtonText: "Ver mis compras",
                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/sales/shopping?' + "{{ Auth::user()->id }}";
                    }
                });
            </script>
            <?php
            } Session::forget('success_mjs') ?>


            <section class="product" id="carrusel-personalizado">

                <button class="pre-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>
                <button class="nxt-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>

                <div class="product-container ps-5">
                    @foreach ($products as $productos)
                        @php
                            $images = explode(':', $productos->images);
                            $coloresProducto = explode(':', $productos->param_color);

                            $colores = '';

                            $lista_favortitos = 0;

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
                            <div class="product-image d-flex align-items-center justify-content-center p-0">
                                <button class="{{ $agregado_lista }} btn float-end lista-deseos"
                                    data-product_id="{{ $productos->id }}" data-lista_id="{{ $lista_favortitos }}">
                                    @if ($agregado_lista == "agregado_favoritos")
                                    <svg width="16" height="16">
                                        <path
                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                    </svg>
                                    @else
                                    <svg width="16" height="16">
                                        <path
                                            d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                    </svg>
                                    @endif
                                </button>
                                <img id="imgCard" class="ir-producto img-fluid"
                                    data-url="{{ route('productos.show', $productos->id) }}" class="product-thumb"
                                    src="{{ asset('img/productos/' . $images[0]) }}">
                                <button class="card-btn btn-cart" data-id="{{ $productos->id }}">Añadir al
                                    Carrito</button>
                            </div>
                            <div class="product-info ir-producto" data-url="{{ route('productos.show', $productos->id) }}">
                                <h4 class="product-brand" id="name">{{ $productos->name }}</h4>
                                <p class="product-short-description" id="desc">{{ $productos->description }}</p>
                                @php
                                    $precioDescuento = $productos->price - ($productos->price / 100) * $productos->discount;
                                @endphp
                                @if ($productos->discount > 0)
                                    <div class="text-decoration-line-through text-danger descuento">
                                        $ {{ $productos->price }}
                                    </div>
                                @endif
                                <div>
                                    <span class="h5">
                                        $ {{ $precioDescuento }}
                                    </span>
                                    @if ($productos->discount > 0)
                                        <strong class="text-success">
                                            {{ $productos->discount }}% OFF
                                        </strong>
                                    @endif
                                </div>
                                <br>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </section>
    <br>
    <div class="red-div">
        <h2>Informacion</h2>
    </div>


    <div id="contenedorbotones">
        <div class="row d-flex flex-row justify-content-center flex-wrap">
            <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                <a href="/aboutUs" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Sobre-Nosotros.png') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Sobre nosotros</h4>
            </div>

            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="/contact" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Contacto.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Contacto</h4>
            </div>
            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="/help" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones tamaño"
                        alt="..." src="{{ asset('img/ayuda.png') }}" width="120" height="120"
                        role="img">
                </a>
                <h4 class="fw-normal my-4">Ayuda</h4>
            </div>
        </div>
    </div>
    </section>
    <script>
        var token = '{{ csrf_token() }}';
    </script>

    <script src="{{ asset('js/wishlist.js') }}"></script>
    <script src="{{ asset('js/cartas.js') }}"></script>
    <script src="{{ asset('js/producto.js') }}"></script>
    {{-- <script src="{{ asset('js/carrousel.js') }}"></script> --}}


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @include('components.PQRS.FAQS')
    @include('layouts.footer')

@endsection
