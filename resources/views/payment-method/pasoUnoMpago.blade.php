<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Innova_tech-Paso uno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-danger">Resumen de compra</span>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </h4>
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
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="text-success">
                                <h6 class="my-0">Total (USD)</h6>
                            </div>
                            <span class="text-success">−$20</span>
                        </li>
                    </ul>
                    <form class="card p-2">
                        <div class="input-group">
                            <a name="" id="" class=" btn btn-primary  btn-lg"
                                href="{{ route('LuEnvio') }}" role="button">Lugar de envio
                            </a>&nbsp;&nbsp;
                            <a name="" id="" class="btn btn-warning  btn-lg" href="#"
                            role="button">Descartar</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h2 class="form_titulo">
                        Tus datos </h2>
                        <strong><p class="form_parrafo">verificalos para ver las opciones de entrega y retiro
                    </p></strong>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="firstName"
                                    placeholder="Escriba su nombre" value="" required>
                                <div class="invalid-feedback">
                                    Por favor valide su nombre.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="lastName"
                                    placeholder="Escriba su apellido" value="" required>
                                <div class="invalid-feedback">
                                    Por favor valide su Apellido.
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Ejemplo @gmail.com">
                                <div class="invalid-feedback">
                                    Por favor Valide su correo electronico
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="address" class="form-label">Barrio</label>
                                <input type="text" class="form-control" id="address"
                                    placeholder="Ejemplo Salomia" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="address2" placeholder="Cra">
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">Tipo de residencia<span
                                        class="text-body-secondary">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2"
                                    placeholder="Condominio,Torre,Apartamento,etc..">
                            </div>
                            <div class="col-md-5">
                                <label for="country" class="form-label">Ciudad</label>
                                <select name="departamento" id="departamento" class="form-control border-dark">
                                    <option value="">Cali</option>
                                    <option>Bogota</option>
                                    <option>Medellin</option>
                                    <option>Cartagena</option>
                                    <option>Barranquilla</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="state" class="form-label">Departamento</label>
                                <select name="departamento" id="departamento" class="form-control border-dark">
                                    <option value="">Selecciona un departamento</option>
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Antioquia">Antioquia</option>
                                    <option value="Arauca">Arauca</option>
                                    <option value="Atlantico">Atlantico</option>
                                    <option value="Bogota">Bogota</option>
                                    <option value="Bolivar">Bolivar</option>
                                    <option value="Boyaca">Boyaca</option>
                                    <option value="Caldas">Caldas</option>
                                    <option value="Caqueta">Caqueta</option>
                                    <option value="casanare">casanare</option>
                                    <option value="Cauca">Cauca</option>
                                    <option value="Cesar">Cesar</option>
                                    <option value="Choco">Choco</option>
                                    <option value="Cordoba">Cordoba</option>
                                    <option value="Monteria">Monteria</option>
                                    <option value="Cundinamarca">Cundinamarca</option>
                                    <option value="Guainía">Guainía</option>
                                    <option value="Guaviare">Guaviare</option>
                                    <option value="Huila">Huila</option>
                                    <option value="La Guajira">La Guajira</option>
                                    <option value="Magdalena">Magdalena</option>
                                    <option value="Meta">Meta</option>
                                    <option value="Nariño">Nariño</option>
                                    <option value="Norte de Santander">Norte de Santander</option>
                                    <option value="Putumayo">Putumayo</option>
                                    <option value="Quindío">Quindío</option>
                                    <option value="Risaralda">Risaralda</option>
                                    <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                                    <option value="Santander">Santander</option>
                                    <option value="Sucre">Sucre</option>
                                    <option value="Tolima">Tolima</option>
                                    <option value="Valle del Cauca">Valle del Cauca</option>
                                    <option value="Vaupés">Vaupés</option>
                                    <option value="Vichada">Vichada</option>
                                    <option value="Montería">Montería</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label">Descripción<span
                                        class="text-body-secondary">(Optional)</span></label>
                                <input type="text" class="form-control" id="zip" placeholder="Descripción">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <div>
                            
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>