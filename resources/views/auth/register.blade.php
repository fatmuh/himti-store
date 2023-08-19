@extends('layouts.auth.app')

@section('title')
    <title>HIMTI Store - Register</title>
@endsection

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-12 col-lg-8 col-xxl-4">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ route('register') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    <img src="{{ asset('asset/images/himti.png') }}" width="100" alt="">
                </a>
                <p class="text-center">Pesan tiket acara HIMTI disini!</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col mb-3">
                          <label class="form-label">Nama Lengkap</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col mb-3">
                          <label class="form-label">Email</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col mb-3">
                          <label class="form-label">Kata Sandi</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">

                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col mb-3">
                          <label class="form-label">Konfirmasi Kata Sandi</label>
                          <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
                        </div>
                    </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Sudah memiliki akun?</p>
                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Masuk</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
