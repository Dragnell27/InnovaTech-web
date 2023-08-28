@extends('layouts.profileMenu')
@section('content')
    <form action="{{ route('change.password') }}" method="post" id="editar-contrasena">
        @csrf
        <div class="mb-3">
            <label for="old_password" class="form-label">Contraseña antigua</label>
            <input type="password" name="old_password" class="form-control " required>
            @error('old_password')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Nueva contraseña</label>
            <input type="password" name="new_password" class="form-control " required>
            @error('new_password')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirmar nueva contraseña</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
            @error('new_password_confirmation')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <div class="float-end mb-5">
            <input type="submit" value="Guardar contraseña" class="btn-primary btn">
        </div>

    </form>
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
        $('#editar-contrasena').submit(function(e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ms-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Cambiar contraseña?',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, cambiar',
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
