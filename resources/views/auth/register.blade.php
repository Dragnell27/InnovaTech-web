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
                    <form action="{{ route('registro.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombres:</label>
                            <input type="text" id="nombre" value="{{old('first_name')}}" name="first_name" class="form-control"
                                placeholder="Ingresa tu nombre">
                            @error('first_name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" value="{{old('last_name')}}" name="last_name" class="form-control"
                                placeholder="Ingresa tu apellido">
                            @error('last_name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tipo_documento" class="form-label">Tipo de documento:</label>
                            <select id="tipo_documento" value="{{old('document_type')}}" name="document_type" class="form-select"></select>
                            @error('document_type')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="numero_documento" class="form-label">Número de documento:</label>
                            <input type="number" value="{{old('document')}}" id="numero_documento" name="document" class="form-control"
                                placeholder="Ingresa tu numero de documento">
                            @error('document')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="numero_telefono" class="form-label">Teléfono:</label>
                            <input type="tel" id="numero_telefono" value="{{old('phone')}}" name="phone" class="form-control"
                                placeholder="Ingresa tu numero de telefono">
                            @error('phone')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input  value="{{old('email')}}" type="email" id="email" name="email" class="form-control"
                                placeholder="Ingresa tu correo electronico" >
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
                            <input type="checkbox" id="aceptarTerminos" name="aceptarTerminos" class="form-check-input"
                                required>
                            <label class="form-check-label" for="aceptarTerminos">Acepta los términos y condiciones de
                                innovatech.com y autorizo el tratamiento de mis datos personales</label>
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
