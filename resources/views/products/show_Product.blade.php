@extends('layouts.contenedor')

@section('title','Producto')
@section('component')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comments.css') }}">


</head>
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">

            <div class="col-lg-5 mt-5">
                <div class="imgContainer ">
                    <img id="imgBox" alt="Card image cap">

                </div>
                <div class="small-product">
                    <img id="imageOne" src="" alt="Producto Imagen 2" onclick="myFunction(this)">
                    <img id="imageTwo" src="" alt="Producto Imagen 3" onclick="myFunction(this)">
                    <img id="imageThree" src="" alt="Producto Imagen 1" onclick="myFunction(this)">
                    <img id="imagefour" src="" alt="Producto Imagen 1" onclick="myFunction(this)">

                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 id="name"> </h1>
                        </div>
                        <div class="text-right">
                            <h1 class="my-badge bg-danger" id="price"></h1>

                        </div>
                        <h6>Descripcion:</h6>
                        <p id="desc"></p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <h6 class="text-muted"><strong id="color"></strong></h6>
                            </li>
                        </ul>
                    </div>
                    <div class="row pb-3">
                        <div class="col d-grid mb-2">
                            <button type="submit" class="w-100 btn btn-danger btn-lg" name="submit" value="addtocard">Añadir al carrito</button>
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
            <h3 class="text-center">Comentarios</h3>
            <div class="col-lg-12">
                <!-- Aquí se agregarán los comentarios -->
                <div id="comentarios"></div>
                <!-- Formulario de comentario -->
                <form action="{{route('comentarios.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Comentario:</label>
                        <textarea class="form-control" name="comment" rows="3" required></textarea>
                        <div class="star_rating">
                            <button class="star">&#9734;</button>
                            <button class="star">&#9734;</button>
                            <button class="star">&#9734;</button>
                            <button class="star">&#9734;</button>
                            <button class="star">&#9734;</button>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-danger">Agregar comentario</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
      <div class="row" id="secciondecomentarios">
        <div class="col-md-8 offset-md-2">
          <div class="container-fluid" style="margin: 20px 0px;">
            <div class="red-div">
              <h2 style="color: white;">Comentarios De Los Usuarios</h2>
            </div>
          </div>
          <div class="container-fluid d-flex flex-row justify-content-center align-items-center">
            <div style="margin-bottom: 30px;">
              <button type="button" class="btn btn-danger text-white">Más Reciente</button>
              <button type="button" class="btn btn-danger text-white">Mayor Calificación</button>
              <button type="button" class="btn btn-danger text-white">Menor Calificación</button>
            </div>
          </div>
          <div class="comments" style="align-content: left">
            <div class="comment">
              <p class="fechacomentario">21/05/2023</p>
              <h4>Rodrigo Arango</h4>
              <p><i style= "color: yellow;">★★★★★</i></p>
              <p>¡Me encanta este producto! Es de alta calidad y vale cada centavo.</p>
            </div>
          </div>
        </div>
        </div>
<script src="{{ asset('js/producto.js')}}"></script>
<script src="{{ asset('js/comentarios.js')}}"></script>
</section>
@endsection
