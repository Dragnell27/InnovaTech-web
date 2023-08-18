<head>
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
</head>
@extends('layouts.contenedor')
@section('title', 'Resultados de busqueda')
@section('component')
    <div class="container">
        <div class="row justify-content-center">
            @if (count($products) > 0)
                @foreach ($products as $productos)
                    @php
                        $images = explode(':', $productos->images);
                        $precioVenta = $productos->price - ($productos->price / 100) * $productos->discount;
                    @endphp
                    <div class="col-10 mb-2">
                        <div class="card " data-url="{{ route('productos.show', $productos->id) }}">
                            <div class="row" role="button">
                                <div class="col-md-3 col-12 d-flex justify-content-center align-items-center p-2">
                                    <img src="{{ 'https://innovatechcol.com.co/img/productos/' . $images[0] }}"
                                        class="img-fluid rounded" alt="Imagen del Producto" width="150px">
                                </div>
                                <div class="col-md-9 col-12">
                                    <div class="card-body">
                                        <div>
                                            <div>
                                                <h5 class="card-title titulo">{{ $productos->name }}</h5>
                                            </div>

                                            @if ($productos->discount > 0)
                                                <div class="text-decoration-line-through text-danger descuento">
                                                    $ {{ $productos->price }}

                                                </div>
                                            @endif
                                            <div>
                                                <span class="h5">
                                                    $ {{ $precioVenta }}
                                                </span>
                                                @if ($productos->discount > 0)
                                                    <strong class="text-success">
                                                        {{ $productos->discount }}% OFF
                                                    </strong>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center mt-5">
                    <h1>Ningun producto encontrado</h1>
                    <p>
                        <svg width="100" height="100" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            <text x="40%" y="45%" font-size="8" dominant-baseline="middle" text-anchor="middle" fill="currentColor">?</text>
                        </svg>
                    </p>
                </div>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.card').on('click', function() {
                var url = $(this).attr('data-url');
                window.location.href = url;
            });
        });
    </script>
@endsection
