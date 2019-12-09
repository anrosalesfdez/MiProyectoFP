@extends('layouts.app')

@section('content')

<nav class="navbar sticky-top flex-md-nowrap p-0 navhome">
    <a href="{{ url('/home') }}">
        <img src="../pictures/otro1.png" width="120" height="50" alt="mi_logo" style="padding: 10px; padding-left:30px;">
    </a>
    {{-- <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/home') }}">
        <h1>{{ config('app.name', 'MiProyecto') }}</h1>
    </a> --}}
    <ul class="navbar-nav px-3">
        <li class="nav-item">
            <a class="{{ request()->route()->getName() === 'settingsuser' ? 'navButtonA' : 'navButton' }}" 
                style="display: inline-block; margin-rigth: 5px; font-size:18px;" 
                href="{{ url('settingsuser') }}">
                {{ "Mi cuenta" }}
            </a>
            
            <a class="navButton" style="display: inline; margin-left: 20px; font-size:18px;" href="{{ route('logout') }}">
                {{ __('Salir') }}
            </a>
        </li>
    </ul>
</nav>
      
<div class="container-fluid" >
    <div class="row">
        <!--Define la nav lateral-->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar-stick">
            <div class="sidebar-sticky">
                    
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                GESTIÓN GENERAL
                </h6>
                <ul class="nav flex-column nav-pills">
                    <li class='nav-item'>
                        <a class="{{ request()->route()->getName() === 'dashboard' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('dashboard') }}">
                            <i class="material-icons">home</i>
                            Seguimiento
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->route()->getPrefix() === '/facturas' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('facturas/listar') }}">
                            <i class="material-icons">format_list_bulleted</i>
                            Facturación
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->route()->getPrefix() === '/clientes'  ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('/clientes/listar') }}">
                            <i class="material-icons">group</i>
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="{{ request()->route()->getName() === 'productos' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('productos') }}">
                        <i class="material-icons">book</i>
                        Productos
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                GESTIÓN FISCAL
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

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                CONFIGURACIÓN
                </h6>
                <ul class="nav flex-column nav-pills">
                    <li class='nav-item'>
                        <a class="{{ request()->route()->getName() === 'emisor' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="{{ url('emisor') }}">
                            <i class="material-icons">settings_applications</i>
                            Emisor facturas
                        </a>
                    </li>
                </ul>
                <ul class="nav flex-column nav-pills">
                    <li class='nav-item'>
                        <a class="{{ request()->route()->getName() === 'impuestos' ? 'nav-item nav-link active' : 'nav-item nav-link' }}" href="">
                            <i class="material-icons">settings_applications</i>
                            Impuestos
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

<footer>
    @include('pie')
</footer>   
@endsection