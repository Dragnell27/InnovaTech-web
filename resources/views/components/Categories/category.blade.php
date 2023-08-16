@extends('layouts.contenedor')

@section('title', 'Categorias')
@section('component')
<head>
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
</head>
<section>
    <div class="product-list" id='product-list'>
        @foreach ($products as $product)
        <div class="product">

           
            <h2 id="style2">Nombre: {{ $product->name }}</h2>
            <p>{{ $product->discount}}</p>
            <p>Precio: ${{ $product->price }}</p>
        </div>
        @endforeach
    </div>
</section>

<script src="{{asset('js/categories.js') }}"></script>
@endsection