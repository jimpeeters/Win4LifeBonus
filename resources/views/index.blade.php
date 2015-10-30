@extends('layouts.master')

@section('title', 'Home')


@section('content')
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="/"><img id="navLogo" src="images/logo.png" alt=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a type="button" data-toggle="modal" data-target="#login-modal">Inloggen</a>
                    </li>
                    <li>
                        <a href="/auth/logout">Uitloggen</a>
                    </li>
                    <li>
                        <a type="button" data-toggle="modal" data-target="#register-modal">Registreer</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <!-- Inlog modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Login
                        </button>

                        <a href="/password/email">Forgot Your Password?</a>
                    </div>
                </div>

                 @if (session()->has('loginFail'))
                    <div class="alert alert-danger">
                        <ul class="validationError">
                            <li>De opgegeven combinatie van username en wachtwoord bestaat niet!</li>
                        </ul>
                    </div>
                @endif
            </form>
        </div>
      </div>
    </div>

  <!-- Register modal -->



    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">


            <form class="form-horizontal" method="POST" action="/register">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label class="col-md-4 control-label">Naam</label>
                    <div class="col-md-6">
                         <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Naam" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Email</label>
                    <div class="col-md-6">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Stad</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="Stad" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Paswoord</label>
                    <div class="col-md-6">
                        <input class="form-control" type="password" name="password" placeholder="Paswoord" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Bevestig Paswoord</label>
                    <div class="col-md-6">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Bevestiging paswoord" required> 
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Registreer
                        </button>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="validationError">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>

                   
            </div>
        </div>
      </div>
    </div>



    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        @if(isset($message))
                            <h1>{{$message}}</h1>
                        @endif

                        <h1>Doe mee en win!</h1>
                        <h3>Maak kans op een reis</h3>
                         @if(isset(Auth::user()->name))
                            <h3 id="welcomeTitle">Welkom {{Auth::user()->name}}</h3>
                         @endif
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a type="button" class="btn btn-default btn-lg  btnCodeIngeven"><span class="network-name">Code ingeven</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg btnInstructies"> <span class="network-name">Instructies</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Geef hier je code in :</h2>
                    <form class="form-horizontal" role="form" method="POST" action="/code">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Code</label>
                            <div class="col-md-6">
                                <input placeholder="code" type="text" class="form-control" name="code" value="{{ old('code') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Activeer code !
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(isset($wrongcodeMessage))
                        <p class="errorMsg">{{$wrongcodeMessage}}</p>
                    @endif
                    @if(isset($usedcodeMessage))
                        <p class="errorMsg">{{$usedcodeMessage}}</p>
                    @endif
                   
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    @if(isset($lotteryImg))
                        <h3>Krab je lot !</h3>

                              <div id="lot1" class="scratchpad1"></div>
                              <style>
                                .scratchpad1{
                                  width: 200px;
                                  height: 100px;
                                  border: solid 2px #ffffff;
                                  margin-top: 15px;

                                }
                              </style>

                              <div id="lot2" class="scratchpad2"></div>
                              <style>
                                .scratchpad2{
                                  width: 300px;
                                  height: 200px;
                                  border: solid 2px #ffffff;
                                  margin-top: 15px;

                                }
                                
                              </style>
                    @endif

                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b" id="sectionB">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Instructies</h2>
                    <p class="lead">Op de voorkant van je biljet kan je een code krassen die je hier kunt valideren!Voer de code in en krab nogmaals een Win for Life biljet. Na het krabben maak je
                    kans om op het einde van de maand geselecteerd te worden als winnaar!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="images/krasbiljet.jpg" alt="krasbiljet">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <h2 class="section-heading">Winnaars</h2>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <h3>November</h3>
                </div>
                <div class="col-lg-3">
                    <h3>December</h3>
                </div>
                <div class="col-lg-3">
                    <h3>Januari</h3>
                </div>
                <div class="col-lg-3">
                    <h3>Februari</h3>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright text-muted small">Win for Life &copy; Jim Peeters</p>
                </div>
            </div>
        </div>
    </footer>

@endsection