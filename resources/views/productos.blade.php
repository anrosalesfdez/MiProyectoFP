@extends('home')

@section('contenidoDinamico')
    <productos :productos="{{ $productos }}"></productos>

    
@endsection