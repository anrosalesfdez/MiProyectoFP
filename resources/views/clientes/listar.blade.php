@extends('home')

@section('contenidoDinamico')

<clientes :clientes="{{ $clientes }}"></clientes>

@endsection