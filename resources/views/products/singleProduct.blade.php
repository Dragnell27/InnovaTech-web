@extends('layouts.contenedor')

@section('title','Producto')

<head>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">

</head>
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="imgContainer ">
                    <img id="imgBox" src="{{ asset('img/airpods1.jpg') }}" alt="Card image cap">

                </div>
                <div class="small-product">
                    <img class="" src="{{ asset('img/V-Producto-3.jpg') }}" alt="Producto Imagen 2"
                        onclick="myFunction(this)">
                    <img class=" " src="{{ asset('img/V-Producto-4.jpg') }}" alt="Producto Imagen 3"
                        onclick="myFunction(this)">
                    <img class=" " src="{{ asset('img/V-Producto-2.jpg') }}" alt="Producto Imagen 1"
                        onclick="myFunction(this)">
                    <img class=" " src="{{ asset('img/airpods1.jpg') }}" alt="Producto Imagen 1"
                        onclick="myFunction(this)">

                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h1>PRODUCTO</h1>

                        </div>
                        <div class="text-right">
                            <h1 class="my-badge bg-danger"id="price">$25.000</h1>

                        </div>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Categoria:</h6>
                            </li>
                            <li class="list-inline-item">
                                <h6 class="text-muted" id="categoria"><strong>Estuches</strong></h6>
                            </li>
                        </ul>

                        <h6>Descripcion:</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum
                            convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <h6 class="text-muted" id="color"><strong>Negro</strong></h6>
                            </li>
                        </ul>

                    
                        <div class="row pb-3">
                            <div class="col d-grid mb-2">
                                <button type="submit" class="w-100 btn btn-danger btn-lg" name="submit"
                                    value="addtocard">Añadir al carrito</button>
                            </div>
                            <div class="text-center">
                                <a href="http://">agregar a lista de deseos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- comentarios -->
            <div id="contenedorcomentarios" class="container-fluid">
                <div class="col-lg-12 mt-5">
                    <h3>Comentarios</h3>
                    <!-- Aquí se agregarán los comentarios -->
                    <div id="comentarios"></div>

                    <!-- Formulario de comentario -->
                    <form id="comment-form">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comentario:</label>
                            <textarea class="form-control" id="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-danger">Agregar comentario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-center align-items-center" id="contenedortitulo">
        <div class="div ">
            <button class="div btn-danger w-100 ">Ver Comentarios Del Producto</button>
        </div>
    </div>
    <script src="{{ asset("js/producto.js") }}">
    </script>

</section>