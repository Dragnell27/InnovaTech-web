{{--  Alerta al agregar al carro  --}}
@if (session('msj_exitoso'))
    {{--  //id del producto que se compró  --}}
    <?php $item = Cart::get(session('msj_exitoso')->id); ?>

    <div class="card border-success mb-3" id="CartAlert"
        style="max-width: 600px; position: absolute; margin: 10%  0  0 30%;">
        <div class="row g-0">
            <div class="card-header text-center row">

                <h5 class="col">
                    <span class="text-center" style="width: 30px ">
                        <svg class="" style="width: 30px; height: 30px; margin-right: 5px" role="img"
                            aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                    </span>Producto agregado correctamente!!
                </h5>
                <input type="button" id="btnClose" class="btn-close" aria-label="Close">
            </div>
            <div class="col-md-4">

                <img src="" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Has agregado al carrito: {{ session('msj_exitoso')->name }}</h5>
                    {{--  <div class="card-text"> Precio: $<span id="priceP">{{ session('msj_exitoso')->price  *  $item->quantity}}</span>  --}}
                    <input type="hidden" name="ProductPrice" id="ProductPrice"
                        value="{{ session('msj_exitoso')->price }}">
                    <span>

                        <button id="btnDecrement" class="changeQuantity" name="submitButton" value="-">-</button>


                        <input width="20px" type="text" id="qty" value="{{ $item->quantity }}">
                        <input type="hidden" name="id" id="hidden" value="{{ $item->id }}">

                        <button id="btnIncrement" class="changeQuantity" name="submitButton" value="+">+</button>
                        {{--  <span id="maxquantity"></span>  --}}
                    </span>
                </div>

                <p class="card-text"><small class="text-body-secondary">Maximo 20 unidades</small></p>
                <div class="row">
                    <a href=""
                        class="icon-link icon-link-hover link-secondary link-underline-success link-underline-opacity-25 col">Seguir
                        comprando</a>
                    <form method="get" action="{{ Route('cart.show') }}" class="col">
                        <div class="">
                            <input type="submit" name="" id="" value="Ir al carro" class="btn btn-dark"
                                style="border-radius: 20px; ">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endif
