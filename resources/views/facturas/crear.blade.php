@extends('home')

@section('contenidoDinamico')

<facturas_nuevo :olds="{{ $olds}}" :errors="{{ json_encode($errors->all()) }}" :emisor="{{ $emisor }}" :clientes="{{ $clientes }}" :productos="{{ $productos }}" :ultima="{{ $ultima }}" :impuestosfacturacion="{{ $impuestosfacturacion}}">
</facturas_nuevo>
 {{--   --}}
@endsection