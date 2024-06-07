@extends('frontend.layouts.index')

@section('title',empty(language('frontend.login.title')) ? language('frontend.login.name') : language('frontend.login.title'))
@section('keywords', language('frontend.login.keywords') )
@section('description',language('frontend.login.description') )


@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="login-header text-center">
                <h3 style="color: #B34D75">{{ language('frontend.register.join_freelance') }}</h3>
                <p>{{ language('frontend.register.text1') }}</p>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <!-- Login Content -->
                    <div class="account-content">
                        <div class="align-items-center justify-content-center">
                            <div class="login-right">

                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul style="margin: 0 0 0 20px;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('frontend.login.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group form-focus">
                                        <input  style="border-radius: 20px" name="email" type="email" class="form-control floating" value="{{ old('name') }}">
                                        <label class="focus-label">{{ language('frontend.login.your_email') }}</label>
                                        @if($errors->has('email'))
                                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group form-focus">
                                        <input  style="border-radius: 20px" name="password" type="password" class="form-control floating" value="" autocomplete="off">
                                        <label class="focus-label">{{ language('frontend.login.password') }}</label>
                                        @if($errors->has('password'))
                                            <div class="error text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group" style="text-align: center">
                                        <label class="custom_check">
                                            <input name="remember" type="checkbox" id="remember-me" value="1">
                                            <span style="border-color: #B34D75" class="checkmark"></span> {{ language('frontend.login.remember_me') }}
                                        </label>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">{{ language('frontend.login.sing_in') }}</button>

                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <a class="forgot-link" href="{{ route('frontend.forgot.index') }}">{{ language('frontend.login.forgot') }}</a>
                                        </div>
                                        <div class="col-6 text-end dont-have">{{ language('frontend.login.new_to_frelance') }} <a href="{{ route('frontend.cabinet.register') }}"> {{ language('frontend.login.sign_up') }}</a></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Content -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

@endsection


@section('CSS')
    <style>
        .account-content {
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.30);
        }

        .from-group__wrapper {
            display: flex;
            gap: 30px;
        }

        .from-group__wrapper .form-group.form-focus {
            width: 50%;
        }
    </style>
@endsection

@section('JS')
@endsection

