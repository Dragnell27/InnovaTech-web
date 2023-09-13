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
                           <span id="spanIn" style="">In</span>nova tech occidente
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

                <h3 style="color: red" data-scroll-reveal="enter from the bottom after 0.1s">
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
                        
                        <h4 class="media-heading">
                            <span >  
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#e62e1b" class="bi bi-clipboard2-check media-icon" viewBox="0 0 16 16" >
                                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
                                  </svg>
                            </span>
                            <strong> Nuestra Mision </strong>
                        </h4>
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
                        <h4 class="media-heading">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  fill="#e62e1b" class="bi bi-bag-check media-icon" viewBox="0 0 16 16" >
                                <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                              </svg>
                            </span>
                            
                            <strong> Nuestros productos </strong>
                        </h4>
                        <p>
                            Manejamos las mejores marcas del mercado, con unos precios tan competitivos que vas a querer llevar toda la tienda.
                        </p>

                    </div>
                </div>
            </div>




            <div class="col-lg-5 col-md-5 col-sm-5 card" data-scroll-reveal="enter from the bottom after 0.2s">
                <i class=" fa fa-database fa-5x "></i>
                <h4 class="media-heading">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#e62e1b" class="bi bi-geo-alt media-icon" viewBox="0 0 16 16" >
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                          </svg>
                    </span>
                    <strong> Donde estamos ubicados </strong>
                </h4>
                <p>
                    Tenemos distintas sedes en las cuales nos puedes encontrar. Las cuales estan ubicadaas en Cali, Yumbo, Dosquebradas y Pasto 
                </p>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 card" data-scroll-reveal="enter from the bottom after 0.8s">
                <i class=" fa fa-send fa-5x "></i>
                <h4 class="media-heading">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#e62e1b" class="bi bi-people media-icon" viewBox="0 0 16 16" >
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                          </svg>
                    </span>
                    <strong> Nuestro equipo </strong>
                </h4>
                <p>
                    Contamos además con el personal técnico calificado para la reparación de sus dispositivos y brindarte la mejor atención para cumplir con tus necesidades técnologicas.
                </p>
            </div>

        </div>
    </div>

</section>
