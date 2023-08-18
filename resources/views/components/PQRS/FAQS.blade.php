@if (Auth::check())
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="faqs-container" style="" class="" >
    <div class="card w-30 border-dark text-bg-light mb-3" style="max-width: 20rem; " style="display: none ">
        <div class="card-header bg-transparent border-dark">Tienes alguna duda?. Escribenos...
            <span id="closeBtn" class="actionBt">
                <img src="{{asset('img/flecha-hacia-abajo.png')  }}" alt="" style="margin-left: 20px; padding: 2px" width="25px">
            </span>
        </div>
        <div class="card-body text-dark">
            <h6 class="card-title text-center ">Por favor ingresa la siguiente informacion para enviar tu PQRS.</h6>
            <p class="card-text subMessages text-center"> los campos que contienen '*' son obligatorios</p>
            <form  method="post" action="{{ route('faqs.store',Auth::user()->id )  }}"    id="formulario" style="padding: 0; margin: 0">
            <div>
                <input type="hidden" name="client_id" value="{{Auth::user()->id  }}">
                <input type="text"name="name" class="forms form-control" id="name" placeholder="* Nombre *"
                    required>
                <input type="tel" name="phone" class="forms form-control" id="phone"
                    placeholder="* Telefono *" required>
                <input type="email" name="email" class="forms form-control" id="email" placeholder="* Email *"
                    required>
                <select name="type" id="param_type" class=" form-select" required>
                    <option value="">Selecciona el tipo</option>
                  
                </select>
               <textarea id="" style="resize: none" cols="20" rows="2" name="body" required class="forms form-control" placeholder="Tu mensaje">

               </textarea>
               <div class="center text-center"><input type="checkbox" name="" id="" required>
                <span class="subMessages">Estoy de acuerdo con la politica de datos</span></div>
                
                <div class="center text-center">
                    <input type="submit" id="submitBtn" class="btn btn-success text-center center">
                </div>
            </div>
        </form>
        </div>
        
    </div>
</div>
<div id="chat-container" class="actionBt">
    <div id="chat-circle">
        <div id="round-image">
            <img src="{{ asset('img/ventana-de-chat.png') }}" alt="" width="50px" style="padding: 5px">
        </div>
        
    </div>
</div>
 
 <script src="{{ asset('js/faqs.js') }}"></script>
 
<script>

</script>
@endif