@extends('layouts.contenedor')
@section('title','Home')
@section('component')

<head>
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>
<section>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        @if (Cart::getContent()->count() <= 0) <section>
            <div id="carritovacio">
                <h1>Su carrito está vacio</h1>
                <img src="{{ asset('img/carro-vacio.png') }}" alt="">
            </div>
            @else
            <div id="CarritoCompraTitulo">
                <h3> <i class="bi bi-cart4"></i>
                    <span class="text-danger">Carrito de compras</span>
                </h3>

            </div>
            <div class="row g-5 ml-20">

                <div class=" col-lg-6  rounded order-md-first ">
                    @foreach (Cart::getContent() as $items)
                    <div class="container w-100 mb-2">
                        <div class="card w-100">
                            <div class="card w-100">
                                <ul class="list-inline  mt-2 mb-2 w-100">

                                    <li class="list-inline-item "style="margin-right: 15px"> <img
                                            src=" {{ $items->attributes["image"] }}" ">
                                    </li>

                                    <li class="list-inline-item col-4" >
                                        <h4>
                                            {{ $items->name }}
                                        </h4>

                                        <p>
                                            {{ $items->attributes["desc"] }}
                                        </p>
                                    </li>

                                    @if ($items->attributes["discount"]==0)
                                    <li class="list-inline-item mr-4" style="text-align: right" ><strong id="precio">
                                            {{ $items->price }}
                                        </strong>
                                    </li>
                                    @else
                                    @php
                                    $descuento=($items->price * $items->attributes["discount"]) /100
                                    @endphp
                                    <li class="list-inline-item">
                                        <strong id="precio">
                                            {{ $items->price }}
                                        </strong>
                                        <span class=""
                                            id="precio">${{ ($items->price * $items->quantity)-$descuento}}</span>
                                    </li>
                                    @endif

                                    <li class="list-inline-item ">
                                        <button class="buttonsMM" id="aumentar">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </button>
                                        <span class="badge bg-danger rounded-pill" id="cantidad">1</span>

                                        <button class="buttonsMM ml-4" id="disminuir"><i
                                                class="bi bi-dash-circle-fill"></i></button>
                                                <li style="margin-left: 70%">
                                                    <a href="" class="ml-2">eliminar</a>
                                                    <a href="" class="ml-2">Lista de deseos</a>
                                                </li>
                                            </li>
                                   
                                    <a name id class=" w-40 btn btn-primary ml-4" style="margin-top: -16px" href="{{ route('LuEnvio') }}"
                                        role="button">Continuar compra
                                    </a>
                                </ul>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>

                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-danger">Resumen de compra</span>

                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="">
                                <h4 class="my-0">Productos
                                    <span class="badge bg-danger rounded-pill"> {{ $items->count() }}</span>
                                </h4>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="text-success">
                                <h6 class="my-0">Total (COP)</h6>
                            </div>
                            @if ($items->attributes["discount"]==0)
                            <span class="text-success" id="resultado">${{ $items->quantity * $items->price }}</span>
                            @else
                            @php
                            $descuento=($items->price * $items->attributes["discount"]) /100
                            @endphp
                            <span class="text-success"
                                id="resultado">${{ ($items->price * $items->quantity)-$descuento}}</span>
                            @endif
                        </li>
                    </ul>
                    <form class="card p-2">
                        <div class="input-group">
                            <a name="" id="" class=" w-100 btn btn-primary  btn-lg" href="{{ route('LuEnvio') }}"
                                role="button">Continuar compra
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            @endif

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="{{asset("js/carrito.js") }}">

    </script>
</section>

@endsection