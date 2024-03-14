@extends('layouts.app')

@section('content')
    <div class="page-wrapper bg-white" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-4 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-4 w-100 ">
                                    <img src="{{ asset('/src/assets/images/logos/logo-kasir.png') }}" width="180"
                                        alt="">
                                </a>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-4 shadow-sm">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4 shadow-sm">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-dark" for="remember">
                                                {{ __('Ingat saya') }}
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-6 mb-4 rounded-2">
                                        {{ __('Masuk') }}
                                    </button>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="fw-semibold">Belum punya akun?
                                            <a class="px-1"href="{{ route('register') }}">{{ __('Daftar') }}</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
@endsection
