@extends('frontend.layouts.index')

@section('title',empty(language('frontend.register.title')) ? language('frontend.register.name') : language('frontend.register.title'))
@section('keywords', language('frontend.register.keywords') )
@section('description',language('frontend.register.description') )


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
                    <div class="account-content">
                        <div class="align-items-center justify-content-center">
                            <div class="login-right">


                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('frontend.cabinet.registerStore') }}" method="POST">
                                    @csrf

                                    <nav class="user-tabs mb-4">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <div class="radio">
                                                    <label for="roles4" style="border-radius: 20px"
                                                           class="nav-link  custom_radio text-uppercase text-center d-block @if(old('roles', $user->roles) == 4) active @endif">
                                                        <input name="roles" type="radio" id="roles4" value="4"
                                                               @if(old('roles', $user->roles) == 4) checked @endif>
                                                        {{ language('frontend.register.freelancer') }}
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <div class="radio">
                                                    <label for="roles3" style="border-radius: 20px"
                                                           class="custom_radio nav-link text-uppercase text-center d-block @if(old('roles', $user->roles) == 3) active @endif">
                                                        <input name="roles" id="roles3" type="radio" value="3"
                                                               @if(old('roles', $user->roles) == 3) checked @endif>
                                                        {{ language('frontend.register.employer') }}
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>

                                        @if($errors->has('roles'))
                                            <div class="error">{{ $errors->first('roles') }}</div>
                                        @endif

                                    </nav>


                                    <div class="from-group__wrapper">
                                        <div class="form-group form-focus">
                                            <input name="name" type="text" class="form-control floating" style="border-radius: 20px"
                                                   value="{{ old('name', $user->name) }}">
                                            <label style="border-radius: 20px"
                                                   class="focus-label">{{ language('frontend.register.your_name') }}</label>
                                            @if($errors->has('name'))
                                                <div class="error text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group form-focus">
                                            <input style="border-radius: 20px" name="email" type="email" class="form-control floating"
                                                   value="{{ old('email', $user->email) }}">
                                            <label style="border-radius: 20px"
                                                   class="focus-label">{{ language('frontend.register.your_email') }}</label>
                                            @if($errors->has('email'))
                                                <div class="error text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="from-group__wrapper">
                                        <div class="form-group form-focus">
                                            <input style="border-radius: 20px" name="password" type="password" class="form-control floating"
                                                   value="">
                                            <label style="border-radius: 20px"
                                                   class="focus-label">{{ language('frontend.register.password') }}</label>
                                            @if($errors->has('password'))
                                                <div class="error text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group form-focus mb-0">
                                            <input name="password_confirmation" type="password" style="border-radius: 20px"
                                                   class="form-control floating" value="">
                                            <label style="border-radius: 20px"
                                                   class="focus-label">{{ language('frontend.register.confirm_password') }}</label>
                                            @if($errors->has('password_confirmation'))
                                                <div
                                                    class="error text-danger">{{ $errors->first('password_confirmation') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                    <button class="btn btn-primary btn-block btn-lg login-btn" style="border-radius: 20px"
                                            type="submit">{{ language('frontend.register.sign_up') }}</button>
                                    <div class="dont-have">
                                        <label class="custom_check">
                                            <input name="agree" type="checkbox" id="remember-me" value="1"
                                                   @if(old('agree', $user->agree) == 1) checked @endif>
                                            <input type="checkbox" name="rem_password">
                                            <span style="border-color: #B34D75" class="checkmark"></span> {!! language('frontend.register.agree') !!}
                                        </label>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6 text-start">
                                            <a class="forgot-link" style="margin-top: 0"
                                               href="{{ route('frontend.forgot.index') }}">{{ language('frontend.register.forgot') }}</a>
                                        </div>
                                        <div
                                            class="col-6 text-end dont-have mt-0 d-flex flex-column">{{ language('frontend.register.already') }}
                                            <a href="{{ route('frontend.login.index') }}">{{ language('frontend.register.sign_in') }}</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->


    </div>
    <!-- /Main Wrapper -->

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
    <script>
        $(".nav-item label").click(function () {
            $(".nav-item label").removeClass('active');
            $(this).addClass('active');
        });
    </script>
@endsection

