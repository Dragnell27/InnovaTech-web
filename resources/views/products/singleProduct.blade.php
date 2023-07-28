@extends('layouts.contenedor')
@vite('resources/css/productos.css')
@section('title','Producto')

    <section class="bg-light" >
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{ asset('img/V-Producto-1.jpg') }}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <div  class="col-10 " >
                            <div class="row">
                                <div class="col-4">
                                    <a href="#">
                                        <img class="card-img img-fluid" src="{{ asset('img/V-Producto-2.jpg') }}" alt="Producto Imagen 1">
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="#">
                                        <img class="card-img img-fluid" src="{{ asset('img/V-Producto-3.jpg') }}" alt="Producto Imagen 2">
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="#">
                                        <img class="card-img img-fluid" src="{{ asset('img/V-Producto-4.jpg') }}" alt="Producto Imagen 3">
                                    </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 >PRODUCTO</h1>
                            <h2 class="py-2" id="precio">$25.000</h2>
                           
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6 >Categoria:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 class="text-muted" id="categoria"><strong>Estuches</strong></h6>
                                </li>
                            </ul>

                            <h6>Descripcion:</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                            
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Color :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 class="text-muted" id="color"><strong>Negro</strong></h6>
                                </li>
                            </ul>

                            <h6>Especificaciones:</h6>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta libero, commodi deserunt molestiae ipsum consequuntur reiciendis quisquam eius praesentium maiores facilis at unde vel nesciunt fuga magni! Ut, consectetur repellat!</p>
                            
                            <div class="cantidad col-auto">
                                <ul class="list-inline pb-3">
                                    <li class="list-inline-item text-right">
                                        Cantidad
                                        <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                    </li>
                                    <li class="list-inline-item"><span class="btn btn-danger" id="menos">-</span></li>
                                    <li class="list-inline-item"><span class="badge bg-secondary" id="cantidad">1</span></li>
                                    <li class="list-inline-item"><span class="btn btn-danger" id="mas">+</span></li>
                                </ul>
                            </div>
                            
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-danger btn-lg" name="submit" value="buy">Comprar</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-danger btn-lg" name="submit" value="addtocard">Añadir al carrito</button>
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
        <div class="red-div">
            <a href="">Ver Comentarios Del Producto</a>
        </div>
    </div>
    </section>



    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>

    <script src="assets/js/slick.min.js"></script>
    <script src="js/header.js" defer></script>



