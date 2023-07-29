@extends('layouts.contenedor')
@section('title','Home')
@section('component') 
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body style="background-color: #E9E9E9">

    
    <div class="container card col-md-6 fw-bolder " style="background-color: #F8F8F8 ">
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
                        <ul class="list-group ml-2">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    Nombre de Producto
                                    <small class="text-body-secondary">En esta parte va el producto y la
                                        descripción</small>
                                </div>
                            </li>
                            <li class="list-group-item  justify-content-between text-center">
                                <a href="" class="text-dark text-decoration-none ">
                                    <span>
                                        <i class="bi bi-cart4"></i>
                                        volver al carro
                                    </span>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Costo de envio</h6>

                                </div>
                                <span class="text-body-secondary">Gratis</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Entrega 1</h6>
                                    <small class="text-body-secondary">Llega el DD/MM/AAAA</small>
                                </div>
                                <span class="text-body-secondary">Gratis</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                                <div class="text-success">
                                    <h6 class="my-0">Total (USD)</h6>
                                </div>
                                <span class="text-success">−$20</span>
                            </li>
                        </ul>
                        <div class="text-center">
                            <form method="POST" action="https://secure.payzen.lat/vads-payment/">
                                <input type="submit" class=" w-100 btn btn-primary  btn-lg" name="pagar" value="Pagar" />
                            </form>

                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>
</html>