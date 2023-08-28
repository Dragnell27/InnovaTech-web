@extends('layouts.contenedor')
@section('title','Pagar')
@section('component')

<head>

</head>

<section>
    <script
    src="https://www.paypal.com/sdk/js?client-id=AdXyZcBrnaPhQ2hUS17siCtJhGFNHDOF779CKIzNFK6m3amjOpjgjGr_otg1x47CfV72JY0gMIlzLWrp"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
    <div class="container card col-md-6 fw-bolder mb-4 " style="background-color: #F8F8F8 ">
        <div class=" text-center mt-4">
            <h3>Metodo de pago</h3>
        </div>
        <div class="container  mb-3 ">
            <main>
                <div class="row g-5">
                    <div class="rounded " style="background-color: #F8F8F8;">
                        <h4 class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-danger">Resumen de compra</span>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </h4>
                    </div>
                    <?php
                    $costo = 0;
                    $total = 0;
                    ?>
                    @if (Session::has('cart'))
                    <?php
                        $cart = Session::get("cart");
                        foreach ($cart as $key => $value) {

        ?>
                    <ul class="list-group ml-2 d-flex justify-content-center">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <?= $value->name ?> X <?= $value->quantity?>
                            </div>
                            @if($value->attributes['discount']>0)
                            <?php
                            $descuento = ($value->price * $value->attributes['discount'])/100;
                            ?>
                            @else
                            <?php
                            $descuento =0;
                            ?>
                            @endif
                           <?= ($value->price - $descuento)* $value->quantity?>
                        </li>
                        <?php
                    $costo = ($value->price-$descuento)*$value->quantity;
                    $total += $costo;
                    }?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Costo de envio</h6>

                            </div>
                            <span class="text-body-secondary">Gratis</span>
                        </li>
                        {{-- <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Entrega 1</h6>
                                <small class="text-body-secondary">Llega el DD/MM/AAAA</small>
                            </div>
                            <span class="text-body-secondary">Gratis</span>
                        </li> --}}
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="text-success">
                                <h6 class="my-0">Total (CO)</h6>
                            </div>
                            <span class="text-success"><?=$total?></span>
                        </li>
                    </ul>
                    <div id="paypal-button-container"></div>
                    <script>
                    var jsVariable = "<?php echo $total; ?>"
                    console.log(jsVariable);
                    </script>
                <script>
                    paypal.Buttons({
                        style:{
                            color: 'blue',
                            label: 'pay'
                        },
                        createOrder: function(data,actions){
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: jsVariable
                                    }
                                }]
                            });
                        },
                        onApprove: function(data, actions){
                            actions.order.capture().then(function(detalles){
                                console.log(detalles);
                                windows.location.href="";
                            });
                        },
                    }).render('#paypal-button-container');
                </script>
            </main>
        </div>
    </div>
@endif
    @extends('layouts.footer')

</section>
