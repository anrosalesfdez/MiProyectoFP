@extends('layouts.app')

@section('content')

<a class="btn btn-secondary pull-right" href="/">Volver</a>

<h1>Acerca del proyecto</h1>
<p>Crear una aplicación web capaz de generar facturas.</p>
<p>Usar framework VueJS para cliente y Laravel para servidor.</p>
<p>Bootstrap para estilos</p>
<p>Apache como servidor</p>
<p>MySQL como gestor de bases de datos</p>
<h1>Funcionamiento de la aplicación</h1>
<h2>Vista welcome</h2>
<ol>Vista Welcome
    <li>Representa el inicio del programa</li>
    <li>Utiliza la directiva <strong>guest</strong> para detectar si el usuario está o no registrado</li>
    <li>Si usuario registrado muestra entrada al Home, y posibilidad de desconexion</li>
    <li>Si usuario NO registrado muestra posibilidad de loguearse o de registrarse</li>
</ol>
<h3>Login</h3>
<p>Muestra form para log in: usuario + contraseña</p>
<p>Si usuario logueado correctamente => HOME</p>
<p>Si usuario con errores. Muestra errores.</p>
@endsection