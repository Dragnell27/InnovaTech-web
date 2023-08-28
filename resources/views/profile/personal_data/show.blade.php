@extends('layouts.profileMenu')

@section('content')
    <div class="container mb-5">
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
