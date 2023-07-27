{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <div class="mb-5">
        <div>
            <h1 id="datos_personales">Datos personales
                <button style="border: 0; background: none;" onclick="">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </h1>

        </div>
        <div id="bloque_datos">
            <div class="input-group mb-3">
                <div style="width: 50%;" class="pe-1">
                    <label class="form-label me-2" for="perfilNombre">Nombres</label>
                    <input type="text" class="form-control me-2" placeholder="nombres" required id="perfilNombre"
                        value="{{$data[0]['first_name']}}" readonly>
                </div>
                <div style="width: 50%;" class="ps-1">
                    <label class="form-label" for="perfilApellido">Apellidos</label>
                    <input type="text" class="form-control" value="{{$data[0]['last_name']}}" placeholder="apellidos" required
                        id="perfilApellido" readonly>
                </div>
            </div>
            <div class="input-group mb-3">
                <div style="width: 50%;" class="pe-1">
                    <label class="form-label me-2" for="perfilIdentificacion">Identificacion</label>
                    <input type="text" class="form-control me-2" placeholder="Identificacion"
                        value="{{$data[0]['document_type']['name']}} {{$data[0]['document']}}" required id="perfilIdentificacion" required readonly>
                </div>
                <div style="width: 50%;" class="ps-1">
                    <label class="form-label" for="perfilCelular">Celular</label>
                    <input type="number" class="form-control" placeholder="Celular" value="{{$data[0]['phone']}}"
                        id="perfilCelular" readonly>
                </div>
            </div>
            <div class="input-group mb-3">
                <div style="width: 100%;">
                    <label class="form-label me-2" for="perfilEmail">Correo&nbsp;Electronico</label>
                    <input type="text" class="form-control me-2" placeholder="Correo electronico" value="{{$data[0]['email']}}"
                        required id="perfilEmail" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
