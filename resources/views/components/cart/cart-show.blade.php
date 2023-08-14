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

        @if (Auth::check())
            <?php
                $CartItems = Cart::session(Auth::user()->id)->getContent();
                $CartCount = Cart::session(Auth::user()->id)->getContent()->count();
            ?>

        @else
        <?php
        $CartItems = Cart::getContent();
        $CartCount = Cart::getContent()->count() ;
    ?>
            
        @endif
        @if ($CartCount <= 0) <section>
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

                <div class=" col col-lg-6  rounded order-md-first ">
                    @foreach ($CartItems as $items)
                    <div class="card mb-3" style="max-width: 600px;" id="cartItem">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{ $items->attributes['image'] }}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{ $items->name }}</h5>
                              <div class="card-text"><p>{{  $items->attributes["desc"] }}</p>
                               <div>
                                @if ($items->attributes["discount"] > 0)

                                <?php
                                    $descuento=($items->price * $items->attributes["discount"]) /100
                                ?>
                                <div>
                                    <input 
                                    type="hidden"
                                    name="ProductPrice" 
                                    id="ProductPrice{{$items->id}}" 
                                    value="{{ $items->price -$descuento }}"/>

                                    $<span id="priceP{{$items->id}}">{{ $items->price - $descuento  }}

                                    </span>
                                     <span id="descuento{{ $items->id }}" class="text-success"> - {{ $items->attributes["discount"] }}%

                                     </span>
                                </div>
                                <div>
                                    <span>{{ $items->price  }}</span>
                                </div>
                                @else

                                <input 
                                type="hidden"
                                name="ProductPrice" 
                                id="ProductPrice{{$items->id}}" 
                                value="{{ $items->price }}"
                            />

                                <span>$<span id="priceP{{$items->id}}">{{ $items->price  }}</span> </span>
                                    
                                @endif
                               
                                <button 
                                    id="btnDecrement"
                                    class="qtyChanger"
                                    name="submitButton" 
                                    value="-:{{$items->id}}"> -
                                </button>
                                
                              
                                <input 
                                    width="20px" 
                                    type="text" 
                                    class="qtys"
                                    id="qty-{{$items->id}}" 
                                    value="{{ $items->quantity }}"
                                />  

                                    <input 
                                    type="hidden" 
                                    name="id" 
                                    id="hidden" 
                                    value="{{ $items->id}}">  

                                <button 
                                    id="btnIncrement" 
                                    class="qtyChanger" 
                                    name="submitButton" 
                                    value="+:{{$items->id}}"
                                >+
                                </button>
                               </div>
                              </div>
                              <p class="card-text"><small class="text-body-secondary"><a href="{{route('cart.destroy',$items->id)  }}">Eliminar</a></small></p>
                            </div>
                          </div>
                        </div>
                      </div>

                        @endforeach
                    </div>

                </div>

                <div class="col col-md-5 col-lg-4 order-md-last">
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
                            <span class="text-success" id="resultado">${{ $items->price }}</span>
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
                            <a name="" id="" class=" w-100 btn btn-primary  btn-lg" href="" 
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
   

    </script>
</section>

@endsection