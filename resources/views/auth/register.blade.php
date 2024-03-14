@extends('layouts.app')

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div
  class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-4 col-xxl-3">
        <div class="card mb-0">
          <div class="card-body">
            <a href="/register" class="text-nowrap logo-img text-center d-block py-4 w-100 ">
                <img src="{{ asset('/src/assets/images/logos/logo-kasir.png') }}" width="180"
                    alt="">
            </a>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4 shadow-sm">
                    <input id="name" type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="Nama">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 shadow-sm">
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email"
                        placeholder="Email ">

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
                <div class="mb-4 shadow-sm">
                    <input id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Confirm Password">
                </div>

                <button type="submit" class="btn btn-primary w-100 py-8 fs-6 mb-4 rounded-2">
                    {{ __('Daftar') }}
                </button>

                <div class="d-flex align-items-center justify-content-center">
                    <span class="fw-semibold">Sudah memiliki akun?
                        <a class="px-1"href="{{ route('login') }}">{{ __('Masuk') }}</a></span>
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
