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

</head>

<body>
    <div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--DEFER When present, it specifies that the script is executed when the page has finished parsing.-->

</body>
</html>
