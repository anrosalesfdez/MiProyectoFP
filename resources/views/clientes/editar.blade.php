@extends('home')

@section('contenidoDinamico')
{{-- {{ dd($editadocliente) }} --}}
{{-- {{ dd($razonvieja) }} --}}
{{-- para el código aquí y muestra dato --}}
<!-- se envía al componente clientes_editar la prop editadoCliente (JSON) -->
{{-- {{ dd($errors->default) }} --}}
<clientes_editar :editadocliente="{{ $editadocliente }}" :olds="{{ $olds}}" :errors="{{ json_encode($errors->all()) }}" :razonvieja="{{ $razonvieja }}">
</clientes_editar>
{{-- <div>{{$editadocliente}}</div> --}}
{{-- <div>Hola</div> --}}

@endsection