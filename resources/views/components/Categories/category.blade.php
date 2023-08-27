<head>
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
    <script>
        var baseURL = "{{ url('/') }}";
    </script>
</head>
@extends('layouts.contenedor')

@section('title', 'Categorias')
@section('component')

    <head>
        <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
    </head>
    <section>
        <div class="row justify-content-center product-list" id='product-list'>
            @if ($products->isEmpty())
            <div class=" text-center mt-5">
                <h1 class="">No hay productos en esta categoría.</h1>
                <p>
                    <svg width="100" height="100" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
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
                    <div class="product">
                        <button class="{{ $agregado_lista }} btn float-end" data-product_id="{{ $productos->id }}"
                            data-lista_id="{{ $lista_favortitos }}">
                            <svg width="16" height="16">
                                <path
                                    d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                            </svg>
                        </button>
                        <img id="imgCard" class="ir-producto" data-url="{{ route('productos.show', $productos->id) }}"
                            class="product-thumb" height="259px" width="259px"
                            src="{{ 'https://innovatechcol.com.co/img/productos/' . $images[0] }}">

                        {{-- <img id="imgCard" class="product-thumb" alt="" src="{{asset('products/'.$product[0])}}" alt="
            onclick="window.location.href='{{ route('productos') }}'""> --}}

                        @component('components.cart.SendToCart')
                            <h4 id="style2" class="titulo">{{ $productos->name }}</h4>
                            @if ($productos->discount == 0)
                                <span class="price" id="price">${{ $productos->price }}</span>
                            @else
                                <span class="precioReal">${{ $precioDescuento }}</span>
                                <br>
                                <span class="descuento-valor">{{ $productos->discount }}% OFF</span>
                                <span class="actual-price" style="font-size: 20px">${{ $productos->price }}</span>
                            @endif
                            <p>Precio: ${{ $productos->price }}</p>
                            <div class="text-center">

                                <button class="btn btn-danger btn-cart" data-id="{{ $productos->id }}">Añadir al
                                    Carrito</button>
                            </div>


                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <script>
            var token = '{{ csrf_token() }}';
        </script>
        <script src="{{ asset('js/wishlist.js') }}"></script>
        <script src="{{ asset('js/categories.js') }}"></script>
    @endsection
