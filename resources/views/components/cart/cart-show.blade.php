<!doctype html>
<html lang="en">

<head>
    <title>Carrito</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div id="CarritoCompraTitulo">
            <h3> <i class="bi bi-cart4"></i>
                <span class="text-danger">Carrito de compras</span>
            </h3>

        </div>
        @if (Cart::getContent()->count() <= 0) <section> 
            <div id="carritovacio">
                <h1>Su carrito está vacio</h1>
               <img src="{{ asset('img/carro-vacio.png') }}" alt="">
            </div>
        @else 

        
        <div class="row g-5 ml-20">
            @php
               $datos = Cart::getContent(); 
               @endphp
            
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-danger">Resumen de compra</span>
                    <small>productos <span class="badge bg-danger rounded-pill">{{ $datos->quantity }}</span></small>

                </h4>
                <ul class="list-group mb-3">
                    @foreach (Cart::getContent() as $datos )
                    descuento=precio/100*descuento
                    precio-descuento
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $datos->name }}</h6>
                            <img src=" {{ $datos->image }}" alt="">
                            <small class="text-body-secondary">{{ $datos->desc}}</small>
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                        <div class="text-success">
                            <h6 class="my-0">Total (COP)</h6>
                        </div>
                        @if ($discount==0)
                        <span class="text-success">−${{ $datos->quantity * $datos->price }}</span>
                        @else
                        @php
                          $descuento=($datos->price * $datos->discount) /100  
                        @endphp
                        <span class="text-success">−${{ ($datos->price * $datos->quantity)-$descuento}}</span>
                        @endif
                    </li>
                </ul>
                <form class="card p-2">
                    <div class="input-group">
                        <a name="" id="" class=" w-100 btn btn-primary  btn-lg" href="{{ route('LuEnvio') }}"
                            role="button">Continuar compra
                        </a>
                    </div>
                </form>
            </div>

            <div class=" col-lg-6  rounded ">
                 @foreach (Cart::getContent() as $items) 
                <ul class="list-group mb-3 ">
                    <li class="list-group-item  justify-content-between lh-sm" style="margin-left: 10px;">
                        <table class="">
                            <tbody>
                                <form action="" method="post">
                                    <tr>
                                        <td>

                    <li class="d-flex">
                       <img src=" {{ $items->image }}" alt="">
                    </li>
                    <li class="d-flex mt-4">
                        <small>
                            <button> envio rapido</button>
                        </small>
                    </li>

                    </td>
                    <td>
                        <span>
                            <p>
                                {{ $items->desc }}
                            </p>
                        </span>
                    </td>
                    <td>
                        <li class=" d-flex ">

                            <span>
                                <p>
                                    @if ($discount==0)
                                    
                                    <strong>{{ $items->price }}</strong>
                                    @else
                                    
                                    <strong>{{ $items->price }}</strong>
                                    <strong>{{ $items->discount }}</strong>
                                        
                                    @endif
                                  
                                   
                                </p>
                            </span>

                        </li>
                        <li class="d-flex mt-3">
                            <button class="buttonsMM">
                                <spam>Lista de Deseos</spam>
                            </button>
                        </li>

                    </td>
                    <td class="mt-2">
                        <li class="d-flex mt-4">
                            <button class="buttonsMM">
                                <i class="bi bi-plus-circle-fill"></i>
                            </button>
                            &nbsp;&nbsp;
                            <span class="badge bg-danger rounded-pill">{{ $itmes->quantity }}</span>
                            &nbsp;&nbsp;
                            <button class="buttonsMM"><i class="bi bi-dash-circle-fill"></i></button>
                        </li>
                        <li class="d-flex mt-4">
                            <button class="buttonsMM">
                                <span>Eliminar</sp>
                            </button>
                        </li>
                    </td>
                    </tr>
                    </form>

                    </tbody>
                    </table>
                    </li>
                </ul>
                 @endforeach 

            </div>
        </div>

       
        @endif 
        
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>