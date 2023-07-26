@extends('layouts.contenedor')
<head>
    <title>Registro</title>
    <script src="{{ asset('js/registro.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
@section('component')
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-4">
                <h2 style="color: black">Formulario registro</h2>
                <form action="{{ route('registro.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombres:</label>
                        <input type="text" id="nombre" value="{{ old('first_name') }}" name="first_name"
                            class="form-control" placeholder="Ingresa tu nombre" required>
                        @error('first_name')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" id="apellido" value="{{ old('last_name') }}" name="last_name"
                            class="form-control" placeholder="Ingresa tu apellido" required>
                        @error('last_name')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tipo_documento" class="form-label">Tipo de documento:</label>
                        <select id="tipo_documento" value="{{ old('tipo_de_documento') }}" name="tipo_de_documento" class="form-select" required>
                        <option value="">--Seleccionar--</option>
                        @foreach ($document_types as $type)
                        <option value="{{ $type->id }}" @if(old('tipo_de_documento') == $type->id) selected @endif>{{ $type->name }}</option>

                        @endforeach
                        </select>

                        @error('tipo_de_documento')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="numero_documento" class="form-label">Número de documento:</label>
                        <input type="text" value="{{ old('numero_de_documento') }}" id="numero_documento" name="numero_de_documento"
                            class="form-control" placeholder="Ingresa tu numero de documento" required>
                        @error('numero_de_documento')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="numero_telefono" class="form-label">Teléfono:</label>
                        <input type="text" id="numero_telefono" value="{{ old('phone') }}" name="phone"
                            class="form-control" placeholder="Ingresa tu numero de telefono" required>
                        @error('phone')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <input value="{{ old('email') }}" type="email" id="email" name="email"
                            class="form-control" placeholder="Ingresa tu correo electronico" required>
                        @error('email')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña:</label>
                        <input type="password" id="contraseña" name="password" class="form-control"
                            placeholder="Ingresa tu contraseña" required>
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
                        <input type="checkbox" id="aceptarTerminos" name="aceptarNotificaciones" class="form-check-input">
                        <label class="form-check-label" for="aceptarTerminos">Acepta recibir notificaciones por medio de
                            su correo electronico.</label>
                    </div>
                    <button type="submit" class="btn btn-danger">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
@endsection
