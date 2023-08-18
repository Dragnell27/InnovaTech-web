{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <form action="{{ route('direcciones.update', $data['address']['id']) }}" method="POST" class="editar-address">
        @csrf
        @method('patch')
        <div class="container">
            <h1>Editar dirección</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="perfilDepartamento">Departamento<strong class="text-danger">
                            *</strong></label>
                    <select name="department" required id="perfilDepartamento" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($departments as $department)
                            @if (old('department', $data['department']['id']) == $department->id)
                                <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                            @else
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('department')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="perfilMunicipio">Ciudad<strong class="text-danger"> *</strong></label>
                    <select name="param_city" required id="perfilMunicipio" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($cities as $city)
                            @if (old('param_city', $data['address']['city']['id']) == $city->id)
                                <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                            @else
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('param_city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilBarrio">Barrio<strong class="text-danger"> *</strong></label>
                    <input name="hood" value="{{ old('hood', $data['address']['hood']) }}" id="perfilBarrio" class="form-control" type="text">
                    @error('hood')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilDireccion">Direccion<strong class="text-danger"> *</strong></label>
                    <input name="address" value="{{ old('address', $data['address']['address']) }}" id="perfilDireccion" class="form-control" type="text">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label me-2" for="perfilPiso">Detalles</label>
                    <input name="floor" value="{{ old('floor', $data['address']['floor']) }}" id="perfilPiso" class="form-control" type="text">
                    @error('floor')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
    <script>
        $('.editar-address').submit(function(e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ms-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Estas seguro de editar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, editar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
