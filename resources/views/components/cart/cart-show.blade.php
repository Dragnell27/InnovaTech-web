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
      
<?php
$url ='https://innovatechcol.com.co/img/productos/';
?>
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
            <section id="productSection">
                <div class="row g-6 ml-20">

                    <div class="col-lg-12  rounded order-md-first ">
                        @foreach ($CartItems as $items)

                        @php

                        if($items->attributes["discount"]>0){
                            $saleCondition = new \Darryldecode\Cart\CartCondition(array(
                                'name' => 'Discount',
                                'type' => 'tax',
                                'value' => '-'.$items->attributes["discount"].'%',
                                'target'=>'total'
                            ));
                            Cart::addItemCondition($items->id, $saleCondition);
                        }
                    
                        
                        $imagenes = explode(":",$items->attributes["image"]);
                        
                            
                        @endphp
                        <div class="card mb-3" style="max-width: 600px;" id="cartItem">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img src="{{ $url . $imagenes[0]}}" class="img-fluid rounded-start" alt="...">
                              </div>
                              <div class="col-md-8 col-12">
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

              
           @include('components.cart.cart-resume')


            </section>
            

            @endif

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
   

    </script>
</section>

@endsection