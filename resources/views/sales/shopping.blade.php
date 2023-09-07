@extends('layouts.profileMenu')
@section('content')
<link rel="stylesheet" href="{{ asset('css/mis_compras.css') }}">
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
@if(Auth::user())
<?php
$Salescount = DB::table('sales')->where('user_id', Auth::user()->id)->count();
?>
@endif
@if ($Salescount > 0)
<script>
    console.log("Si hay datos");
</script>
<div class="container">
    <div class="row justify-content-center">
        <h1>Mis compras</h1>
    </div>
    <div class="row justify-content-center " id="content">
    </div>
</div>
<script src="{{ asset('js/sales.js') }}"></script>
@else
<div class="container">
</script>
<div class="text-center mt-5">
    <img src="{{ asset('img/sin compras.png') }}" alt="sin compra">
    <h1>No tienes compras</h1>
</div>
@endif
@endsection




