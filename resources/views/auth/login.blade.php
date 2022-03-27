@extends('layouts.app')

@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left"> <img class="img-fluid" src="" alt="">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            {{-- message --}}
                            {!! Toastr::message() !!}
                            <p class="account-subtitle">Access to our dashboard</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        type="text" placeholder="Email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" name="password"
                                        type="password" placeholder="Password" value="{{ old('password') }}" required
                                        autocomplete="password" autofocus>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <div class="text-center forgotpass"><a href="{{ route('forget-password') }}">Forgot
                                    Password?</a>
                            </div>
                            <div class="login-or"> <span class="or-line"></span> <span
                                    class="span-or">or</span> </div>
                            <div class="social-login"> <span>Login with</span> <a href="#" class="facebook"><i
                                        class="fab fa-facebook-f"></i></a><a href="#" class="google"><i
                                        class="fab fa-google"></i></a> </div>
                            <div class="text-center dont-have">Don’t have an account? <a href="/register">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
