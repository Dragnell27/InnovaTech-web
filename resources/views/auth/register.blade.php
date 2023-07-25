@extends('layouts.contenedor')

<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <script src="{{ asset('js/registro.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">

</head>

<body>
    @section('component')
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-4">
                    <h2 style="color: black">Formulario registro</h2>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                placeholder="Ingresa tu nombre" required>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control"
                                placeholder="Ingresa tu apellido" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tipo_documento" class="form-label">Tipo de documento:</label>
                            <select id="tipo_documento" name="tipo_documento" class="form-select" required>

                            </select>

                            @error('tipo_documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="numero_documento" class="form-label">Número de documento:</label>
                            <input type="text" id="numero_documento" name="numero_documento" class="form-control"
                                placeholder="Ingresa tu numero de documento" required>

                            @error('numero_documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="numero_telefono" class="form-label">Teléfono:</label>
                            <input type="tel" id="numero_telefono" name="numero_telefono" class="form-control"
                                placeholder="Ingresa tu numero de telefono" required>

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Ingresa tu correo electronico" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña:</label>
                            <input type="password" id="contraseña" name="contraseña" class="form-control"
                                placeholder="Ingresa tu contraseña" required>

                            @error('contraseña')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="aceptarTerminos" name="aceptarTerminos" class="form-check-input"
                                required>
                            <label class="form-check-label" for="aceptarTerminos">Acepta los términos y condiciones de
                                innovatech.com y autorizo el tratamiento de mis datos personales</label>
                        </div>
                        <button type="submit" class="btn btn-danger">Registrarse</button>
                    </form>
                </div>
                <div class="col-md-6 my-4" id="beneficios">
                    <h2>Al crear tu cuenta en innovatech.com podras:</h2>
                    <div class="additional-info">
                        <div>
                            <img src="../public/img/iphone.png " width="60" height="30" alt="Imagen 1"
                                class="img-fluid">
                            <p>Recibir notificaciones en tiempo real sobre el estado de tu compra.</p>
                        </div>
                        <div>
                            <img src="../public/img/nota.png" width="60" height="30" alt="Imagen 2"
                                class="img-fluid">
                            <p>Imprimir tus tickets de compra.</p>
                        </div>
                        <div>
                            <img src="../public/img/escritorio.png" width="60" height="30" alt="Imagen 3"
                                class="img-fluid">
                            <p>Puedes ingrear a tu cuenta y ver el proceso de tu orden.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    @endsection
</body>

<script>
    const csrfToken = "{{ csrf_token() }}";
    document.addEventListener("DOMContentLoaded", function(){
                var ruta = "{{ route('document_type') }}"
                fetch(ruta, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': csrfToken
                    }

                }).then(response => {
                    return response.json();
                }).then(data => {
                    var opciones = '<option value="">-- Seleccionar --</option>';
                    for (let i in data.type) {
                        opciones += `<option value="${data.type[i].id}">${data.type[i].name}</option>`;
                    }
                    document.getElementById("tipo_documento").innerHTML = opciones;
                }).catch(error => console.error(error));
            });
</script>
</html>
