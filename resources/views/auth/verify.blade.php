@extends('layouts.app')



@section('content')

@include('navinicio')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header autenticacion">{{ __('Verificación de correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado a tu correo un nuevo enlace de recuperación.') }}
                        </div>
                    @endif

                    {{ __('Revisa tu bandeja de entrada y visita el enlace.') }}
                    {{ __('No has recibido el correo?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click aquí para generar un nuevo enlace') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>


<footer>
    @include('pie')
</footer>
@endsection
