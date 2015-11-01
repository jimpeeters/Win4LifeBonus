@extends('layouts.master')

@section('title', 'Home')


@section('content')

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
                        <button type="submit" class="btnBasic" style="margin-right: 15px;">
                            Login
                        </button>
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
                        <button type="submit" class="btnBasic" style="margin-right: 15px;">
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
    <div class="intro-header">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        @if(isset($message))
                            <h1>{{$message}}</h1>
                        @endif

                        <h1>Travel for Life</h1>
                        <h3>Voor de rest van je leven elk jaar op reis!</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#"class="btnCodeIngeven btnBasic">Code ingeven</a>
                            </li>
                            <li>
                                <a href="#" class="btnInstructies btnBasic">Instructies</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Section a -->
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
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
                                <button type="submit" class="btnBasic" style="margin-right: 15px;">
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
                                  border: solid 10px #FEFE01;
                                  margin-top: 15px;

                                }
                              </style>

                              <div id="lot2" class="scratchpad2"></div>
                              <style>
                                .scratchpad2{
                                  width: 300px;
                                  height: 200px;
                                  border: solid 10px #FEFE01;
                                  margin-top: 15px;

                                }
                                
                              </style>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <!-- Section b -->
    <div class="content-section-b" id="sectionB">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Instructies</h2>
                    <p class="lead">Op de voorkant van je biljet kan je een code krassen die je hier kunt valideren! Voer de code in en krab nogmaals een Win for Life biljet. Na het krabben maak je
                    kans om voor de rest van je leven elk jaar gratis op reis te gaan!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="images/krasbiljet.jpg" alt="krasbiljet">
                </div>
            </div>
        </div>
    </div>

    <!-- Section c -->
    @if(isset($winners) && sizeof($winners) >= 1)

            <div class="content-section-c">
                <div class="container">
                    <div class="row">
                        <h1 class="section-heading">Travel for Life Winnaars!</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <h2 class="month">November</h2>
                            @foreach($winners as $winner)
                                @if($winner->winningMonth == 11)
                                    <h3>{{$winner->name}}</h3>
                                    <h4>uit {{$winner->city}}</h4>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-3">
                            <h2 class="month">December</h2>
                            @foreach($winners as $winner)
                                @if($winner->winningMonth == 12)
                                    <h3>{{$winner->name}}</h3>
                                    <h4>uit {{$winner->city}}</h4>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-3">
                            <h2 class="month">Januari</h2>
                            @foreach($winners as $winner)
                                @if($winner->winningMonth == 1)
                                    <h3>{{$winner->name}}</h3>
                                    <h4>uit {{$winner->city}}</h4>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-3">
                            <h2 class="month">Februari</h2>
                            @foreach($winners as $winner)
                                @if($winner->winningMonth == 2)
                                    <h3>{{$winner->name}}</h3>
                                    <h4>uit {{$winner->city}}</h4>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    @endif

@endsection