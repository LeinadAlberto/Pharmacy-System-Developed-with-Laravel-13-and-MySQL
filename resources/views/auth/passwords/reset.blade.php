@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center py-5">
    <div class="row justify-content-center w-100">
        <div class="col-xl-8 col-lg-10">
            <div class="row g-0 shadow-lg rounded overflow-hidden">
                <div class="col-md-5 d-none d-md-flex bg-primary text-white flex-column justify-content-center p-5">
                    <div class="mb-4">
                        <h1 class="display-6 fw-bold">Nueva contraseña</h1>
                        <p class="text-white-75">Introduce una nueva contraseña segura para completar el restablecimiento de tu cuenta.</p>
                    </div>
                    <div>
                        <p class="mb-2"><strong>Protege tu acceso</strong></p>
                        <p class="small text-white-75">Asegúrate de escoger una contraseña fuerte y no compartirla con nadie.</p>
                    </div>
                </div>
                <div class="col-md-7 bg-white p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">{{ __('Reset Password') }}</h2>
                        <p class="text-muted">Completa los campos para actualizar tu contraseña.</p>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Reset Password') }}</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p class="text-muted small mb-0">¿Ya recuerda su contraseña? <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
