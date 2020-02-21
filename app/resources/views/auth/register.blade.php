@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

<div class="header bg-primary pt-7 pb-5 pt-lg-8 pb-lg-6">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">
                        Create your {{config('app.name')}} account
                    </h1>
                    <hr>
                    <span class="text-secondary">
                        Welcome to the {{config('app.name')}} Club!
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-5">
                    <div class="text-center mt-2 mb-4 small">You can create an account with</div>
                    <div class="row text-center">
                        <div class="col-12 col-sm-5 text-sm-right">
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-2 py-2 pt-sm-2">
                            <span class="text-muted text-center small">or</span>
                        </div>
                        <div class="col-12 col-sm-5 text-sm-left">
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center mb-4 small">
                        ...or you can sign up with an email address.
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!</strong> The following error(s) occured:
                        <div>
                            @foreach($errors->all() as $error)
                            <strong>{{ $error }}</strong><br>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <form role="form" method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{config('app.name')}} Username" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="runegeek-username">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at fa-fw"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" type="email" name="email" value="{{ old('email') }}" required autocomplete="runegeek-email">
                            </div>
                        </div>
                        @if(count($errors) == 0)
                        <p class="text-warning text-center small mb-4">
                            Do <strong>NOT</strong> use the same password as your RuneScape&reg; account!
                        </p>
                        @endif
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key fa-fw"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{config('app.name')}} Password" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key fa-fw"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Confirm Your Password" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox ml-2 ml-md-3 mb-2">
                                    <input class="custom-control-input{{ $errors->has('checkLegal') ? ' is-invalid' : '' }}" id="checkLegal" name="checkLegal" type="checkbox">
                                    <label class="custom-control-label" for="checkLegal">
                                        <span class="small text-muted{{ $errors->has('checkLegal') ? ' is-invalid' : '' }}">I agree with the <a href="#!">Privacy Policy</a> & <a href="#">Terms of Service</a></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox ml-2 ml-md-3">
                                    <input class="custom-control-input{{ $errors->has('checkPassword') ? ' is-invalid' : '' }}" id="checkPassword" name="checkPassword" type="checkbox">
                                    <label class="custom-control-label" for="checkPassword">
                                        <span class="small text-muted{{ $errors->has('checkPassword') ? ' is-invalid' : '' }}">I did <strong>NOT</strong> use the same password as I use on my RuneScape&reg; account.</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                        </div>

                        <div class="text-center text-muted font-italic mt-4">
                            <small>
                                We take security and privacy extremely seriously. We will <strong>never</strong> share your personal account details (email, password, etc) with any third party.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
