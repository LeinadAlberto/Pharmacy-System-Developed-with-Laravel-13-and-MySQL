@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center py-5">
    <div class="row justify-content-center w-100">
        <div class="col-xl-8 col-lg-10">
            <div class="row g-0 shadow-lg rounded overflow-hidden">
                <div class="col-md-5 d-none d-md-flex bg-primary text-white flex-column justify-content-center p-5">
                    <div class="mb-4">
                        <h1 class="display-6 fw-bold">Restablecer contraseña</h1>
                        <p class="text-white-75">Ingresa tu correo electrónico y te enviaremos un enlace para actualizar tu contraseña de forma segura.</p>
                    </div>
                    <div>
                        <p class="mb-2"><strong>Recupera el acceso</strong></p>
                        <p class="small text-white-75">Si ya tienes una cuenta, utiliza el enlace enviado para volver a iniciar sesión.</p>
                    </div>
                </div>
                <div class="col-md-7 bg-white p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">{{ __('Reset Password') }}</h2>
                        <p class="text-muted">Te enviaremos un link para restablecer tu contraseña.</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p class="text-muted small mb-0">¿Ya recuerdas tu contraseña? <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
