
<div class="col col-sm-4 col-10 order-md-last" id="resumenContainer">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-danger">Resumen de compra</span>
<?php
$totalPrice = 0;?>
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
@if (Session::has('cart'))
    <?php

        
        $cart = Session::get("cart");
      

        foreach ($cart as $key => $value) {
                if($value->attributes["discount"]>0){
                    $descuento   =  ($value->price * $value->attributes["discount"]) /100;
                    $totalPrice +=  ($value->price - $descuento) * $value->quantity ; 
                  
            }else{
                $totalPrice +=$value->price * $value->quantity;
            }
        }
        
    ?>
    
@endif

    </h4>
    <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div class="">
                <h4 class="my-0">Productos
                    <span class="badge bg-danger rounded-pill"> {{ $CartItems->count() }}</span>
                </h4>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div class="text-success">
                <h6 class="my-0">Total (COP)</h6>
            </div>
         
            <span class="text-success"
                >$ <span id="resultado">{{ $totalPrice }}</span></span>
        </li>
    </ul>
    <form class="card p-2">
        <div class="input-group">
            <a name="" id="" class=" w-100 btn btn-primary  btn-lg" href="payment-method/1" 
                role="button">Continuar compra
            </a>
        </div>
    </form>
</div>


