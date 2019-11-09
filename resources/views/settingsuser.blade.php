@extends('home')

@section('contenidoDinamico')
    <settingsuser :usuariobd="{{ $usuario }}"></settingsuser>

@endsection