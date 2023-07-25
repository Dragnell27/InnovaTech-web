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
                            <label for="nombre" class="form-label">Nombres:</label>
                            <input type="text" id="nombre" name="first_name" class="form-control"
                                placeholder="Ingresa tu nombre">
                            @error('first_name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" name="last_name" class="form-control"
                                placeholder="Ingresa tu apellido">

                            @error('last_name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tipo_documento" class="form-label">Tipo de documento:</label>
                            <select id="tipo_documento" name="param_type" class="form-select">

                            </select>

                            @error('param_type')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="numero_documento" class="form-label">Número de documento:</label>
                            <input type="text" id="numero_documento" name="document" class="form-control"
                                placeholder="Ingresa tu numero de documento">

                            @error('document')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="numero_telefono" class="form-label">Teléfono:</label>
                            <input type="tel" id="numero_telefono" name="phone" class="form-control"
                                placeholder="Ingresa tu numero de telefono">

                            @error('phone')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Ingresa tu correo electronico">

                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña:</label>
                            <input type="password" id="contraseña" name="password" class="form-control"
                                placeholder="Ingresa tu contraseña">

                            @error('password')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="aceptarTerminos" name="aceptarTerminos" class="form-check-input">
                            <label class="form-check-label" for="aceptarTerminos">Acepta los términos y condiciones de
                                innovatech.com y autorizo el tratamiento de mis datos personales.</label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="aceptarTerminos" name="aceptarNotificaciones"
                                class="form-check-input">
                            <label class="form-check-label" for="aceptarTerminos">Acepta recibir notificaciones por medio de
                                su correo electronico.</label>
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
    document.addEventListener("DOMContentLoaded", function() {
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
