@extends('layouts.profileMenu')
@section('content')
<link rel="stylesheet" href="{{ asset('css/mis_compras.css') }}">
<div class="container mb-5">
<h1>Mis compras</h1>
  <div id="sales-container" class="row">
    @include('sales.sales')
  </div>
</div>
<script src="{{ asset('js/sales.js') }}"></script>
@endsection




