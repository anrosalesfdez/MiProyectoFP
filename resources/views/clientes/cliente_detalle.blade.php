@extends('home')

@section('contenidoDinamico')

<!-- se envía al componente clientes_editar la prop editadoCliente (JSON) -->
<clientes_detalle :cliente="{{$cliente}}"></clientes_detalle>
{{-- <div>{{$editadocliente}}</div> --}}
{{-- <div>Hola</div> --}}

@endsection