@extends('layouts.app')

@section('content')
    <div class="container-fluid min-vh-100 d-flex align-items-center py-5">
        <div class="row justify-content-center w-100">
            <div class="col-xl-8 col-lg-10">
                <div class="row g-0 shadow-lg rounded overflow-hidden">
                    <div class="col-md-5 d-none d-md-flex bg-primary text-white flex-column justify-content-center p-5">
                        <div class="mb-4">
                            <h1 class="display-6 fw-bold">Bienvenido</h1>
                            <p class="text-white-75">Accede a tu panel de administración con seguridad y rapidez. Este formulario está adaptado al estilo Mazer dentro de tu layout Blade.</p>
                        </div>
                        <div>
                            <p class="mb-2"><strong>Cuenta segura</strong></p>
                            <p class="small text-white-75">Tu sesión estará protegida por las políticas de autenticación de Laravel.</p>
                        </div>
                    </div>
                    <div class="col-md-7 bg-white p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">{{ __('Login') }}</h2>
                            <p class="text-muted">Ingresa tu correo y contraseña para continuar.</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="small">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">{{ __('Login') }}</button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="text-muted small mb-0">¿No tienes cuenta? <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
