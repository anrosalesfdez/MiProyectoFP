@extends('home')

@section('contenidoDinamico')
    <productos :productos="{{ $productos }}" :actividades="{{ $actividades }}"></productos>

    
@endsection