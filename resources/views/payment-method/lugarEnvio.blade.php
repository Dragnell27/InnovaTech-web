<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Innova_tech-Lugar de envio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <main>
            <div class="bg-danger bg-rosy mb-4 rounded">
                <div class="container mb-3 col-10  card h-75" style="background-color: #F8F8F8">
                    <div class="row justify-content-between ">
                        <div class="col-4">
                            <a href=""class="text-muted text-decoration-none"> <i class="bi bi-geo-alt-fill"></i></a>
    
                            <span>Dirección <strong>cra50 #56-03 </strong> </span>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('Edireccion') }}" target="blank" class="text-dark">
                                <i class="bi bi-pencil-square"></i>
                                <span>
                                    Cambiar
                                </span>
                            </a>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <div class="rounded" style="background-color: #F8F8F8;">
                        <h4 class="d-flex justify-content-between align-items-center mb-3" >
                            <span class="text-danger">Resumen de compra</span>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </h4>
                    </div>
                    
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Nombre de Producto</h6>
                                <small class="text-body-secondary">En esta parte va el producto y la
                                    descripción</small>
                            </div>
                        </li>
                        <li class="list-group-item  justify-content-between">
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
                    <form class="card p-2">
                        <div class="input-group">
                            <a name="" id="" class="w-100 btn btn-primary  btn-lg"
                                href="{{ route('Mpago') }}" role="button">Ir a pagar
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8  rounded "id="tipodeEntrega" style="background-color: #F8F8F8;">
                    <div class="container">
                        <div class="text-center mb-2 mt-2">
                            <h3><span class="text-danger">Lugar de envío</span></h3>
                        </div>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <a href=""class="text-dark text-decoration-none">
                                        <i class="bi bi-house-check-fill"></i>
                                        retirar hoy, fecha
                                    </a>
                                    <span>
                                        unico
                                    </span>
                                </div>
                                <span class="text-body-secondary">gratis</span>
                            </li>
                            <div class="col-6">

                                <a href="" class="text-dark mr-2">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>
                                        Cambiar
                                    </span>
                                </a>
                                &nbsp;&nbsp;
                                <a href="" class="text-dark">
                                    <i class="bi bi-person-add"></i>
                                    <span>
                                        ¿Registrar otra persona?
                                    </span>
                                </a>
                            </div>

                            <li class="list-group-item d-flex mt-4 justify-content-between lh-sm">
                                <div>
                                    <a href=""class="text-dark text-decoration-none">
                                        <i class="bi bi-truck"></i>
                                        LLega el lunes 31 Diciembre de 8 a 20h
                                    </a>
                                </div>
                                <span class="text-body-secondary">gratis</span>
                            </li>
                            <div class="col-6">

                                <a href="" class="text-dark mr-2">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>
                                        Cambiar fecha
                                    </span>
                                </a>
                            </div>

                            <li class="list-group-item d-flex mt-4 justify-content-between lh-sm">
                                <div>
                                    <a href=""class="text-dark text-decoration-none">
                                        <i class="bi bi-truck"></i>
                                        LLega entre el lunes 31 de Diciembre a martes 1 de enero
                                    </a>
                                </div>
                                <span class="text-body-secondary">gratis</span>
                            </li>
                            <div class="col-6">

                                <a href="" class="text-dark mr-2">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>
                                        Cambiar fecha
                                    </span>
                                </a>
                            </div>
                        </ul>

                    </div>
                </div>
            </div>

            <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>