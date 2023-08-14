@extends('layouts.contenedor')
@section('title', 'Producto')
@section('component')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/productos.css') }}">


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
                        <div class="card-body"style="cursor: default">
                            <div class="text-center mb-4">
                                <h1  class="product-brand " >{{$productos->name}}</h1>
                            </div>
                            <div class="dflex row">
                            <div class="text-left col-6">
                                <h4 style="font-size: 20px;font-weight: bold;">
                                    "¡No esperes más para tener lo que deseas!"
                                </h4>
                            </div>
                            <div class="text-right col-6">
                                @if ($productos->discount==0)
                            <label class="mt-2 text-muted">＄{{ $productos->price }}</label>
                                @else
                                @php
                                $descuento=($productos->price * $productos->discount) /100;
                                $precioDescuento=$productos->price - $descuento
                                @endphp
                                <h4><strong><label>＄{{ $precioDescuento}}</label></strong>  <span class="elevating-span ml-2">-{{ $productos->discount }}%</span>
                                </h4>
                                <h5>
                                <label class="text-muted"style="text-decoration: line-through;">＄{{ $productos->price }}</label>

                                </h5>
                                @endif
                            </div>

                            </div>
                            <div class="text-left">
                                <h5><strong>Descripcion:</strong>
                                    <p id=""> {{$productos->description}}</p>
                                </h5>
                                <h5><strong>Color :</strong>
                                    <strong class="text-muted">{{ $productos->param_color }}</strong>

                                </h5>
                            </div>
                        </div>
                            <div class="text-center">
                                <button data-id="{{ $productos->id }}" class="btnAddCart btn-cart" >Añadir al carrito</button>
                            </div>

                        <div class="text-center mt-3">
                            <a href="http://">Agregar a lista de deseos</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- comentarios -->
            <div id="contenedorcomentarios" class="container-fluid">
                <h3 class="text-center">Comentarios</h3>
                <div class="col-lg-12">
                    <div id="comentarios"></div>
                    <form action="{{ route('comentarios.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Comentario:</label>
                            <textarea class="form-control" name="comment" rows="3" ></textarea>
                            <div class="star_rating">
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                                <i class="star">&#9734;</i>
                            </div>
                        </div>

                        <input type="hidden" id="product_id" name="product_id" value="{{ $productos->id }}">
                        <input type="submit" value="Agregar Comentario" class="btn btn-primary btn-danger">
                    </form>
                </div>
            </div>
            <br>

        <div class="container-fluid d-flex justify-content-center align-items-center" id="contenedortitulo">
        <div class="div">
            <button class="div btn btn-danger w-100" id="CargarBoton">Ver Comentarios</button>
        </div>
    </div>

    <div id="comentarios-container" class="comments-container">
        <div class="row" id="secciondecomentarios">
            <div class="col-md-8">
                <div class="comments">
                    <div class="comment">

                        <h4 id="user_id"></h4>
                        <p><i style="color: yellow;" id="starts"></i></p>
                        <p id="comments"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script>
        var BASE = "{{ url("/") }}";
    </script>
    <script src="{{ asset('js/producto.js') }}"></script>
    <script src="{{ asset('js/comments.js') }}"></script>
    <script src="{{ asset('js/comments_product.js') }}"></script>
@endsection
