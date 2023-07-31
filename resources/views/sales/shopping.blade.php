@extends('layouts.profileMenu')
@section('content')
<link rel="stylesheet" href="{{ asset('css/mis_compras.css') }}">
@foreach ($resultado as $result )
 <div class="container mb-5">
 <h1>Mis compras</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="row">
          <div class="col-md-3">
            <!-- Imagen del producto -->
            <img src="{{ asset('img/Logo-Innova.jpeg') }}" alt="Producto" class="img-fluid">
          </div>
          <div class="col-md-6">
            <!-- Nombre del producto -->
            <h3 class="mt-4">Nombre del producto</h3>
            <!-- Estado del producto -->
            <p class="mt-3">Estado del producto: {{ $result->param_status }}</p>
            <!-- Delivery date -->
            <p class="mt-2">Delivery date:</p>
          </div>
          <div class="col-md-3 d-flex align-items-center justify-content-center">
            <!-- Botón Buy again centrado -->
            <button class="btn btn-primary">Buy again</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection




