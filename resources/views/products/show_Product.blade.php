@extends('layouts.contenedor')
@section('title', 'Producto')
@section('component')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">


        <style>


        </style>
    </head>

    <?php
    $check = 'false';
    $id ="";
    if (Auth::check()) {
        $check = 'true';
        $id = Auth::user()->id;
    }

    ?>
    @include('components.cart.cartAlert')

    <section class="bg-light">
        @php
            $images = explode(':', $productos->images);

        @endphp
        <div class="container">
            <div class="row">

                <div class="col-lg-5 mt-5">
                    <div class="imgContainer">

                            <img id="imgBox" class="img-fluid" src="{{ asset('img/productos/' . $images[0]) }}"alt="{{ $productos->description }}">
                            @if ($productos->stock <= 0)
                            <div id="out-of-stock" class="text-center" >
                                PRODUCTO AGOTADO
                                       </div>

                            @endif

                    </div>
                    <div class="small-product">
                        @foreach ($images as $img)
                        <div>
                            <img class="imageOne" id="imageOne" src="{{ asset('img/productos/' . $img) }}"
                            alt="Producto Imagen 2" onclick="myFunction(this)" width="100px" height="100px">

                        </div>

                        @endforeach
                    </div>

                </div>

                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        @php
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
                        @endphp

                        <div class="card-body"style="cursor: default">
                            <div class="text-right">

                                <button class="{{ $agregado_lista }} btn float-end" data-product_id="{{ $productos->id }}"
                                    data-lista_id="{{ $lista_favortitos }}">
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
                            </div>
                            <div class="text-center mb-4">
                                <h1 class="product-brand ">{{ $productos->name }}</h1>
                            </div>

                            <div class="dflex row">
                                <div class="text-left col-6">
                                    <h4 style="font-size: 20px;font-weight: bold;">
                                        "¡No esperes más para tener lo que deseas!"
                                    </h4>
                                </div>
                                <div class="text-right col-6">

                                    @php
                                        $precioDescuento = $productos->price - ($productos->price / 100) * $productos->discount;
                                    @endphp
                                    @if ($productos->discount > 0)
                                        <div class="text-decoration-line-through text-danger descuento">
                                            $ {{ number_format($productos->price, 0, ',', '.') }}
                                        </div>
                                    @endif
                                    <div>
                                        <span class="h5">
                                            $ {{number_format( $precioDescuento, 0, ',', '.') }}
                                        </span>
                                        @if ($productos->discount > 0)
                                            <strong class="text-success">
                                                {{ $productos->discount }}% OFF
                                            </strong>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="text-left">
                                <h5><strong>Descripcion:</strong>
                                    <p id=""> {{ $productos->description }}</p>
                                </h5>
                                <h5><strong>Color :</strong>
                                    @php
                                        $coloresProducto = explode(':', $productos->param_color);
                                        $colores = '';

                                        foreach ($coloresProducto as $cP) {
                                            foreach ($colors as $color) {
                                                if ($cP == $color->id) {
                                                    $colores .= $color->name . ', ';
                                                }
                                            }
                                        }
                                        $colores = substr($colores, 0, -2);
                                    @endphp

                                    <strong class="text-muted">{{ $colores }}</strong>

                                </h5>
                            </div>
                        </div>
                        <div class="text-center mb-2">
                            @if ($productos->stock > 0)
                                <button data-id="{{ $productos->id }}" class="btnAddCart btn-cart">Añadir al carrito</button>
                                @else
                                 <p style="color: red"> Lo sentimos, este producto esta agotado</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>


            <!-- comentarios -->
            <div id="contenedorcomentarios" class="container-fluid">
                <h3 class="text-center">Comentar</h3>
                <div class="col-lg-12">
                    <div id="comentarios"></div>
                    <form action="{{ route('comentarios.store') }}" method="post" id="commentForm">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Comentario:</label>
                            <textarea class="form-control" required name="comment" rows="3"></textarea>
                            <div class="star_rating">
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                            </div>
                        </div>
                        <input type="hidden" id="product_id" name="product_id" value="{{ $productos->id }}">
                        <input type="hidden" id="num_star" name="starts" value="null">

                        @auth
                            <input
                            type="submit"
                            value="Agregar Comentario"
                            class="btn"
                            style="background: #e70000; color: #fff;">
                          @else
                          <p style="color: #e70000">Inicia sesion para dejar tu comentario. <br>
                             Te esperamos! &#128521;
                            </p>

                        @endauth

                    </form>

                </div>
            </div>
            <br>
            {{--  Section de ver comentarios  --}}
            <section class="container">
                <h3 id="commentTitle">Opiniones del producto</h3>
                <div class="row" id="commentSection">
                    <div id="commentSection2"></div>
                    <div id="comments-cont" class="col col-md-12"></div>
                </div>
            </section>

            <div class="container-fluid d-flex justify-content-center align-items-center" id="contenedortitulo">
                <div class="div">
                    <button class="btnAddCart w-100" id="CargarBoton">Ver mas</button>
                </div>
            </div>


    </section>
    <script>
        var BASE = "{{ url('/') }}";
        var token = '{{ csrf_token() }}';
        var userCheck = "{{ $check }}";
        var idUser = "{{ $id }}";
    </script>
    <script src="{{ asset('js/wishlist.js') }}"></script>
    <script src="{{ asset('js/producto.js') }}"></script>
    <script src="{{ asset('js/comments.js') }}"></script>
    @include('layouts.footer')
@endsection
