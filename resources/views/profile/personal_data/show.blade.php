{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <div class="mb-5">
        <div>
            <h1 id="datos_personales">Datos personales
                <a style="border: 0; background: none;" href="{{ route('users.edit', Auth::user()->id) }}">
                    <i class="bi bi-pencil-square" style="font-size: 30px"></i>
                </a>
            </h1>
        </div>
        <div id="bloque_datos">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label me-2" for="perfilNombre">Nombres</label>
                    <input type="text" class="form-control me-2" placeholder="nombres" required
                        id="perfilNombre" value="" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="perfilApellido">Apellidos</label>
                    <input type="text" class="form-control" value="" placeholder="apellidos" required
                        id="perfilApellido" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label me-2" for="perfilIdentificacion">Identificacion</label>
                    <input type="text" class="form-control me-2" placeholder="Identificacion" value=""
                        required id="perfilIdentificacion" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="perfilCelular">Celular</label>
                    <input type="number" class="form-control" placeholder="Celular" value=""
                        id="perfilCelular" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label me-2" for="perfilEmail">Correo&nbsp;Electronico</label>
                    <input type="text" class="form-control me-2" placeholder="Correo electronico"
                        value="" required id="perfilEmail" readonly>
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

    <script>
        function cargarDatos() {
            $.ajax({
                url: "{{ url('api') . '/users/' . Auth::user()->id }}",
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#perfilNombre').val(response.data[0].first_name);
                    $('#perfilApellido').val(response.data[0].last_name);
                    $('#perfilIdentificacion').val(response.data[0].document_type.name + ' ' + response
                        .data[0].document);
                    $('#perfilCelular').val(response.data[0].phone);
                    $('#perfilEmail').val(response.data[0].email);
                },
                error: function(error) {
                    console.log('Error al obtener datos de la API:', error);
                }
            });
        }
        cargarDatos();
    </script>
@endsection
