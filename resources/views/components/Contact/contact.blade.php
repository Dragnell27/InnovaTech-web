<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

<div  id="item-container">
        <div id="contact-title">
            <h1 >Contactanos</h1>
        </div>
</div>
<div class="container">
    <div id="form-container">
        <div id="send-form">
            <h2>Escribenos</h2>
            <form action="">
                <div class="mb-3">
                    <input type="text" name="name" id="name" placeholder="Nombre *" class="form-control ixf">
                    <div class="input-group mb-3">
                        <span class="input-group-text spans" style="margin: 3px 0">@</span>
                        
                        <input type="email" name="" id="" placeholder="Email *" class="form-control ixf">
    
                        <span class=" input-group-text spans" style="margin: 3px 0; border-radius: 4px 0 0 4px ;" >#</span>
                        
                        <input type="tel" name="" id="" placeholder="Telefono *" class="form-control ixf" style="margin-right: 0px !important" >
                    </div>
                    <textarea name="body" id="body" cols="20" rows="5" class="form-control" placeholder="mensaje"></textarea>
                </div>
                <input type="button" value="Enviar" class="btn btn-primary ">

            </form>
            
        </div>
        <div id="info">
            <h2>Direcciones</h2>
            <div>
                <div>   
                    <span><img src="{{ asset('img/marcador-de-posicion.png') }}" width="30px" alt=""></span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque unde vero iusto sint voluptates a, sit magnam aut, voluptatum ex officiis numquam consequuntur laudantium hic vel perspiciatis fugit facilis! Possimus.Excepturi architecto aut ratione harum eius illum ducimus tempore accusamus rem quidem! Commodi adipisci fugit ex ducimus modi vero libero quaerat optio natus voluptatum, tempora dignissimos totam assumenda! Nesciunt, sit!</p>
                </div>
                <div>
                    <span><img src="{{ asset('img/llamada.png') }}" width="30px" alt=""></span>
                    <p>32323 4345432</p>
                </div>
                <div>
                    <span><img src="{{ asset('img/correo.png') }}" width="30px" alt=""></span>
                    <p>Correo@gmail.com</p>
                </div>
                    

            </div>

        </div>

    </div>



</div>
