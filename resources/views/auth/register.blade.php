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
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 my-4">
                    <h1 class="mb-4"style="color: black">Formulario de Registro</h1>
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" value="{{ old('first_name') }}"
                                    name="first_name" placeholder="Ingresa tu nombre" required>
                                @error('first_name')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" value="{{ old('last_name') }}"
                                    name="last_name" placeholder="Ingresa tu apellido" required>
                                @error('last_name')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tipo_documento" class="form-label">Tipo de Documento:</label>
                                <select class="form-select" id="tipo_documento" name="tipo_de_documento" required>
                                    <option value="">--Seleccionar--</option>
                                    @foreach ($document_types as $type)
                                        <option value="{{ $type->id }}"
                                            @if (old('tipo_de_documento') == $type->id) selected @endif>
                                            {{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_de_documento')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="numero_documento" class="form-label">Número de Documento:</label>
                                <input type="text" value="{{ old('número_de_documento') }}" class="form-control"
                                    id="numero_documento" name="número_de_documento"
                                    placeholder="Ingresa tu numero de documento" required>
                                @error('número_de_documento')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="numero_telefono" class="form-label">Teléfono:</label>
                                <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control"
                                    id="numero_telefono" name="telefono" placeholder="Ingresa tu numero de telefono"
                                    required>
                                @error('phone')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo Electrónico:</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" id="correo"
                                    name="email" placeholder="ejemplo@gmail.com" required>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasena" name="password"
                                    placeholder="Ingresa tu contraseña" required>
                                @error('password')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña:</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="confirma tu contraseña" required>
                                @error('password')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="aceptarTerminos" name="aceptarTerminos" class="form-check-input"
                                required>
                            <label class="form-check-label" for="aceptarTerminos">Acepta los términos y condiciones de
                                innovatech.com y autorizo el tratamiento de mis datos personales</label>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" id="accept_subscription" name="accept_subscription"
                                class="form-check-input">
                            <label class="form-check-label" for="accept_subscription">Acepta recibir notificaciones por
                                medio
                                de
                                su correo electronico.</label>
                        </div>

                        <button type="submit" class="btn btn-danger">Registrarse</button>
                    </form>

                </div>
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
