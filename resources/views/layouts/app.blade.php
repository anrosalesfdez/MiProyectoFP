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
    /*FUENTES PARA EL PROYECTO*/
    body{
    font-family: Helvetica, sans-serif !important;
    }
    h1, h2, h3, h4, h5, h6{
    font-family: "Futura", sans-serif;
    }
    .autenticacion{
    background-color: #2c3bf3;
    color: white;

    }
    .navhome{
        background: #dee2e6;
    }

    /*ICONOS PARA EL PROYECTO*/
    .material-icons {
    vertical-align: bottom;
    font-size: 18px !important;
    /* diplay:inline-flex;
    vertical-align:top; */
    }

    /*BACKGROUND*/
    body{
    bgcolor: #eff8f9;
    background-size: 1000px 500px; 
    }

    /*BOTONES*/
    .boxed-btn3, 
    .boxed-btn3-text:hover, 
    .footer 
    .footer_top 
    .footer_widget 
    .newsletter_form button, 
    .footer 
    .socail_links ul li a:hover {
    /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#ff008c+0,ff6357+100 */
    background: #ff008c;
    /* Old browsers */
    background: -moz-linear-gradient(left, #ff008c 0%, #ff6357 100%);
    /* FF3.6-15 */
    background: -webkit-linear-gradient(left, #ff008c 0%, #ff6357 100%);
    /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to right, #ff008c 0%, #ff6357 100%);
    /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff008c', endColorstr='#ff6357',GradientType=1 );
    /* IE6-9 */
    }
    .boxed-btn {
    background: #fff;
    color: #131313;
    display: inline-block;
    padding: 18px 44px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    font-weight: 400;
    border: 0;
    border: 1px solid #FF008C;
    letter-spacing: 3px;
    text-align: center;
    color: #FF008C !important;
    text-transform: uppercase;
    cursor: pointer;
    }
    /* line 17, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn:hover {
    background: #FF008C;
    color: #fff !important;
    border: 1px solid #FF008C;
    }

    /* line 22, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn:focus {
    outline: none;
    }

    /* line 25, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn.large-width {
    width: 220px;
    }

    /* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3 {
    font-family: "Poppins", sans-serif;
    font-size: 15px;
    font-weight: 500;
    color: #fff;
    cursor: pointer;
    padding: 13px 41px;
    text-align: center;
    border: none;
    background-size: 100% 100%;
    border-radius: 50px;
    background-size: 101% 100%;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
    display: inline-block;
    border: 1px solid transparent;
    }

    /* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3:hover {
    color: #fff;
    background-size: 300% 100%;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    }

    /* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3:focus {
    outline: none;
    }

    /* line 64, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-text {
    font-family: "Poppins", sans-serif;
    font-size: 15px;
    font-weight: 500;
    color: #fff;
    cursor: pointer;
    padding: 14px 38px;
    text-align: center;
    border: none;
    border-radius: 50px;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
    display: inline-block;
    color: #FF008C;
    }

    /* line 77, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-text:hover {
    background-position: 100% 0;
    color: #fff;
    }

    /* line 82, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-text:focus {
    outline: none;
    }

    /* line 88, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn4 {
    /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#0181f5+0,5db2ff+100 */
    background: #FF008C;
    color: #fff;
    display: inline-block;
    padding: 14px 27px;
    font-family: "Poppins", sans-serif;
    font-size: 16px;
    font-weight: 500;
    border: 0;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
    text-align: center;
    color: #fff !important;
    text-transform: capitalize;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
    cursor: pointer;
    letter-spacing: 2px;
    }

    /* line 107, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn4:hover {
    background: #FF008C;
    color: #fff !important;
    }

    /* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn4:focus {
    outline: none;
    }

    /* line 115, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn4.large-width {
    width: 220px;
    }

    /* line 120, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-white {
    color: #fff;
    display: inline-block;
    padding: 13px 27px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    font-weight: 400;
    border: 0;
    border: 1px solid #fff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    text-align: center;
    color: #fff !important;
    text-transform: capitalize;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
    cursor: pointer;
    letter-spacing: 2px;
    }

    /* line 137, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-white:hover {
    background: #28AE61;
    color: #fff !important;
    border: 1px solid transparent;
    }

    /* line 142, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-white i {
    margin-right: 2px;
    }

    /* line 145, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-white:focus {
    outline: none;
    }

    /* line 148, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-white.large-width {
    width: 220px;
    }

    /* line 153, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-green-2 {
    color: #FF008C !important;
    display: inline-block;
    padding: 14px 31px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    font-weight: 400;
    border: 0;
    border: 1px solid #FF008C;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    text-align: center;
    text-transform: capitalize;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
    cursor: pointer;
    letter-spacing: 2px;
    }

    /* line 169, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-green-2:hover {
    background: #FF008C;
    color: #fff !important;
    border: 1px solid transparent;
    }

    /* line 174, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-green-2:focus {
    outline: none;
    }

    /* line 177, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn3-green-2.large-width {
    width: 220px;
    }

    /* line 181, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn2 {
    background: transparent;
    color: #fff;
    display: inline-block;
    padding: 18px 24px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    font-weight: 400;
    border: 0;
    border: 1px solid #fff;
    letter-spacing: 2px;
    text-transform: uppercase;
    }

    /* line 193, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn2:hover {
    background: #fff;
    color: #131313 !important;
    }

    /* line 197, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
    .boxed-btn2:focus {
    outline: none;
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



</html>
