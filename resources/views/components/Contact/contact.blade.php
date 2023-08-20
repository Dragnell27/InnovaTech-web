@extends('layouts.contenedor')
@section('title','Contácto')
@section('component')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
<?php
$check = "false";
if(Auth::check()){ 
    $check = "true";
}


?>
<div id="item-container">
    <div id="contact-title">
        <h1>Contáctanos</h1>
    </div>
</div>
<div class="container">
    <div id="form-container">
        <div id="send-form">
            <h2 class="title-contact">Escríbenos!!</h2>
            @if (Auth::check())
            <form  method="post" action="{{ route('faqs.store',Auth::user()->id )  }}"    id="formulario" style="padding: 0; margin: 0">
              <input type="hidden" name="client_id" value="{{Auth::user()->id  }}">
            @else
          <form action="" id="formulario" style="padding: 0; margin: 0">
                
            @endif
            
                <div class="mb-3">
                    <input type="text" name="name" id="name" placeholder="Nombre *" class="form-control ixf" required>
                    <div class="input-group mb-3">
                        <span class="input-group-text spans" style="margin: 3px 0">@</span>
                       
                        <input type="hidden" name="type" value="1418">
                        <input type="email" name="email" id="email" placeholder="Email *"
                            class="form-control ixf" required>

                        <span class=" input-group-text spans"
                            style="margin: 3px 0; border-radius: 4px 0 0 4px ;">#</span>

                        <input type="number" name="phone" id="phone" placeholder="Telefono *"
                            class="form-control ixf"  style="margin-right: 0px !important" required>
                    </div>
                    <textarea name="body" id="body" cols="20" rows="5" class="form-control" placeholder="Mensaje*" required></textarea>
                </div>
                <input type="submit" value="Enviar" class="btn btn-primary ">

            </form>

        </div>
        <div id="info">
            <h2 class="title-contact">Encuentranos!!</h2>
            <div>
                <div>
                    <p>
                        <span><img src="{{ asset('img/marcador-de-posicion.png') }}" width="30px"
                                alt=""></span> CLL 52 3-80 LOCAL 210 CC. Unico Outlet, Cali.
                    </p>
                </div>
                <div>
                    <p><span><img src="{{ asset('img/llamada.png') }}" width="30px" alt=""></span>+57 311
                        7622089</p>
                </div>
                <div>
                    <p> <span><img src="{{ asset('img/correo.png') }}" width="30px"
                                alt=""></span>directoinnovaoccidente@outlook.com</p>
                </div>
            </div>

        </div>

    </div>

    <div class="contact-footer">
        <h2 class="title-contact">¿En qué te ayudamos? </h2>
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0 cards">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tu pedidos</h5>
                  <p class="card-text">Te explicamos como debes realizar tus pagos y tus pedidos de la mejor manera.</p>
                 
                </div>
              </div>
            </div>
            <div class="col-sm-4 cards">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Devoluciones</h5>
                  <p class="card-text">¿Cambiaste de opinion? No te preocupes, te cambiamos tu producto por uno a tu gusto.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 cards"  >
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Nuestros puntos de entrega</h5>
                    <p class="card-text">¿No sabes donde reclamar tus productos? Envianos una pregunta directa en PQRS .</p>
                  </div>
                </div>
              </div>
          </div>

    </div>



</div> <script src="{{ asset('js/faqs.js') }}"></script>
<script>   var userCheck = "{{ $check}}";</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('layouts.footer')
@endsection
