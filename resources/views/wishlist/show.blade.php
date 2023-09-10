<head>
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
</head>
@extends('layouts.contenedor')
@section('title', 'Lista de deseos')
@section('component')
    <div class="px-5">
        <div class="row justify-content-center">
            @if (count($wishlist) > 0)
                @foreach ($wishlist as $lista)
                    @php
                        $images = explode(':', $lista->productos->images);
                        $precioVenta = $lista->productos->price - ($lista->productos->price / 100) * $lista->productos->discount;
                    @endphp
                    <div class="col-12 mb-2">
                        <div class="card " data-url="{{ route('productos.show', $lista->productos->id) }}">
                            <div class="row" role="button">
                                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center p-2" style="height: 150px">
                                    <img src="{{ asset("img/productos/". $images[0]) }}"
                                        class="img-fluid rounded" alt="Imagen del Producto" width="130px">
                                </div>
                                <div class="col-md-10 col-12">
                                    <div class="card-body">
                                        <div>
                                            <div>
                                                <h5 class="card-title titulo">{{ $lista->productos->name }}</h5>
                                            </div>

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
                                                    <input type="submit" value="Eliminar"
                                                        class="btn-link btn quitar-espacio">
                                                </form>
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
                    <h1>Ningun producto en tu lista de deseos</h1>
                    <p>
                        <svg width="100" height="100" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            <text x="40%" y="45%" font-size="8" dominant-baseline="middle"
                                text-anchor="middle" fill="currentColor">?</text>
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
    @if (session('eliminado') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Eliminado de tus favoritos',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
@endsection
