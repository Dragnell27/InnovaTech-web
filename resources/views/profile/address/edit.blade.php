{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <form action="{{ route('direcciones.update', $data['address']['id']) }}" method="POST">
        @csrf
        @method('patch')
        <div class="container">
            <h1>Editar dirección</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="perfilDepartamento">Departamento<strong class="text-danger"> *</strong></label>
                    <select name="department" required id="perfilDepartamento" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($deparments as $deparment)
                            @if ($data['deparment']['id'] == $deparment->id)
                                <option value="{{ $deparment->id }}" selected>{{ $deparment->name }}</option>
                            @else
                                <option value="{{ $deparment->id }}">{{ $deparment->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="perfilMunicipio">Ciudad<strong class="text-danger"> *</strong></label>
                    <select name="param_city" required id="perfilMunicipio" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($cities as $city)
                            @if ($data['address']['city']['id'] == $city->id)
                                <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                            @else
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilBarrio">Barrio<strong class="text-danger"> *</strong></label>
                    <input name="hood" value="{{ $data['address']['hood'] }}" id="perfilBarrio" class="form-control"
                        type="text">
                </div>
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilDireccion">Direccion<strong class="text-danger"> *</strong></label>
                    <input name="address" value="{{ $data['address']['address'] }}" id="perfilDireccion"
                        class="form-control" type="text">
                </div>
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilPiso">Detalles</label>
                    <input name="floor" value="{{ $data['address']['floor'] }}" id="perfilPiso" class="form-control"
                        type="text">
                </div>
            </div>

            <div class="float-end mt-3 mb-5">
                <input type="submit" class="btn btn-primary" value="Guardar datos">
                <button type="button" class="btn btn-danger" onclick="goBack()">Cancelar</button>
            </div>
        </div>
    </form>
    {{-- jaider --}}
    <script>
        const csrfToken = "{{ csrf_token() }}";
        var cities = "{{ route('cities') }}"
        document.getElementById("perfilDepartamento").addEventListener("change", (e) => {
            console.log(e.target.value);
            fetch(cities, {
                method: 'POST',
                body: JSON.stringify({
                    "texto": e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken
                }

            }).then(response => {
                return response.json();
            }).then(data => {
                var opciones = '<option value="">-- Seleccionar --</option>';
                for (let i in data.city) {
                    opciones += `<option value="${data.city[i].id}">${data.city[i].name}</option>`;
                }
                document.getElementById("perfilMunicipio").innerHTML = opciones;
            }).catch(error => console.error(error));
        });
    </script>
@endsection
