@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

<div class="header bg-primary pt-7 pb-5 pt-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">
                        Welcome to the <strong>newest, most advanced</strong> RuneScape<sup>&reg;</sup> XP Tracking Application on the web.
                    </h1>
                    <hr>
                    <span class="text-secondary">
                        To start, simply add your RuneScape<sup>&reg;</sup> account to our <strong>advanced XP Tracking System</strong>, and we'll do the rest!
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

<div class="container mt--8 py-3">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow-lg border-0">
                <div class="card-body px-lg-5 pb-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>Type your display name in the box below, then press "Start Tracking"</small>
                    </div>
                    <form role="form" method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Type your RuneScape&reg; display name here..." type="text" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-start">Start Tracking <i class="fas fa-chart-line fa-fw"></i></button>
                        </div>

                        <div class="text-center text-muted font-italic mt-4">
                            <small>
                                By adding your RuneScape&reg; Username to our XP Tracking System, you understand and agree to our <a href="#">Privacy Policy</a> & <a href="#">Terms of Service</a>.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="modal fade" id="modal-start" tabindex="-1" role="dialog" aria-labelledby="modal-start" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title" id="modal-title-default">Hold up!</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <p>
                    So here's the deal.. with <em>public accounts</em>, we only update them <strong>once a day</strong>.. and that's <strong>if</strong>
                    you come back and <strong>MANUALLY</strong> refresh your stats. This gives players a way to instantly check stats on the fly, without
                    having to do a lot of work.
                </p>

                <p>
                    What if I told you that you could have your own personal <strong>sophisticated, analytical, artificial inteligent, machine learning
                        platform</strong> with <strong>advanced statistical data reports</strong> about your XP gains? On top of all that... it's
                    <strong>100% FREE!</strong>
                </p>

                <p>
                    Sounds too good to be true, right? <strong>Well it's not!</strong> Since we're the new kid on the block, we need to get the word out
                    about our service so for a <abbr class="initialism" data-toggle="tooltip" title="Idk.. maybe a month or so...">limited time</abbr>,
                    we're opening up our platform to all players for a <strong><abbr data-toggle="tooltip" data-placement="top" title="No.. like for real..">free LIFETIME account</abbr></strong>.
                    But there is one <em>itty bitty</em> catch..
                </p>

                <p>
                    We just ask that you give us a heads up about any typos, bugs, issues, etc that you find while using the application.
                </p>

                <p>
                    Sound good? Cool, then what will it be? Do you want to create an account or nah?
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Let's create that account!</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Nah, I'm okay.</button>
            </div>

            <div class="modal-body py-0 small">
                <p class="text-center text-muted small">
                    <em>
                        You're only getting this message because it's the first time this username has been entered into our system. This message will never show up again for this particular account.
                    </em>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
