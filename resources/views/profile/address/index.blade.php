{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <h1 class="mb-3">Mis Direcciones</h1>
    @foreach ($addresses as $id)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    @foreach ($deparments as $department)
                        @if ($id->city->param_foreign == $department->id)
                            {{ $department->name }}
                        @endif
                    @endforeach
                    / {{ $id->city->name }}
                </h5>
                <p class="card-text">
                    {{ $id->hood }} / {{ $id->address }}
                    @if (isset($id->floor))
                        / Piso: {{ $id->floor }}
                    @endif
                </p>
            </div>
            <div class="card-footer">
                <div class="float-end mb-1 me-2">
                    <form action="{{ route('direcciones.destroy', $id) }}" method="post">
                        <a href="{{ route('direcciones.edit', $id) }}" class="btn btn-warning me-1">Editar</a>
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
@endsection
