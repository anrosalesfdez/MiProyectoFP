@extends('home')

@section('contenidoDinamico')

    <facturas_detalle :factura="{{$factura}}" :lineas="{{$lineas}}"></facturas_detalle>

@endsection