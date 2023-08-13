{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <div class="mb-5">
        <div>
            <h1 id="datos_personales">Datos personales
                <a style="border: 0; background: none; font-size: 30px;" href="{{ route('users.edit', Auth::user()->id) }}">
                    <svg width="30px" height="30px" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
            </h1>

        </div>
        <div id="bloque_datos">
            <div class="input-group mb-3">
                <div style="width: 50%;" class="pe-1">
                    <label class="form-label me-2" for="perfilNombre">Nombres</label>
                    <input type="text" class="form-control me-2" placeholder="nombres" required id="perfilNombre"
                        value="{{ $user['first_name'] }}" readonly>
                </div>
                <div style="width: 50%;" class="ps-1">
                    <label class="form-label" for="perfilApellido">Apellidos</label>
                    <input type="text" class="form-control" value="{{ $user['last_name'] }}" placeholder="apellidos"
                        required id="perfilApellido" readonly>
                </div>
            </div>
            <div class="input-group mb-3">
                <div style="width: 50%;" class="pe-1">
                    <label class="form-label me-2" for="perfilIdentificacion">Identificacion</label>
                    <input type="text" class="form-control me-2" placeholder="Identificacion"
                        value="{{ $user['document_type']['name'] }} {{ $user['document'] }}" required
                        id="perfilIdentificacion" required readonly>
                </div>
                <div style="width: 50%;" class="ps-1">
                    <label class="form-label" for="perfilCelular">Celular</label>
                    <input type="number" class="form-control" placeholder="Celular" value="{{ $user['phone'] }}"
                        id="perfilCelular" readonly>
                </div>
            </div>
            <div class="input-group mb-3">
                <div style="width: 100%;">
                    <label class="form-label me-2" for="perfilEmail">Correo&nbsp;Electronico</label>
                    <input type="text" class="form-control me-2" placeholder="Correo electronico"
                        value="{{ $user['email'] }}" required id="perfilEmail" readonly>
                </div>
            </div>

            <div class="float-end mb-5 row">
                <form action="{{ route('users.destroy', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                </form>
            </div>
        </div>
    </div>
@endsection
