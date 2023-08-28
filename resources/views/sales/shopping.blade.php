@extends('layouts.profileMenu')
@section('content')
<link rel="stylesheet" href="{{ asset('css/mis_compras.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <h1>Mis compras</h1>
    </div>
    <div class="row justify-content-center " id="content">
    </div>
</div>
<style>
    .estado-texto {
    font-weight: bold;
    font-size: 18px;
}
    .producto{
    font-weight: bold;
}
    .compra{
    font-weight: bold;
}

    .estado-texto.entregado{
    color: green;
}

    .Pendiente {
    color: yellow;
}
</style>
<script>
    var id = {{ Auth::user()->id }};
</script>
    <script src="{{ asset('js/sales.js') }}"></script>
@endsection




