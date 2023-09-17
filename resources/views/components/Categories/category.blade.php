<head>
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
    <script>
        var baseURL = "{{ url('/') }}";
    </script>
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
</head>
@extends('layouts.contenedor')

@section('title', 'Categorias')
@section('component')

    <body>
        @include('components.cart.cartAlert')
        <div id="container">
            <div id="colum_1">
                @if ($name)
                    <h1>{{ $name->name }}</h1>
                    <h6 class="text-dark">Esta categoría contiene ({{ $products->count() }}) productos</h6>
                @endif
                <div id="categoriesContainer">

                </div>
            </div>
            <div id="colum_2">
                <section>

                    <div>
                        @if ($products->isEmpty())
                            <div class="justify-content-center text-center mt-5">
                                <h1 class="">No hay productos en esta categoría.</h1>
                                <p>
                                    <svg width="100" height="100" fill="currentColor" class="bi bi-search"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        <text x="40%" y="45%" font-size="8" dominant-baseline="middle"
                                            text-anchor="middle" fill="currentColor">?</text>
                                    </svg>
                                </p>
                            </div>
                        @else
                            @foreach ($products as $productos)
                                @php
                                    $images = explode(':', $productos->images);
                                    $descuento = ($productos->price * $productos->discount) / 100;
                                    $precioDescuento = $productos->price - $descuento;
                                    
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
                                <div class="product-list" id='product-list'>
                                    <div class="product">
                                        <div class="product-content">
                                            <div class="product-left">
                                                <img id="imgCard" class="ir-producto"
                                                    data-url="{{ route('productos.show', $productos->id) }}"
                                                    class="product-thumb" height="259px" width="259px"
                                                    src="{{ asset('img/productos/' . $images[0]) }}">
                                            </div>

                                            <div class="product-center">
                                                <h4 id="style2" class="titulo">{{ $productos->name }}</h4>
                                                <p class="short-description">{{ substr($productos->description, 0, 100) }}{{ strlen($productos->description) > 100 ? '...' : '' }}</p>
                                                <a href="#" class="read-more" data-product-id="{{ $productos->id }}">Leer más</a>
                                                <p class="full-description" id="full-description-{{ $productos->id }}">{{ $productos->description }}</p>
                                            </div>
                                            








                                            <div class="product-right">
                                                <button class="{{ $agregado_lista }} btn float-end mt-3"
                                                    data-product_id="{{ $productos->id }}"
                                                    data-lista_id="{{ $lista_favortitos }}">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                                    </svg>
                                                </button>
                                                <div class="price-row">
                                                    @if ($productos->discount == 0)
                                                        <span class="price" id="price">Precio:
                                                            ${{ $productos->price }}</span>
                                                    @else
                                                        <span class="precioReal">${{ $precioDescuento }}</span>
                                                        <span class="descuento-valor">{{ $productos->discount }}%
                                                            OFF</span>
                                                        <span class="actual-price"
                                                            style="font-size: 20px">${{ $productos->price }}</span>
                                                    @endif
                                                    <button class="btn btn-danger btn-cart"
                                                        data-id="{{ $productos->id }}">Añadir
                                                        al Carrito</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </section>
            </div>
        </div>
        <div class="footer">
            @include('layouts.footer')
        </div>
    </body>

    <script>
        var token = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/wishlist.js') }}"></script>
    <script>
        < script src = "https://code.jquery.com/jquery-3.6.0.min.js" >
    </script>
    <script>
        $(document).ready(function () {
        $(".read-more").click(function (e) {
            e.preventDefault();
            var productId = $(this).data("product-id");
            $("#full-description-" + productId).slideToggle();
        });
    });
    </script>

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoriesContainer = document.getElementById(
            'categoriesContainer'); // Obtén el elemento contenedor por su ID

            fetch('/api/category') // Cambia la URL de la API según tu configuración
                .then(response => response.json())
                .then(categories => {
                    categories.data.forEach(category => {
                        const link = document.createElement('a');
                        link.classList.add('nav-link');
                        link.href = `category/${category.id}`;
                        link.textContent = category.name;

                        link.addEventListener('click', function(event) {
                            event.preventDefault();
                            const categoryId = category.id;

                            // Redirige al usuario a la URL de la vista de productos de la categoría
                            window.location.href = `/api/category/${categoryId}`;
                        });

                        categoriesContainer.appendChild(link); // Agrega el enlace al contenedor deseado
                    });
                });
        });
    </script>
@endsection
