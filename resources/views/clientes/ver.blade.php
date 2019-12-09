@extends('home')

@section('contenidoDinamico')

<!-- se envía al componente clientes_editar la prop editadoCliente (JSON) -->
<clientes_detalle :cliente="{{ json_encode($cliente) }}"></clientes_detalle>


@endsection