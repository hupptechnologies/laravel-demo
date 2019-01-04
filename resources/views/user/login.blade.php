@extends('layouts.app')
@section('title', 'Home')
@section('content')
<!-- Features Section -->
<div class="my-4 row">
	<div class="col-lg-8">
		{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
			<div class="control-group form-group">
              <div class="controls">
              	<?php
                  $emailAttributes = array('class'=>"form-control", 'name'=>"email", 'id'=>"login_email");
                ?>
                {{Form::label('email', 'E-Mail Address')}}
                {{Form::text('email', $value = null, $emailAttributes)}}
              </div>
            <span id="email-err" class="error"></span>
            </div>
	 		<div class="control-group form-group">
              <div class="controls">
              	<?php
                  $passAttributes = array('class'=>"form-control", 'name'=>"password", 'id'=>"login_password");
                ?>
                {{Form::label('password', 'Password')}}
                {{Form::password('password', $passAttributes)}}
              </div>
            <span id="password-err" class="error"></span>
            </div>
            <?php
              $saveAttributes = array('class'=>"btn btn-primary");
            ?>
	 		{{Form::submit('Login', $saveAttributes)}}
	 		<p class="error" id="login-err"></p>
		{{ Form::close() }}
	</div>
</div>
@endsection