@extends('home')

@section('contenidoDinamico')

<clientes_nuevo :olds="{{ $olds}}" :errors="{{ json_encode($errors->all()) }}"></clientes_nuevo>

@endsection