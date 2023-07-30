<head>
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>


<div id="faqs-container" style=""  >
    <div class="card w-30 border-dark text-bg-light mb-3" style="max-width: 20rem; " style="display: none ">
        <div class="card-header bg-transparent border-dark">Tienes alguna duda?. Escribenos...</div>
        <div class="card-body text-dark">
            <h6 class="card-title text-center ">Por favor ingresa la siguiente informacion para enviar tu PQRS.</h6>
            <p class="card-text subMessages text-center"> los campos que contienen '*' son obligatorios</p>
            <form action="" style="padding: 0; margin: 0">
            <div>
                <input type="text"name="name" class="forms form-control" id="name" placeholder="* Nombre *"
                    required>
                <input type="text" name="phone" class="forms form-control" id="phone"
                    placeholder="* Telefono *" required>
                <input type="text" name="email" class="forms form-control" id="email" placeholder="* Email *"
                    required>
                <select name="param_type" id="param_type" class=" form-select" required>
                    <option value="">Selecciona el tipo</option>
                    <option value="">Queja</option>
                    <option value="">Reclamo</option>
                    <option value="">Sugerencias</option>
                    <option value="">Pregunta</option>
                </select>
               <textarea id="" style="resize: none" cols="20" rows="2" name="body" required class="forms form-control" placeholder="Tu mensaje"></textarea>
               <div class="center text-center"><input type="checkbox" name="" id="" required>
                <span class="subMessages">Estoy de acuerdo con la politica de datos</span></div>
                
                <div class="center text-center">
                    <input type="submit" class="btn btn-success text-center center">
                </div>
            </div>
        </form>
        </div>
        
    </div>
</div>
<div id="chat-container">
    <div id="chat-circle">
        <i>PQRS</i>
    </div>
</div>
