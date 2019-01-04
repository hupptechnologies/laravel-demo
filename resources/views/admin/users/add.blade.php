@extends('admin.layout.app')
@section('title', 'add user')
@section('content')
<div class="block-header">
    <h2>
        ADD USER
    </h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>USER INFO</h2>
            </div>
            <div class="body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                {!! Form::open(['url' => 'users/create']) !!}
                    <div class="form-group form-float">
                        <div class="form-line">
                            @php
                                $nameAttributes = array('class'=>"form-control", 'name'=>"name", 'id'=>"usersName");
                            @endphp
                            {{Form::text('name', $value = null, $nameAttributes)}}
                            {{Form::label('name', 'Name', ['class'=>'form-label'])}}
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            @php
                                $emailAttributes = array('class'=>"form-control", 'name'=>"email", 'id'=>"usersEmail");
                            @endphp
                            {{Form::text('email', $value = null, $emailAttributes)}}
                            {{Form::label('email', 'Email', ['class'=>'form-label'])}}
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            @php
                                $passAttributes = array('class'=>"form-control", 'name'=>"password", 'id'=>"usersPass");
                            @endphp
                            {{Form::password('password', $passAttributes)}}
                            {{Form::label('password', 'Password', ['class'=>'form-label'])}}
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            @php
                                $confpassAttributes = array('class'=>"form-control", 'name'=>"confPassword", 'id'=>"usersConfPass");
                            @endphp
                            {{Form::password('confirm password', $confpassAttributes)}}
                            {{Form::label('confPassword', 'Confirm Password', ['class'=>'form-label'])}}
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection