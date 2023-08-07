@extends('layouts.profileMenu')
@section('content')
    <h1>Editar datos personales</h1>
    <form action="{{ route('users.update', Auth::user()->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" value="{{ $user['first_name'] }}"
                    name="first_name" placeholder="Ingresa tu nombre" readonly>
                @error('first_name')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" value="{{ $user['last_name'] }}"
                    name="last_name" placeholder="Ingresa tu apellido" readonly>
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
                            {{ old('tipo_de_documento', $user['document_type']['id']) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_de_documento')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="numero_documento" class="form-label">Número de Documento:</label>
                <input type="text" value="{{ $user['document'] }}" class="form-control" id="numero_documento"
                    name="número_de_documento" placeholder="Ingresa tu numero de documento" readonly>
                @error('número_de_documento')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="numero_telefono" class="form-label">Teléfono:</label>
                <input type="tel" value="{{ old('phone', $user['phone']) }}" name="phone"
                    class="form-control" id="numero_telefono" name="telefono" placeholder="Ingresa tu numero de telefono"
                    required>
                @error('phone')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" value="{{ old('email', $user['email']) }}" class="form-control"
                    id="correo" name="email" placeholder="ejemplo@gmail.com" required>
                @error('email')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3 form-check">
                    <input type="checkbox" id="accept_subscription" name="accept_subscription" class="form-check-input"
                        {{ old('accept_subscription') || $user['param_suscription'] == 20 ? 'checked' : '' }}>
                    <label class="form-check-label" for="accept_subscription">Acepta recibir notificaciones por medio
                        de su correo electronico.</label>
                </div>
            </div>
        </div>
        <div class="float-end mb-5">
            <input type="submit" value="Guardar datos" class="btn-primary btn">
        </div>
    </form>
@endsection
