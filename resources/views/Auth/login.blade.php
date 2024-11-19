@extends('layouts.auth.app')
@section('title-apps', 'Login')
@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div class="h-md-450px">
                                        <div class="card-body p-md-8 p-0">
                                            <div class="row">
                                                <div class="col-lg-12 mb-10">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-12 col-8">
                                                            <span class="fs-1 fw-bolder d-block">Hello 👋</span>
                                                            <span class="text-muted">Silahkan Login Sebelum Menggunakan
                                                                Aplikasi</span>
                                                        </div>
                                                        <div class="col-lg-12 col-4 text-end">
                                                            <img class="w-60px d-md-none"
                                                                src="{{ asset('sense') }}/media/logos/logo-comtel-org.png"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div><br><br>
                                                <div class="col-lg-12 mb-15">
                                                    <form class="form w-100" id="kt_sign_in_form"
                                                        action="{{ route('authenticate') }}" method="POST" autocomplete>
                                                        @csrf
                                                        <div class="row">
                                                            <br><br>
                                                            <div class="col-lg-12 mb-3">
                                                                <label
                                                                    class="d-flex align-items-center fs-6 form-label mb-2 mt-2">
                                                                    <span class="required fw-bold">Email</span>
                                                                </label>
                                                                <input type="email" :value="old('email')" required
                                                                    autofocus placeholder="" name="email"
                                                                    class="form-control form-control-solid  @error('email') is-invalid @enderror" />
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <label
                                                                    class="d-flex align-items-center fs-6 form-label mb-2">
                                                                    <span class="required fw-bold">Password</span>
                                                                </label>
                                                                <input type="password" placeholder="******" name="password"
                                                                    required autocomplete="current-password"
                                                                    class="form-control form-control-solid  @error('password') is-invalid @enderror" />
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                @if (session('error'))
                                                                    <div class="col-lg-12 col-8 mt-4">
                                                                        <span class="fs-5 text-danger fw-bolder d-block">
                                                                            {{ session('error') }}
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <button type="submit" id="kt_sign_in_submit"
                                                        class="btn btn-info btn-sm w-100 mb-1">Sign In</button>
                                                    <span class="text-muted fs-7 fw-semibold">Lupa Password ? <a
                                                            href="#!" class="text-info">Reset Password</a></span>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
