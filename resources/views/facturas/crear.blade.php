@extends('home')

@section('contenidoDinamico')

<facturas_nuevo :olds="{{ $olds}}" :errors="{{ json_encode($errors->all()) }}"></facturas_nuevo>

@endsection