@extends('home')

@section('contenidoDinamico')

<facturas :facturas="{{ $facturas }}"></facturas>

@endsection