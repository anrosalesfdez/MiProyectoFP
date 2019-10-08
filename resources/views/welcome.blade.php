@extends('layouts.app')

@section('css')
<style>
/*
 * Globals
 */

/* Links */
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-secondary,
.btn-secondary:hover,
.btn-secondary:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritance from `body` */
  background-color: #fff;
  border: .05rem solid #fff;
}


/*
 * Base structure
 */

html,
body {
  height: 100%;
  background-color: #333;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-pack: center;
  -webkit-box-pack: center;
  justify-content: center;
  color: #fff;
  text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
  box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
}

.cover-container {
  max-width: 42em;
}


/*
 * Header
 */
.masthead {
  margin-bottom: 2rem;
}

.masthead-brand {
  margin-bottom: 0;
}

.nav-masthead .nav-link {
  padding: .25rem 0;
  font-weight: 700;
  color: rgba(255, 255, 255, .5);
  background-color: transparent;
  border-bottom: .25rem solid transparent;
}

.nav-masthead .nav-link:hover,
.nav-masthead .nav-link:focus {
  border-bottom-color: rgba(255, 255, 255, .25);
}

.nav-masthead .nav-link + .nav-link {
  margin-left: 1rem;
}

.nav-masthead .active {
  color: #fff;
  border-bottom-color: #fff;
}

@media (min-width: 48em) {
  .masthead-brand {
    float: left;
  }
  .nav-masthead {
    float: right;
  }
}


/*
 * Cover
 */
.cover {
  padding: 0 1.5rem;
}
.cover .btn-lg {
  padding: .75rem 1.25rem;
  font-weight: 700;
}


/*
 * Footer
 */
.mastfoot {
  color: rgba(255, 255, 255, .5);
}
</style>
@endsection

@section('content')

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <nav class="nav nav-masthead justify-content-center">
                <!-- Authentication Links -->
                @guest   <!--The user is not authenticated...-->
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ __('Entrar') }}
                    </a>
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}" >
                        {{ __('Registro') }}
                    </a>
                    @endif
                @else <!--The user is authenticated...-->
                    <a class="nav-link" href="{{ route('home') }}">
                        {{ "Mi cuenta: ".Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </nav>
        </header>
    
        <main role="main" class="inner cover">
            <h1 class="cover-heading">{{ config('app.name', 'MiProyecto') }}</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <a target="_blank" href="{{ url('proyecto') }}" class="btn btn-lg btn-secondary">Sobre el proyecto</a>
            </p>
        </main>
      
        <footer class="mastfoot mt-auto">
            <div class="inner">
            <p>Ángeles Rosales 2019 <a target="_blank" href="{{ url('https://github.com/anrosalesfdez/miproyectoFP')}}">GitHub profile</a></p>
            </div>
        </footer>
    </div>

@endsection