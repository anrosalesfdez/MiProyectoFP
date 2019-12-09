@extends('home')

@section('contenidoDinamico')

<clientes :clientes="{{ json_encode($clientes) }}"></clientes>

@endsection