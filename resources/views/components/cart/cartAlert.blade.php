{{--  //Alerta al agregar al carro  --}}
@if (session('msj_exitoso'))


    <head>
        <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
        <link rel="stylesheet" href="{{ asset('css/cart-alert.css') }}">
    </head>



    <?php

    $url ='https://innovatechcol.com.co/img/productos/';
    $imagenes = explode(":",session('msj_exitoso')["images"]);

    {{--  if Auth::check()? $item = Cart::session(Auth::user()->id)->get(session('msj_exitoso')["id"]): $item = Cart::get(session('msj_exitoso')["id"]);  --}}

    if (Auth::check()) {$item = Cart::session(Auth::user()->id)->get(session('msj_exitoso')["id"]);} else {$item = Cart::get(session('msj_exitoso')["id"]);}
    ?>

    <div id="modalCart">
        <div class="card border-dark mb-4" id="CartAlert"
        style="">
        <div class="row g-0">
            <div class="card-header text-center row" id="card-header">
                <h5 class="col">
                    <span class="text-center" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" id="svgCart">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                          </svg>
                    </span>
                    <span class="text-center">¡Se agregó a tu carro!</span>
                    
                </h5>
                <input type="button" id="btnClose" class="btn-close" aria-label="Close" style="">
            </div>
            <div class='col-sm-4 col-md-2' id="imgCart" >
                <img src="{{ asset('img/productos/'. $imagenes[0]) }}"  class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body" id="card-body">
                    <h5 class="card-title">Has agregado al carrito: {{ session('msj_exitoso')["name"] }}</h5>
                    <div class="row">
                        <span class="" style="display: flex">
                            <span class="">
                                 <button id="btnDecrement" class="changeQuantity" name="submitButton" value="-">-</button>

                            </span>
                            <span class="">
                                <input width="20px" type="text" id="qty" value="{{ $item->quantity }}">
                                <input type="hidden" name="id" id="hidden" value="{{ $item->id }}">

                            </span>
                            <span class="">
                                <button id="btnIncrement" class="changeQuantity" name="submitButton" value="+">+</button>
                            </span>



                        </span>
                    </div>

                </div>
                <p class="card-text" id="maxSize"><small class="text-body-secondary">Maximo 20 unidades</small></p>
                <div class="row">
{{--                      
                    <a style="cursor: pointer ;" id="btnSeguir"
                        class="icon-link icon-link-hover link-secondary link-underline-success link-underline-opacity-25 col">Seguir
                        comprando</a>  --}}

                    <form method="get" action="{{ Route('cart.show') }}" class="col">
                        <div class="cont">
                            <input type="submit" name="" id="btnGoCart" value="Ir al carro" class="btn btn-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    
@endif
