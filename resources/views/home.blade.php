@extends('layouts.app')

@section('content')
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
        <h1>{{ config('app.name', 'MiProyecto') }}</h1>
    </a>
    <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
      
<div class="container-fluid">
    <div class="row">
        <!--Define la nav lateral-->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>GESTIÓN GENERAL</span>
                    </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="3">
                        <span data-feather="home"></span>
                        Seguimiento
                        <span class="sr-only"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file"></span>
                        Facturación
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="users"></span>
                        Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
        <div class="container" id="app">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
