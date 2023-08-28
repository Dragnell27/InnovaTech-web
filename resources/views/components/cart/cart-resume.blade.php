
<div class="col col-sm-4 col-10 order-md-last" id="resumenContainer">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-danger">Resumen de compra</span>
        <style>
            .boton-resume{
                background-color: #4CAF50;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                cursor: pointer;
                text-align: center;
                padding: 15px 32px;
                width: 100%;
                border-radius:10px;
              }
              
              .boton-resume:hover{
                color: black;
                background-color: #3e8e41;
              }
        </style>
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
    <form class="card p-2" id="btnContainer">
        <div class="input-group">

           @if (Request::is('payment-method/1'))
           @php
            $textButton="Ir a pagar";
            $urlButton="Metodo-pago";
           @endphp
           @else
           @php
            $textButton="Continuar compra";
            $urlButton="1";
           @endphp
           @endif
            <a name="" id="btnPago" class="boton-resume" href="{{ url('payment-method/' . $urlButton) }}"
                role="button">{{ $textButton }}
            </a>
        </div>
    </form>
</div>
<script>
    try {
        window.addEventListener("load",()=>{
            const btn = ()=>{
                const boton = document.querySelector("#btnPago").addEventListener("click",(e)=>{
               
                    if(example == "false" ){
                        e.preventDefault(); 
                    }
                });
            }
            btn();
          
    
            let direccionAdmin = document.getElementById('direciones');
            if(direccionAdmin != null){
                direccionAdmin.addEventListener('change', function(event){
                    example = "true";
                    const btn = document.getElementById("")
                    console.log(example);
                    btn();
                })

            }
         
        })
      } catch (exceptionVar) {
        
      }
    
   

</script>


