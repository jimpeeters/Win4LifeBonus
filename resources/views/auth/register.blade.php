@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registreren</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

            <div id="registerForm">
                {!! Form::open(array('url' => '/register', 'class' => 'form-horizontal')) !!}
                <ul>
                    <li>
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null ,  array('required','class'=>'form-control','placeholder'=>'Naam')) !!}
                    </li>
                    <li>
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', null , array('required','class'=>'form-control','placeholder'=>'Your email')) !!}
                    </li>
                    <li>
                        {!! Form::label('city', 'City:') !!}
                        {!! Form::text('city', null , array('required','class'=>'form-control','placeholder'=>'City')) !!}
                    </li>
                    <li>
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', null , array('required','class'=>'form-control','placeholder'=>'Password')) !!}
                    </li>
                        {!! Form::label('password Confirmation', 'Password Confirmation:') !!}
                        {!! Form::password('password_confirmation', null , array('required','class'=>'form-control','placeholder'=>'Password Confirmation')) !!}

                    <li>
                        {!! Form::submit('Registreren' , ['class' => 'mainBtn']) !!}
                    </li>
                    @if(isset($validator))
                        {{$validator->messages}}
                    @endif
                </ul>
                {!! Form::close() !!}
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection