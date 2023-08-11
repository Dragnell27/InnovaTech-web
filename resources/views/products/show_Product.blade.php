@extends('layouts.contenedor')
@section('title', 'Producto')
@section('component')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/comments.css') }}">


    </head>
    <section class="bg-light">
        @php
            $images = explode(':', $productos->images);
        @endphp
        <div class="container">
            <div class="row">

                <div class="col-lg-5 mt-5">
                    <div class="imgContainer ">
                        <img id="imgBox" src="{{ 'https://innovatechcol.com.co/img/productos/' . $images[0] }}"
                            alt="{{$productos->description}}">
                    </div>
                    <div class="small-product">
                        @foreach ($images as $img)
                            <img id="imageOne" src="{{ 'https://innovatechcol.com.co/img/productos/' . $img }}"
                                alt="Producto Imagen 2" onclick="myFunction(this)">
                        @endforeach
                    </div>

                </div>

                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h1  class="product-brand">{{$productos->name}}</h1>
                            </div>
                            <div class="text-right">
                            @if ($productos->discount==0)
                            <label class="mt-2 text-muted">＄{{ $productos->price }}</label>
                                @else
                                @php
                                $descuento=($productos->price * $productos->discount) /100;
                                $precioDescuento=$productos->price - $descuento
                                @endphp
                                <h4><strong><label>＄{{ $precioDescuento}}</label></strong>  <span class="my-badge-2 bg-danger ml-2">-{{ $productos->discount }}%</span><br>
                                <label class="mt-2 text-muted"style="text-decoration: line-through;">＄{{ $productos->price }}</label>
                                </h4>
                                @endif
                                <h5><strong>Descripcion:</strong>
                                    <p id=""> {{$productos->description}}</p>
                                </h5>
                            </div>
                                    <h5><strong>Color :</strong>


                                <strong class="text-muted">{{ $productos->param_color }}</strong>

                            </h5>

                        </div>
                            <div class="text-center">
                                <button data-id="{{ $productos->id }}" class="btnAddCart btn-cart" type="button" >Añadir al carrito</button>
                            </div>

                        <div class="text-center mt-3">
                            <a href="http://">agregar a lista de deseos</a>
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
                    <form action="{{ route('comentarios.store') }}" method="post">
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
            <br>
            <div class="container-fluid d-flex justify-content-center align-items-center" id="contenedortitulo">
                <div class="div ">
                    <button class="div btn btn-danger w-100" id="CargarBoton" onclick="BotonCargar">Ver Comentarios</button>
                </div>
            </div>
    </section>
    <script src="{{ asset('js/producto.js') }}"></script>
@endsection
