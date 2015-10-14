@extends('layouts.master')

@section('title', 'Home')


@section('content')

@if(isset($validator))
{{$validator}}
@endif

@if (Auth::check())
<p>User is ingelogd </p>
@endif

<a href="/login">Login</a>
<a href="/logout">Logout</a>
<a href="/register">Register</a>


    <div class="row">
        <div class="col-md-12">
             <div id="logoDiv">
                <img id="logo" src="images/logo.png"></img>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="codeForm">
                    {!! Form::open(array('route' => 'code', 'method' => 'POST')) !!}
                    <ul>
                        <li>
                            {!! Form::text('code', null , array('required','class'=>'form-control','placeholder'=>'Code')) !!}
                            {!! Form::submit('Code toevoegen' , ['class' => 'mainBtn']) !!}
                        </li>
                    </ul>
                    {!! Form::close() !!}

                    @if(isset($message))
                        <p>{{$message}}</p>
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    @endif
            </div>
            <div id="instructions">
                <p>Krab deze code en win!</p>
                <img id="krasbiljet" src="images/krasbiljet.png"></img>
            </div>
        </div>
    </div>

@endsection