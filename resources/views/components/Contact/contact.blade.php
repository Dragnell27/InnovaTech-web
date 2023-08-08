<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
<title>Contácto</title>

<div id="item-container">
    <div id="contact-title">
        <h1>Contáctanos</h1>
    </div>
</div>
<div class="container">
    <div id="form-container">
        <div id="send-form">
            <h2 class="title-contact">Escríbenos</h2>
            <form action="">
                <div class="mb-3">
                    <input type="text" name="name" id="name" placeholder="Nombre *" class="form-control ixf">
                    <div class="input-group mb-3">
                        <span class="input-group-text spans" style="margin: 3px 0">@</span>

                        <input type="email" name="" id="" placeholder="Email *"
                            class="form-control ixf">

                        <span class=" input-group-text spans"
                            style="margin: 3px 0; border-radius: 4px 0 0 4px ;">#</span>

                        <input type="tel" name="" id="" placeholder="Telefono *"
                            class="form-control ixf" style="margin-right: 0px !important">
                    </div>
                    <textarea name="body" id="body" cols="20" rows="5" class="form-control" placeholder="mensaje"></textarea>
                </div>
                <input type="button" value="Enviar" class="btn btn-primary ">

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
        <h3 class="title-contact">¿En qué te ayudamos? </h3>
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tu pedidos</h5>
                  <p class="card-text">Te explicamos como debes realizar tus pagos y tus pedidos de la mejor manera.</p>
                 
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Devoluciones</h5>
                  <p class="card-text">¿Cambiaste de opinion? No te preocupes, te cambiamos tu producto por uno a tu gusto.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Nuestros puntos de entrega</h5>
                    <p class="card-text">¿No sabes donde reclamar tus productos? Envianos una pregunta directa en PQRS .</p>
                  </div>
                </div>
              </div>
          </div>

    </div>



</div>
