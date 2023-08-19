{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <h1 class="mb-3">Mis Direcciones</h1>
    @foreach ($filter as $address)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    @foreach ($deparments as $department)
                        @if ($address['city']['param_foreign'] == $department->id)
                            {{ $department->name }}
                        @break
                    @endif
                @endforeach
                / {{ $address['city']['name'] }}
            </h5>
            <p class="card-text">
                {{ $address['hood'] }} / {{ $address['address'] }}
                @if (isset($address['floor']))
                    / Detalles: {{ $address['floor'] }}
                @endif
            </p>
        </div>
        <div class="card-footer">
            <div class="float-end mb-1 me-2">
                <form action="{{ route('direcciones.destroy', $address->id) }}" method="post"
                    class="eliminar-address">
                    <a href="{{ route('direcciones.edit', $address->id) }}" class="btn btn-warning me-1">Editar</a>
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn-danger btn">
                </form>
            </div>
        </div>
    </div>
@endforeach
<div class="float-end mb-3 mt-4">
    <a class="btn btn-primary" href="{{ route('direcciones.create') }}" role="button">Agregar direccion</a>
</div>
<script>
    $('.eliminar-address').submit(function(e) {
        e.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary ms-2',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Estas seguro de eliminar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
@if(session('message') && session('type'))
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
@endsection
