@extends('layouts.profileMenu')
@section('content')
<form action="{{ route('change.password') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="old_password" class="form-label">Contraseña antigua</label>
        <input type="password" name="old_password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="new_password" class="form-label">Nueva contraseña</label>
        <input type="password" name="new_password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">Confirmar nueva contraseña</label>
        <input type="password" name="new_password_confirmation" class="form-control" required>
    </div>
    <div class="float-end mb-5">
        <input type="submit" value="Guardar contraseña" class="btn-primary btn">
    </div>
</form>
@endsection
