@extends('layouts.profileMenu')

@section('content')
    <div class="container mb-5">
        <h1 id="datos_personales">Datos personales</h1>
        <div id="bloque_datos">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="perfilNombre">Nombres</label>
                    <input type="text" class="form-control" placeholder="Nombres" value="{{ $user['first_name'] }}"
                        readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="perfilApellido">Apellidos</label>
                    <input type="text" class="form-control" placeholder="Apellidos" value="{{ $user['last_name'] }}"
                        readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="perfilIdentificacion">Identificacion</label>
                    <input type="text" class="form-control" placeholder="Identificacion"
                        value="{{ $user['document_type']['name'] }} {{ $user['document'] }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="perfilCelular">Celular</label>
                    <input type="number" class="form-control" placeholder="Celular" value="{{ $user['phone'] }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label" for="perfilEmail">Correo Electronico</label>
                    <input type="email" class="form-control" placeholder="Correo electronico" value="{{ $user['email'] }}"
                        readonly>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12 col-12 text-end">
                    <form action="{{ route('users.destroy', Auth::user()->id) }}" method="post" class="eliminar-cuenta">
                        @csrf
                        @method('delete')
                        <a class="btn btn-primary" href="{{ route('users.edit', Auth::user()->id) }}">Editar datos</a>
                        <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('message') && session('type'))
        <script>
            const swalWithBootstrapButton = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ms-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
            swalWithBootstrapButton.fire(
                '{{ session('message') }}',
                '{{ session('text') }}',
                '{{ session('type') }}'
            );
        </script>
    @endif
    <script>
        $('.eliminar-cuenta').submit(function(e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ms-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Eliminar tu cuenta?',
                text: 'Esta acción es irreversible y eliminará todos tus datos asociados. Si decides continuar, no podrás recuperar tu cuenta ni tus datos.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar mi cuenta',
                cancelButtonText: 'No, cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
