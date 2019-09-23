@extends('layouts.app')

@section('content');

    <div class="content">
        
        <div class="title m-b-md">
            <a href="{{ url('/') }}">
                <h1>{{ config('app.name', 'MiProyecto') }}</h1>
            </a>
            <p>Aplicación blablabla...</p>
            <p>Ángeles Rosales 2019</p>
            <p><a class="btn btn-link btn-lg" href="#" role="button">Sobre mí</a></p>
        </div>

        <div class="flex-center position-ref full-height">
        <!-- Authentication Links -->
            @guest
                <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
                @if (Route::has('register'))
                <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">{{ __('Register') }}</a>
                @endif
            @else
                <a class="btn btn-primary btn-lg" href="{{ route('home') }}" role="button">
                    {{ "Mi cuenta: ".Auth::user()->name }} <span class="caret"></span>
                </a>
                <a class="btn btn-dark btn-lg" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>

    </div>

@endsection;