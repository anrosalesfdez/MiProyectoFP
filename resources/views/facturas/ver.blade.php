@extends('home')

@section('contenidoDinamico')

    <facturas_detalle :factura="{{$factura}}"></facturas_detalle>

@endsection