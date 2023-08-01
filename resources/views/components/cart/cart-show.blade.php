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
            @php
               $datos = Cart::getContent();
         
               @endphp
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-danger">Resumen de compra</span>
                
                    <span class="badge bg-danger rounded-pill">{{ $datos->count() }}</span>

                </h4>
                <ul class="list-group mb-3">
                    @foreach ($datos as $items )
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $items->name }}</h6>

                            <div class="small-product">
                                <img src=" {{ $items->attributes["image"] }}" >

                            </div>
                            <small class="text-body-secondary">{{ $items->attributes["desc"]}}</small>
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                        <div class="text-success">
                            <h6 class="my-0">Total (COP)</h6>
                        </div>
                        @if ($items->attributes["discount"]==0)
                        <span class="text-success" id="resultado">−${{ $items->quantity * $items->price }}</span>
                        @else
                        @php
                          $descuento=($items->price * $items->attributes["discount"]) /100
                        @endphp
                        <span class="text-success" id="resultado">${{ ($items->price * $items->quantity)-$descuento}}</span>
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

            <div class=" col-lg-6  rounded ">
                 @foreach (Cart::getContent() as $items)
                <ul class="list-group mb-3 ">
                    <li class="list-group-item  justify-content-between lh-sm" style="margin-left: 10px;">
                        <table class="">
                            <tbody>
                              
                                    <tr>
                                        <td>

                    <li class="d-flex">
                        <div class="small-product">
                            <img src=" {{ $items->attributes["image"] }}" >

                        </div>
                    </li>
                    <li class="d-flex mt-4">
                        <small>
                            <button> envio rapido</button>
                        </small>
                    </li>

                    </td>
                    <td>
                        <span>
                            <p>
                                {{ $items->attributes["desc"] }}
                            </p>
                        </span>
                    </td>
                    <td>
                        <li class=" d-flex ">

                            <span>
                                <p>
                                    @if ($items->attributes["discount"])

                                    <strong id="precio">{{ $items->price }}</strong>
                                    @else

                                    <strong id="precio">{{ $items->price }}</strong>
                                    <strong id="precio">{{ $items->attributes["discount"] }}</strong>

                                    @endif


                                </p>
                            </span>

                        </li>
                        <li class="d-flex mt-3">
                            <button class="buttonsMM">
                                <spam>Lista de Deseos</spam>
                            </button>
                        </li>

                    </td>
                    <td class="mt-2">
                        <li class="d-flex mt-4">
                            <button class="buttonsMM" id="aumentar">
                                <i class="bi bi-plus-circle-fill"></i>
                            </button>

                            &nbsp;&nbsp;
                            <span class="badge bg-danger rounded-pill mr-2" id="cantidad">{{ $items->quantity }}</span>
                            &nbsp;&nbsp;
                            <button class="buttonsMM"id="disminuir"><i class="bi bi-dash-circle-fill"></i></button>
                        </li>
                        <li class="d-flex mt-4">
                            <button class="buttonsMM" >
                                <span>Eliminar</sp>
                            </button>
                        </li>
                    </td>
                    </tr>


                    </tbody>
                    </table>
                    </li>
                </ul>
                 @endforeach

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
