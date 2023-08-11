@extends('layouts.contenedor')
@section('title', 'Lista de deseos')
@section('component')

    <head>
        <link rel="stylesheet" href="{{ asset('css/deseos.css') }}">
    </head>

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($wishlist as $lista)
                <div class="col-10 mb-2">
                    <div class="card " data-url="{{ route('direcciones.edit', $lista->id) }}">
                        <div class="row" role="button">
                            <div class="col-md-3 col-12 d-flex justify-content-center align-items-center p-2">
                                <img src="{{ asset('img/Producto-2.jpg') }}" class="img-fluid rounded"
                                    alt="Imagen del Producto" width="150px">
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="card-body">
                                    <div>
                                        <div>
                                            <h5 class="card-title">{{ $lista->productos->name }}</h5>
                                        </div>
                                        @php
                                            $precioVenta = $lista->productos->price - ($lista->productos->price / 100) * $lista->productos->discount;
                                        @endphp
                                        @if ($lista->productos->discount > 0)
                                            <div class="text-decoration-line-through text-danger descuento">
                                                $ {{ $lista->productos->price }}

                                            </div>
                                        @endif
                                        <div>
                                            <span class="h5">
                                                $ {{ $precioVenta }}
                                            </span>
                                            @if ($lista->productos->discount > 0)
                                                <strong class="text-success">
                                                    {{ $lista->productos->discount }}% OFF
                                                </strong>
                                            @endif
                                            <form action="{{ route('wishlist.destroy', $lista->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Eliminar" class="btn-link btn quitar-espacio">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
