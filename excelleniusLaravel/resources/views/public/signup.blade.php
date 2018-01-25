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
            <p class="signup-text">Sign up</p>
            <p class="signup-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil molestias minima alias error consequatur autem
                explicabo facilis quis rerum veritatis sequi officia dicta magni, necessitatibus nisi quidem accusantium
                officiis esse!</p>
        </div>

        <div class="container sign-container col">
            <form id="signup" method="post" action="{{route('register')}}" data-parsley-validate="" >
            {{ csrf_field() }}
                <div class="mb-5 pb-3">
                    <div class="form-group">
                        <label for="email">Email
                            <span class="req">*</span>
                        </label>
                        <input type="email" name="email" id="email" 
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" data-parsley-type="email" data-parsley-trigger="change" required="" data-parsley-remote-reverse="true"
                        data-parsley-remote-options='{ 
                                "type": "POST",
                                "url": base_url+"/checkingUser", 
                                "dataType": "json", 
                                "data": { "token": "value" } 
                            }'>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="inactive">Jabatan
                            <span class="req">*</span>
                        </label>
                        <select class="form-control" id="jabatan" name="register_as">
                            @foreach($jenis_register as $j)
                                <option value="{{$j->id}}">{{$j->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="Password">Password
                            <span class="req">*</span>
                        </label>
                        <input type="password" name="password" id="password" 
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" data-parsley-trigger="change" required="required"
                        data-parsley-minlength="6">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password
                            <span class="req">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="required" data-parsley-equalto="#password" data-parsley-trigger="change" equired="required" data-parsley-minlength="6">
                    </div>
                </div>
                <button type="submit" id="singup-submit" class="btn btn-primary">Sign up</button>
                <span style="padding:10px">or
                    <a id="login-btn" href="{{route('login')}}">Login</a>
                </span>
            </form>
        </div>
    </div>
</div>
@endsection

