@extends('layouts.contenedor')
@section('title', 'Sobre nosotros')

<head>
    <link rel="stylesheet" href="{{ asset('css/aboutExample.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>
<section class="header-sec" id="home">
    <div class="overlay">
        <div class="container">
            <div class="row text-center">

                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

                    <h2 data-scroll-reveal="enter from the bottom after 0.1s">
                        <strong>
                           <span style="color: red">In</span>nova tech occidente
                        </strong>
                        <strong>
                            <p style="color: white">¿Quienes somos?</p>
                        </strong>
                    </h2>

                    <h4 style="color: white" data-scroll-reveal="enter from the bottom after 0.8s">
                        Somos una empresa dedicada a la venta de accesorios y servicio técnico para todo tipo de
                        teléfonos móviles y dispositivos tecnológicos, ofrecemos productos de la mejor calidad y las
                        mejores marcas para brindarle confianza en nuestra empresa.
                    </h4>

                    <br />




                </div>

            </div>
        </div>
    </div>

</section>
<!--HEADER SECTION END-->

<section class="features">
    <div class="container" id="features">
        <div class="row text-center align-items-center justify-content-center">

            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

                <h3 data-scroll-reveal="enter from the bottom after 0.1s">
                    <strong>
                        ¿Quieres saber mas de nosotros?
                    </strong>
                </h3>

            </div>

        </div>
        <div class="row align-items-center justify-content-center" >

            <div class="col-lg-5 col-md-5 col-sm-5 card" data-scroll-reveal="enter from the left after 0.6s">
                <div class="media">
                    <div class="pull-left">
                        <i class=" fa fa-history fa-5x "></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><strong> Nuestra Mision </strong></h4>
                        <p>
                            La plataforma de servicios online INNOVA-TECH, es la encargada de incrementar la productividad y comunicación en el sector de la tecnología.
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 card" data-scroll-reveal="enter from the right after 0.7s">
                <div class="media">
                    <div class="pull-left">
                        <i class=" fa fa-ra fa-5x "></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><strong> Nuestros productos </strong></h4>
                        <p>
                            Manejamos las mejores marcas del mercado, con unos precios tan competitivos que vas a querer llevar toda la tienda.
                        </p>

                    </div>
                </div>
            </div>




            <div class="col-lg-5 col-md-5 col-sm-5 card" data-scroll-reveal="enter from the bottom after 0.2s">
                <i class=" fa fa-database fa-5x "></i>
                <h4><strong> Donde estamos ubicados </strong></h4>
                <p>
                    Tenemos distintas sedes en las cuales nos puedes encontrar. Las cuales estan ubicadaas en Cali, Yumbo, Dosquebradas y Pasto 
                </p>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 card" data-scroll-reveal="enter from the bottom after 0.8s">
                <i class=" fa fa-send fa-5x "></i>
                <h4><strong> Nuestro equipo </strong></h4>
                <p>
                    Contamos además con el personal técnico calificado para la reparación de sus dispositivos y brindarte la mejor atención para cumplir con tus necesidades técnologicas.
                </p>
            </div>

        </div>
    </div>

</section>
@include('layouts.footer')