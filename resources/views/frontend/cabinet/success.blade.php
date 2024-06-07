@extends('frontend.layouts.index')

@section('title',empty($data['title']) ? $data['name'] : $data['title'])
@section('keywords', $data['keywords'] )
@section('description', $data['description'] )


@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="account-onborad complte-board back-home" style="box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.30); border-radius: 15px;">
                @if($data['status'] == true)
                    <img width="220" height="30" src="{{ asset('build/website/images/logo.png') }}" alt="{{ language('general.title') }}" class="img-fluid">
                @else
                    <img src="{{ asset('frontend/assets/images/warning.png') }}" class="img-fluid" alt="">
                @endif

                @if($data['status'] == true)
                    <h2>{{ language('frontend.common.success') }}</h2>
                @else
                    <h2>{{ language('frontend.common.error') }}</h2>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa fa-check fa-2x" aria-hidden="true"></i>
                        <ul>
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    </div>
                @endif

                <p>{{ $data['message'] }}</p>

                @if($data['status'] == true)
                    <a href="{{ route('frontend.login.index') }}" style="border-radius: 50px"
                       class="btn btn-primary">{{ language('frontend.register.sign_in') }}</a>
                @else
                    <a href="{{ route('frontend.home.index') }}" style="border-radius: 50px"
                       class="btn btn-primary"> {{ language('frontend.common.back_to_home') }}</a>
                @endif
            </div>
        </div>
    </div>
    <!-- /Page Content -->

@endsection


@section('CSS')
@endsection

@section('JS')
@endsection

