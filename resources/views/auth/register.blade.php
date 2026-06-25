@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center py-5">
    <div class="row justify-content-center w-100">
        <div class="col-xl-8 col-lg-10">
            <div class="row g-0 shadow-lg rounded overflow-hidden">
                <div class="col-md-5 d-none d-md-flex bg-primary text-white flex-column justify-content-center p-5">
                    <div class="mb-4">
                        <h1 class="display-6 fw-bold">Regístrate</h1>
                        <p class="text-white-75">Crea una cuenta para acceder a tu panel de administración. Diseño moderno adaptado al estilo Mazer dentro de tu layout Blade.</p>
                    </div>
                    <div>
                        <p class="mb-2"><strong>¡Empieza ahora!</strong></p>
                        <p class="small text-white-75">Recibirás acceso inmediato a las funcionalidades del sistema después de registrarte.</p>
                    </div>
                </div>
                <div class="col-md-7 bg-white p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">{{ __('Register') }}</h2>
                        <p class="text-muted">Completa tus datos para crear tu cuenta.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Register') }}</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p class="text-muted small mb-0">¿Ya tienes cuenta? <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
