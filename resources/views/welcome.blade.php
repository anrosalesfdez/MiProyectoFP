@extends('layouts.app')

@section('content')

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo" style="padding-left:20px;">
                                <a href="{{ asset('/')}}">
                                    <img src="{{ asset('../pictures/otro1.png') }}" alt="" style="heigth:50px; width:100px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                      <!-- Authentication Links -->
                                      @guest   <!--The user is not authenticated...-->
                                        <li><a href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>
                                            @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" >{{ __('Crear cuenta') }}</a></li>
                                            @endif
                                      @else <!--The user is authenticated...-->
                                          <li><a href="{{ route('home') }}"> {{ "Mi cuenta" }}</a></li>
                                          <li><a href="{{ route('logout') }}"> {{ __('Salir') }}</a></li>
                                      @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        {{-- para el movil --}}
                      <div class="col-12">
                          <div class="mobile_menu d-block d-lg-none"></div>
                      </div>
                      {{-- fin del móvil --}}

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3>
                                ÁNGELES ROSALES
                                </h3>
                            {{-- <a class="boxed-btn3" href="#">Get Started</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

        <!-- compapy_info  -->
    <div class="compapy_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-5">
                    <div class="man_thumb">
                        <img src="{{ asset('../pictures/man.png')}}" alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-md-7">
                    <div class="company_info">
                        <h3>Factura a cualquier lugar del mundo <br>
                            con solo esta aplicación!</h3>
                            <p>Enjoy it ;)</p>

                        <a target="_blank" href="{{ url('https://github.com/anrosalesfdez/miproyectoFP')}}" class="boxed-btn3">Sobre el proyecto.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ compapy_info  -->   

    <!-- service_area  -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ '../pictures/seo_1.svg' }}" alt="">
                        </div>
                        <h3>Sigue tu negocio</h3>
                        <p>Haz un seguimiento periodico de cómo van tus cuentas.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ '../pictures/seo_2.svg' }}" alt="">
                        </div>
                        <h3>Facturación</h3>
                        <p>Emite facturas a cualquier figura jurídica sin problema.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ '../pictures/seo_3.svg' }}" alt="">
                        </div>
                        <h3>Impuestos</h3>
                        <p>Calcula lo modelos de IVA e IRPF y exportalos al portal de AEAT.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/ service_area  -->

    <footer>
      @include('pie')
    </footer>
@endsection

