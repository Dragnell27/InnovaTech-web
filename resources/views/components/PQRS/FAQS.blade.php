@if (Auth::check())
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

<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16" style="align-items: center">
  <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z"/>
</svg>
            {{-- <img src="{{ asset('img/ventana-de-chat.png') }}" alt="" width="50px" style="padding: 5px"> --}}
        </div>


</div>

 <script src="{{ asset('js/faqs.js') }}"></script>

<script>

</script>
@endif
