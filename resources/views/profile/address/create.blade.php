{{-- jaider --}}
@extends('layouts.profileMenu')
@section('content')
    <form action="{{ route('direcciones.store') }}" method="POST">
        @csrf
        @include('profile.address.form')
    </form>
@endsection
