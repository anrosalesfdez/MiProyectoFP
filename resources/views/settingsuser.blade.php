@extends('home')

@section('contenidoDinamico')
    <settingsuser :usuariobd="{{ $usuariobd }}"></settingsuser>

@endsection