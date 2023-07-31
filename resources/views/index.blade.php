@extends('layouts.contenedor')
@section('title','Home')
@section('component')

<script></script>

<body>
<section onclick="toggleSidebar1()">
<div id="section"> 
        <div id="carrusel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carrusel" data-slide-to="0" class="active"></li>
              <li data-target="#carrusel" data-slide-to="1"></li>
              <li data-target="#carrusel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('img/imagen4.jpg') }}" alt="Slide 1">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/imagen2.jpg') }}" alt="Slide 2">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/imagen3.jpg') }}" alt="Slide 3">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>

    <div class="red-div">
        <h2>Categorias Destacadas</h2>
    </div>

    <div id="contenedorbotones">
        <div class="row d-flex flex-row justify-content-center flex-wrap">
            <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Estuche.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Estuches</h4>
            </div>


            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Cargador.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Cargadores</h4>
            </div>

            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Parlantes.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Parlantes</h4>
            </div>


            <div class="col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Audifonos.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Audífonos</h4>
            </div>
        </div>
    </div>

    <div class="red-div">
        <h2>Recien Agregados</h2>
    </div>
    <section class="product"> 
       
        <button class="pre-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>
        <button class="nxt-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>
        
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                    <img src="{{ asset('img/Producto-1.jpg') }}" class="product-thumb" alt="">
                    <button class="card-btn">Añadir al Carrito</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">Telefono 2023</p>
                     <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                   <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                    <img src="{{ asset('img/Producto-2.jpg') }}" class="product-thumb" alt="">
                    <button class="card-btn">Añadir al Carrito</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand ">brand</h2>
                    <p class="product-short-description">Telefono 2023</p>
                     <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                    <img src="{{ asset('img/Producto-3.jpg') }}" class="product-thumb" alt="">
                    <button class="card-btn">Añadir al Carrito</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">Telefono 2023</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                    <img src="{{ asset('img/Producto-4.jpg') }}" class="product-thumb" alt="">
                    <button class="card-btn">Añadir al Carrito</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">Telefono 2023</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                     <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                    <img src="{{ asset('img/Producto-4.jpg') }}" class="product-thumb" alt="">
                    <button class="card-btn">Añadir al Carrito</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">Telefono 2023</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                   <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                    <img src="{{ asset('img/Producto-4.jpg') }}" class="product-thumb" alt="">
                    <button class="card-btn">Añadir al Carrito</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">Telefono 2023</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>

        </div>
    </section>

    <div class="red-div">
        <h2>Productos En Descuento</h2>
        <section class="product"> 
       
       <button class="pre-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>
       <button class="nxt-btn"><img src="{{ asset('img/arrow.png') }}" alt=""></button>
       
       <div class="product-container">
           <div class="product-card">
               <div class="product-image">
                   <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                   <img src="{{ asset('img/Producto-1.jpg') }}" class="product-thumb" alt="">
                   <button class="card-btn">Añadir al Carrito</button>
               </div>
               <div class="product-info">
                   <h2 class="product-brand">Telefono</h2>
                   <p class="product-short-description">Telefono 2023</p>
                    <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
               </div>
           </div>
           <div class="product-card">
               <div class="product-image">
                  <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                   <img src="{{ asset('img/Producto-2.jpg') }}" class="product-thumb" alt="">
                   <button class="card-btn">Añadir al Carrito</button>
               </div>
               <div class="product-info">
                   <h2 class="product-brand ">Telefono</h2>
                   <p class="product-short-description">Telefono 2023</p>
                    <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
               </div>
           </div>
           <div class="product-card">
               <div class="product-image">
                   <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                   <img src="{{ asset('img/Producto-3.jpg') }}" class="product-thumb" alt="">
                   <button class="card-btn">Añadir al Carrito</button>
               </div>
               <div class="product-info">
                   <h2 class="product-brand">Telefono</h2>
                   <p class="product-short-description">Telefono 2023</p>
                   <span class="price">$1.200.000</span><span class="actual-price">$2.000.000</span>
               </div>
           </div>
           <div class="product-card">
               <div class="product-image">
                   <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                   <img src="{{ asset('img/Producto-4.jpg') }}" class="product-thumb" alt="">
                   <button class="card-btn">Añadir al Carrito</button>
               </div>
               <div class="product-info">
                   <h2 class="product-brand">Telefono</h2>
                   <p class="product-short-description">Telefono 2023</p>
                   <span class="price">$20</span><span class="actual-price">$40</span>
               </div>
           </div>
           <div class="product-card">
               <div class="product-image">
                    <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                   <img src="{{ asset('img/Producto-4.jpg') }}" class="product-thumb" alt="">
                   <button class="card-btn">Añadir al Carrito</button>
               </div>
               <div class="product-info">
                   <h2 class="product-brand">Telefono</h2>
                   <p class="product-short-description">Telefono 2023</p>
                   <span class="price">$20</span><span class="actual-price">$40</span>
               </div>
           </div>
           <div class="product-card">
               <div class="product-image">
                  <span class="discount-tag"><a href=""><i class='bx bxs-heart'></i></a></span>
                   <img src="{{ asset('img/Producto-4.jpg') }}" class="product-thumb" alt="">
                   <button class="card-btn">Añadir al Carrito</button>
               </div>
               <div class="product-info">
                   <h2 class="product-brand">brand</h2>
                   <p class="product-short-description">Telefono 2023</p>
                   <span class="price">$20</span><span class="actual-price">$40</span>
               </div>
           </div>

       </div>
   </section>

        
    </div>
    <div class="red-div">
        <h2>Informacion</h2>
    </div>
    <div id="contenedorbotones">
        <div class="row d-flex flex-row justify-content-center flex-wrap">
            <div class=" col-md-3 col-sm-6 col-12 text-center  ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Sobre-Nosotros.png') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Sobre nosotros</h4>
            </div>

            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Informacion.png') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Metodos de pago</h4>
            </div>

            <div class=" col-md-3 col-sm-6 col-12 text-center ">
                <a href="palinkear.html" class="btn btn-link btn-image">
                    <img class="bd-placeholder-img rounded-circle img-thumbnail border-dark sombra-botones" alt="..."
                        src="{{ asset('img/Contacto.jpg') }}" width="120" height="120" role="img">
                </a>
                <h4 class="fw-normal my-4">Contacto</h4>
            </div>
        </div>
    </div>
</section>
@include("components.PQRS.FAQS")
@include('layouts.footer')
@endsection
