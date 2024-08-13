@extends('layouts.master2')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/pages/authentication.css")}}">
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.html" class="brand-logo">
                                    <img src="{{asset("app-assets\images\logo\R.png")}}" alt="">
                                </a>
                                <h4 class="card-title text-center mb-1">مرحبا بك في نشاط معارض داخلي</h4>
                                <p class="card-text text-center mb-2">برجاء ادخال البيانات لتسجيل الدخول</p>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="login-email">البريد الإلكتروني</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="login-password">كلمة المرور</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember-me">تذكرني</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" type="submit" tabindex="4">تسجيل الدخول</button>
                            </form>

                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset("app-assets/js/scripts/pages/auth-login.js")}}"></script>
@endsection