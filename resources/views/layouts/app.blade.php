<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MiProyecto') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    {{-- others --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- open-material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    
    <!-- open-iconic-bootstrap (icon set for bootstrap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <style>
    body{
        font-family: Helvetica, sans-serif !important;

    }
    h1, h2, h3, h4, h5, h6{
        font-family: "Futura", sans-serif;
    }
        .material-icons {
            vertical-align: bottom;
            font-size: 18px !important;
            /* diplay:inline-flex;
            vertical-align:top; */
        }
        .sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .sidebar-sticky {
            position: -webkit-sticky;  // required for Safari
            position: sticky;
            top: 0; // required as well.
        }  
        body{
            bgcolor: #eff8f9;
            background-size: 1000px 500px; 

        }
        
    </style>

    @yield('css')

</head>

<body>

    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--DEFER When present, it specifies that the script is executed when the page has finished parsing.-->

</body>
@yield('pie')
</html>
