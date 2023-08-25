@extends('layouts.profileMenu')
@section('content')
<link rel="stylesheet" href="{{ asset('css/mis_compras.css') }}">
<div class="container">
    <div class="row justify-content-center " id="content">

    </div>
</div>

<script>
    var id = {{ Auth::user()->id }};
</script>
    <script src="{{ asset('js/sales.js') }}"></script>
@endsection




