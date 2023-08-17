@extends('layouts.contenedor')

@section('title', 'Categorias')
@section('component')

<head>
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
</head>
<section>
    <div class="product-list" id='product-list'>
        @if ($products->isEmpty())
        <h1 class="text-center mt-5">No hay productos en esta categoría.</h1>
        @else
        @foreach ($products as $product)
        <div class="product">
            <img id="imgCard" class="ir-producto" data-url="{{ route('productos.show', $product->id) }}" class="product-thumb" height="259px" width="259px" src="{{ 'https://innovatechcol.com.co/img/productos/' . $product [0] }}">

            {{-- <img id="imgCard" class="product-thumb" alt="" src="{{asset('products/'.$product[0])}}" alt="
            onclick="window.location.href='{{ route('productos') }}'""> --}}


            <h4 id="style2">Nombre: {{ $product->name }}</h4>
            @php
            $descuento = ($product->price * $product->discount) / 100;
            $precioDescuento = $product->price - $descuento;
            @endphp
            @if ($product->discount == 0)
            <span class="price" id="price">${{ $product->price }}</span>
            @else
            <span class="precioReal">${{ $precioDescuento }}</span>
            <br>
            <span class="descuento-valor">{{ $product->discount }}% OFF</span>
            <span class="actual-price" style="font-size: 20px">${{ $product->price }}</span>
            @endif
            <p>Precio: ${{ $product->price }}</p>
            <button class="card-btn btn-cart " data-id="{{ $product->id }}">Añadir al
                Carrito</button>
            <button class="btn btn-danger " data-id="{{ $product->id }}">Ver Producto</button>

        </div>
        @endforeach
        @endif
    </div>
</section>

<script src="{{asset('js/categories.js') }}"></script>
@endsection