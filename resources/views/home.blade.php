@extends('layouts.app')

@section('content')
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
        <h1>{{ config('app.name', 'MiProyecto') }}</h1>
    </a>
    <ul class="navbar-nav px-3">
        <li class="nav-item">
            <a style="display: inline" class="nav-link" href="{{ route('home') }}" role="button">
                {{ "Mi cuenta: ".Auth::user()->name }} <span class="caret"></span>
            </a>
            <a style="display: inline" class="nav-link" href="#" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Salir') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
      
<div class="container-fluid" >
    <div class="row">
        <!--Define la nav lateral-->
        <!--TODO: meter clases active en enlaces-->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>GESTIÓN GENERAL</span>
                    </h6>
                <ul class="nav flex-column nav-pills">
                    <li class='nav-item'>
                        <a class="{{ request()->route()->getName() === 'dashboard' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('dashboard') }}">
                        <span data-feather="home"></span>
                        Seguimiento
                        <span class="sr-only"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->route()->getName() === 'facturacion' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('facturacion') }}">
                        <span data-feather="file"></span>
                        Facturación
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->route()->getName() === 'listar' || request()->route()->getName() === 'ver' || request()->route()->getName() === 'crear' || request()->route()->getName() === 'editar' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('/clientes/listar') }}">
                        <span data-feather="users"></span>
                        Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="{{ request()->route()->getName() === 'productos' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('productos') }}">
                        <span data-feather="list"></span>
                        Productos
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>GESTIÓN FISCAL</span>
                </h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Trimestre actual
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Año actual
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Años anteriores
                    </a>
                </li>
                </ul>
            </div>
        </nav>

        <!--Contenido central que carga por js-->
        <div class="container col-md-10">
            @yield('contenidoDinamico')
        </div>

    </div>
</div>

@endsection

@section('pie')
<footer class="mastfoot mt-auto">
    <div class="inner">
    <p>Ángeles Rosales 2019 <a href="{{ url('https://github.com/anrosalesfdez/miproyectoFP')}}">GitHub profile</a></p>
    </div>
</footer>
@endsection