@extends('layouts.admin')

@section('content')
        <style>
        html,
        body,
        #app,
        #main {
            min-height: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        #sidebar,
        #main header {
            display: none !important;
        }

        .page-content,
        .container-fluid,
        .row.g-0.min-vh-100,
        .login-right {
            min-height: 100vh;
            height: 100vh;
        }

        .page-content {
            padding: 0 !important;
        }

        body {
            background: #f4f9ff;
        }

        .login-right {
            background: linear-gradient(135deg, #4353ff 0%, #5c68ff 45%, #7b88ff 100%);
            position: relative;
            overflow: hidden;
            box-sizing: border-box;
            padding: 0 2rem;
        }

        .login-right::after {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.15;
            background-image: radial-gradient(circle at top right, rgba(255,255,255,0.35) 0%, transparent 40%),
                radial-gradient(circle at bottom left, rgba(255,255,255,0.2) 0%, transparent 35%);
        }

        .login-panel {
            max-width: 100%;
            width: 100%;
            padding: 0 2rem;
        }
        @media (min-width: 768px) {
            .auth-left-col {
                flex: 0 0 35%;
                max-width: 35%;
            }

            .auth-right-col {
                flex: 0 0 65%;
                max-width: 65%;
            }
        }

        .mazer-logo {
            width: 48px;
            height: 48px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .mazer-logo-head,
        .mazer-logo-body {
            display: block;
            background-color: #3752ff;
            border-radius: 999px;
        }

        .mazer-logo-head {
            width: 14px;
            height: 14px;
            background-color: #6ea7ff;
        }

        .mazer-logo-body {
            width: 22px;
            height: 10px;
        }
    </style>

    <div class="container-fluid px-0">
        <div class="row g-0 min-vh-100">
            <div class="col-12 col-md-6 auth-left-col d-flex align-items-center justify-content-center py-0 py-md-5">
                <div class="login-panel w-100 px-4 px-sm-5">
                    <div class="mb-5">
                        <a href="{{ url('/') }}" class="text-decoration-none d-inline-flex align-items-center gap-2 mb-4">
                            <span class="mazer-logo">
                                <span class="mazer-logo-head"></span>
                                <span class="mazer-logo-body"></span>
                            </span>
                            <span class="h5 mb-0 fw-semibold" style="color:#3752ff;">Mazer</span>
                        </a>

                        <h1 class="display-5 fw-bold mb-3">Confirm password</h1>
                        <p class="text-muted">Please confirm your password before continuing.</p>
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Confirm Password') }}</button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="text-primary fw-semibold" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <div class="col-md-6 d-none d-md-flex auth-right-col login-right"></div>
        </div>
    </div>
@endsection

