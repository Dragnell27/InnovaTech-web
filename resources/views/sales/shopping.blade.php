@extends('layouts.profileMenu')
@section('content')
<link rel="stylesheet" href="{{ asset('css/mis_compras.css') }}">
<div class="container mb-5">
<h1>Mis compras</h1>
  <div id="sales-container" class="row">
    <div class="col-md-12">
        <div class=" mb-4">
            <div class="row " id="content">
                <div class="container-sales">
                <div class="col-md-3">
                    <!-- Imagen del producto -->
                    <img src="{{ asset('img/Logo-Innova.jpeg') }}" alt="Producto" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <!-- Nombre del producto -->
                    <h3 class="mt-4">Nombre del producto</h3>
                    <!-- Estado del producto -->
                    <p class="mt-3">Estado:</p>
                    <!-- Fecha de compra -->
                    <p class="mt-2">Fecha de compra:</p>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <!-- Botón Buy again centrado -->
                  <a href="show_product "> <button class="btn btn-primary">Ver producto</button></a>
                </div>
            </div>
        </div>
        </div>
    </div>
    {{-- termia --}}

  </div>
</div>
@endsection




