@extends('layouts.app')
    <style>
        body {
            background: url('css/blur-background-1.jpg');
            background-size: cover;
        }
    </style>
@section('content')
<div class="container mt-4 box-shadow">
    <div class="row">
        <div class="container expl-container col-sm-4">
            <p class="signup-text">Login</p>
            <p class="signup-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil molestias minima alias error consequatur autem
            </p>
        </div>
        <div class="container sign-container col">
        @if(Session::has('register_success'))
        <div class="mb-5 pb-3">
            <div style="color:blue;">
                {{Session::get('register_success')}}
            </div>
        </div>
        @endif
        @if(Session::has('login-error'))
        <div class="mb-5 pb-3">
            <div style="color:red;">
                {{Session::get('login-error')}}
            </div>
        </div>
        @endif
            <form id="login" method="post" action="{{url('/login')}}">
             {{ csrf_field() }}
                <div class="mb-5 pb-3">
                    <div class="form-group">
                        <label for="email">
                            Email
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required="required">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                        @if (Session::has('login-error-email'))
                            <div class="invalid-feedback">
                                <strong>{{ Session::get('login-error-email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group ">
                        <label for="Password">Password
                            <span class="req">*</span>
                        </label>
                        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required="required">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                        @if (Session::has('login-error-password'))
                            <div class="invalid-feedback">
                                <strong>{{ Session::get('login-error-password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" id="login-submit" class="btn btn-primary">Login</button>
                <span style="padding:10px">or
                    <a id="login-btn" href="{{route('register')}}">Sign up</a>
                </span>
            </form>
        </div>
    </div>
</div>
@endsection