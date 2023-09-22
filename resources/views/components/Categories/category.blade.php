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
                                                <div class="description-container">
                                                    <p class="short-description">
                                                        {{ substr($productos->description, 0, 100) }}{{ strlen($productos->description) > 100 ? '...' : '' }}
                                                    </p>
                                                    <p class="full-description" style="display: none;">
                                                        {{ $productos->description }}</p>
                                                </div>
                                                <a href="#" class="read-more">Leer más</a>
                                            </div>
                                            <div class="product-right">
                                                <button class="{{ $agregado_lista }} btn float-end mt-3"
                                                    data-product_id="{{ $productos->id }}"
                                                    data-lista_id="{{ $lista_favortitos }}">
                                                    @if ($agregado_lista == 'agregado_favoritos')
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
                                                <div class="price-row">
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
                                                    <button class="btn mt-4 btn-danger btn-cart"
                                                    data-id="{{ $productos->id }}">Añadir
                                                    al Carrito</button>
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
        $(document).ready(function() {
            $(".read-more").click(function(e) {
                e.preventDefault();
                var container = $(this).closest(".product-center").find(".description-container");
                container.find(".short-description").toggle();
                container.find(".full-description").toggle();
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
