@extends('admin.layout.app')
@section('title', 'edit user')
@section('content')
<div class="block-header">
    <h2>
        EDIT USER
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
            @if ($userData)
                {!! Form::open(['url' => 'users/update/'.$userData->id]) !!}
                    <div class="form-group form-float">
                        <div class="form-line">
                            @php
                                $nameAttributes = array('class'=>"form-control", 'name'=>"name", 'id'=>"usersName");
                            @endphp
                            {{Form::text('name',$value = $userData->name, $nameAttributes)}}
                            {{Form::label('name', 'Name', ['class'=>'form-label'])}}
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            @php
                                $emailAttributes = array('class'=>"form-control", 'name'=>"email", 'id'=>"usersEmail");
                            @endphp
                            {{Form::text('email',$value = $userData->email, $emailAttributes)}}
                            {{Form::label('email', 'Email', ['class'=>'form-label'])}}
                        </div>
                    </div>
                    <div id="hidden_pass" style="display: none;">
                        <div class="form-group form-float">
                            <div class="form-line">
                                @php
                                    $passAttributes = array('class'=>"form-control", 'name'=>"password", 'id'=>"usersPass");
                                @endphp
                                {{Form::password('password', $passAttributes)}}
                                {{Form::label('password', 'Password', ['class'=>'form-label'])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        @php
                            $checkAttributes = array('name'=>"check", 'id'=>"check");
                        @endphp
                        {{Form::checkbox('check', $value = null,false,$checkAttributes)}}
                        {{Form::label('check', 'Change Password?', ['class'=>'form-label'])}}
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                {!! Form::close() !!}
            @endif
            </div>
        </div>
    </div>
</div>
@endsection