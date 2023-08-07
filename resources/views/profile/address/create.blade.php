{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <form action="{{ route('direcciones.store') }}" method="POST">
        @csrf
        {{-- jaider --}}
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="perfilDepartamento">Departamento<strong class="text-danger">*</strong></label>
                    <select name="department" required id="perfilDepartamento" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($deparments as $deparment)
                            <option value="{{ $deparment->id }}">{{ $deparment->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="perfilMunicipio">Ciudad<strong class="text-danger">*</strong></label>
                    <select name="param_city" required id="perfilMunicipio" class="form-control">
                        <option value="">-- Seleccionar --</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilBarrio">Barrio<strong class="text-danger">*</strong></label>
                    <input name="hood" required id="perfilBarrio" class="form-control" type="text">
                </div>
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilDireccion">Direccion<strong class="text-danger">*</strong></label>
                    <input name="address" required id="perfilDireccion" class="form-control" type="text">
                </div>
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilPiso">Detalles</label>
                    <input name="floor" id="perfilPiso" class="form-control" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('direcciones.index') }}" class="btn btn-secondary mb-3 mt-4">Volver</a>
                    <input type="submit" class="btn btn-primary float-end mb-3 mt-4" value="Guardar">
                </div>
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
