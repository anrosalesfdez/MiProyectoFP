@extends('home')

@section('contenidoDinamico')

<!-- se envía al componente clientes_editar la prop editadoCliente (JSON) -->
<clientes_editar :editadocliente="{{ $editadocliente }}"></clientes_editar>
{{-- <div>{{$editadocliente}}</div> --}}
{{-- <div>Hola</div> --}}

@endsection