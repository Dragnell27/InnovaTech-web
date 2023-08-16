<div class="col col-md-5 col-lg-4 col-12 order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-danger">Resumen de compra</span>

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
                <h6 class="my-0">Total (COP) {{ Cart::getSubTotal() }}</h6>
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
            <a name="" id="" class=" w-100 btn btn-primary  btn-lg" href="payment-method/1" 
                role="button">Continuar compra
            </a>
        </div>
    </form>
</div>