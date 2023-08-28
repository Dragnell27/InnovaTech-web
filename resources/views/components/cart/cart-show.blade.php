@extends('layouts.contenedor')

@section('title', 'Home')
@section('component')

    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">


    </head>
    <section>
        <header>
            <!-- place navbar here -->
        </header>
      @if (Session::has('msj'))

      <?php
      $user_id = Auth::user()->id;
      $itemsSession = json_decode(Session::get('msj'));

      Cart::session($user_id)->clear();
      foreach ($itemsSession as $key => $value) {




             Cart::session($user_id)->add(array(
                'id' => $value->product_id,   //inique row ID
                'name' => $value->name,
                'price' =>$value->price,
                'quantity' => $value->qty,
                'attributes' => array(
                    'discount'=> $value->discount,
                    'image'=>$value->images,
                    'desc'=>$value->description,

                ),
            ));
        }
        Session::forget('cart');
        Session::put("cart",Cart::session($user_id)->getContent());
        Session::forget('msj');

      ?>

      @endif
        <main style="margin-bottom: 200px">
            @if (Session::has('msj_destroy'))
            <?php


            $totalPrice =0;
            $cart = Session::get("cart");

             foreach ($cart as $key => $value) {
                if($value->attributes["discount"]>0){
                    $descuento   =  ($value->price * $value->attributes["discount"]) /100;
                    $totalPrice +=  ($value->price - $descuento) * $value->quantity ;
            }else{
                $totalPrice += $value->price * $value->quantity;
            }
        }
            ?>

            <script>

                window.addEventListener("load",()=>{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Se eliminó el producto',
                        showConfirmButton: false,
                        timer: 3000
                      })
                })

            </script>

            @endif

            <?php
            $url = 'https://innovatechcol.com.co/img/productos/';
            ?>
            @if (Auth::check())
                <?php

                $CartItems = Cart::session(Auth::user()->id)->getContent();
                $CartCount = Cart::session(Auth::user()->id)
                    ->getContent()
                    ->count();
                ?>
            @else
                <?php

                $CartItems = Cart::getContent();
                $CartCount = Cart::getContent()->count();

                ?>
            @endif
            @if ($CartCount <= 0)

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
                <section id="productSection" class="row">
                    <div class="col  row ">
                        <div class="col col-sm-12  rounded order-md-first ">

                            @foreach ($CartItems as $items)
                                @php
                                    $imagenes = explode(':', $items->attributes['image']);
                                @endphp
                                <div class="card mb-3" style="" id="cartItem">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset("img/productos/". $imagenes[0]) }}" class="img-fluid rounded-start"
                                                alt="...">
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $items->name }}</h5>
                                                <div class="card-text">
                                                    <p>{{ $items->attributes['desc'] }}</p>
                                                    <div>
                                                        @if ($items->attributes['discount'] > 0)
                                                            <?php
                                                            $descuento = ($items->price * $items->attributes['discount']) / 100;
                                                            ?>
                                                            <div>
                                                                <input type="hidden" name="ProductPrice"
                                                                    id="ProductPrice{{ $items->id }}"
                                                                    value="{{ $items->price - $descuento }}" />
                                                                <strong>
                                                                $<span id="priceP{{ $items->id }}"
                                                                    class="priceP price">{{ $items->price - $descuento }}

                                                                </span>
                                                            </strong>
                                                                <span id="descuento{{ $items->id }}"
                                                                    class="text-success"> -
                                                                    {{ $items->attributes['discount'] }}%

                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span style="text-decoration: line-through;">{{ $items->price }}</span>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="ProductPrice"
                                                                id="ProductPrice{{ $items->id }}"
                                                                value="{{ $items->price }}" />
                                                            <strong>
                                                                <span>$<span id="priceP{{ $items->id }}"
                                                                        class="priceP price">{{ $items->price }}</span>
                                                                </span>
                                                            </strong>
                                                        @endif

                                                        <button id="btnDecrement" class="qtyChanger" name="submitButton"
                                                            value="-:{{ $items->id }}"> -
                                                        </button>


                                                        <input width="20px" type="text" class="qtys"
                                                            id="qty-{{ $items->id }}" value="{{ $items->quantity }}" />

                                                        <input type="hidden" name="id" id="hidden"
                                                            value="{{ $items->id }}">

                                                        <button id="btnIncrement" class="qtyChanger" name="submitButton"
                                                            value="+:{{ $items->id }}">+
                                                        </button>
                                                    </div>
                                                </div>
                                                <p class="card-text"  style="padding: 10px; margin:10px; color:red !important; ">
                                                    <small class="text-body-secondary">
                                                        <a class="btnEliminarCart"
                                                            href="{{ route('cart.destroy', $items->id) }}">Eliminar</a>
                                                        </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>


                    @include('components.cart.cart-resume')


                </section>


            @endif

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->


 <script>

    window.onresize = () =>{


        try {
            var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            if (windowWidth <= 600) {
                var myDiv;
                myDiv = document.getElementById("resumenContainer");
                myDiv.classList.add("col-sm-12");
            } else {
                var myDiv;
                myDiv = document.getElementById("resumenContainer");
                myDiv.classList.remove("col-sm-12");
            }
          } catch (exceptionVar) {
            var error = exceptionVar;
          }




    };
</script>
    </section>
    @include('layouts.footer')

@endsection
