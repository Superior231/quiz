@extends('layouts.auth', ['title' => 'Login - Quiz App'])

@section('content')
    <div class="row w-100" style="height: 100svh;">
        <div class="col col-12 col-md-6 col-lg-7 d-flex flex-column justify-content-center" id="hero">
            <a href="{{ route('home') }}" class="gap-2 logo d-flex align-items-center justify-content-start ms-5 text-decoration-none">
                <img src="{{ url('assets/images/logo.png') }}" style="width: 30px; height: auto;" alt="Logo">
                <h4 class="py-0 my-0 text-center text-color fw-bold">Quiz App</h4>
            </a>
            <div class="d-flex justify-content-center">
                <img src="{{ url('assets/images/hero-login.gif') }}" alt="Login"
                    style="width: 80%; height: auto;">
            </div>
        </div>
        <div class="col col-12 col-sm-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center">
            <div class="d-flex flex-column justify-content-between h-100">
                <div class="container d-flex flex-column justify-content-center px-auto px-md-5 h-100">
                    <div class="d-flex flex-column align-items-center">
                        <a href="{{ route('home') }}" class="mb-4 d-flex flex-column align-items-center d-none text-decoration-none" id="logo-mobile">
                            <img src="{{ url('assets/images/logo.png') }}" alt="Logo" style="width: 80px; height: auto;">
                        </a>
                        <h3 class="fw-bold">Sign in</h3>
                        <p>Masuk Aplikasi Quiz</p>
                    </div>
    
                    <form method="POST" action="{{ route('login') }}" class="mt-4 auth">
                        @csrf
    
                        <div class="mb-3 content">
                            <div class="pass-logo">
                                <i class='bx bx-user'></i>
                            </div>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3 content">
                            <div class="pass-logo">
                                <i class='bx bx-lock-alt'></i>
                            </div>
                            <div class="d-flex align-items-center position-relative">
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" style="padding-right: 45px;"
                                    placeholder="Password" required>
                                <div class="showPass d-flex align-items-center justify-content-center position-absolute end-0 h-100"
                                    id="showPass" style="cursor: pointer; width: 50px; border-radius: 0px 10px 10px 0px;"
                                    onclick="showPass()">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </div>
                            </div>
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="gap-1 mt-4 d-grid">
                            <button class="btn btn-primary d-block w-100 fw-semibold" type="submit">Sign In</button>
                            <span class="py-0 mx-auto my-0 text-secondary d-block">or</span>
                            <a href="{{ route('google.redirect') }}" class="btn btn-light border-dark color-dark text-dark rounded-3 w-100 fw-semibold">
                                <img src="{{ url('assets/images/google-icon.png') }}" style="width: 20px;" alt="Google Icon">
                                Login with Google
                            </a>
                        </div>
                        <p class="mt-2 mb-0 text-center text-secondary">
                            Belum Memiliki Akun?
                            <a href="{{ route('register') }}" class="text-decoration-underline text-primary">Daftar</a>
                        </p>
                    </form>
                </div>
                <div class="py-5 footer d-flex justify-content-center" style="height: 20px">
                    <small class="text-secondary">Copyright &copy; {{ date('Y') }}. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>
@endsection
