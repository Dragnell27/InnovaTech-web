@extends('layouts.contenedor')
@section('title','Pagar')
@section('component')

<head>

</head>

<section>
    <script
    src="https://www.paypal.com/sdk/js?client-id=AdXyZcBrnaPhQ2hUS17siCtJhGFNHDOF779CKIzNFK6m3amjOpjgjGr_otg1x47CfV72JY0gMIlzLWrp">
  </script>
    <div class="container card col-md-8 fw-bolder mb-4 " style="background-color: #F8F8F8 ">
        <div class=" text-center mt-4">
            <h3>Metodo de pago</h3>
        </div>
        <div class="container  mb-3 d-flex justify-content-center">
            <main>
                <div class="row g-5">
                    <div class="rounded " style="background-color: #F8F8F8;">
                        <h4 class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-danger">Resumen de compra</span>
                            @if(Auth::check())
                            <?php
                                $conteo = Cart::session(Auth::user()->id)->getContent()->count();
                            ?>
                            @else
                            <?php
                            $conteo = Cart::getContent()->count();
                            ?>
                            @endif
                            <span class="badge bg-danger rounded-pill">{{ $conteo }}</span>
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
                    <br>
                    <script>
                     jsVariable = "<?php echo $total; ?>"
                     </script>

                     <form action="https://checkout.wompi.co/p/" method="GET">
                        @csrf
                        <!-- OBLIGATORIOS -->
                        <input type="hidden" name="public-key" value="pub_test_pkJWFCBCVgr3jnSgq4s4FjT1KGTn6xtN" />
                        <input type="hidden" name="currency" value="COP" />
                        <input type="hidden" name="amount-in-cents" id="pagar" value="****" />
                        <input type="hidden" name="reference" id="reference" value="*******" />
                        <input type="hidden" name="signature:integrity" id="firma" value="*****"/>
                        {{-- <input type="hidden" name="redirect-url" value="/resources/views/components/factura.blade.php" /> --}}

                        <button type="submit" class="boton-icono btn btn-primary">
                            <img src="{{ asset('img/wompi.png') }}" alt="Icono" class="wompi">Pagar con <b>Wompi</b></button>
                    </form>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/pay.js') }}"></script>
@endif
@extends('layouts.footer')

</section>
