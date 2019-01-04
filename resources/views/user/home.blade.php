<?php 
use App\Http\Controllers\User\HomeController;
?>
@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('layouts.header')
<!-- Features Section -->
<div class="container">
	<div class="my-4 row">
		@foreach ($images as $image)
			<div class="col-lg-6">
				<h2 class="my-4">World wonder: {{$image->title}}</h2>
			  	<img class="img-fluid rounded" src="{{url('public/storage/images/'.$image->name)}}" alt="" width="100%">
			  	@if ($login == "true")
				  	@php
					  	$x = new HomeController();
					  	$colour = $x->checkImagesColour($image->img_id);
				  	@endphp
				  	<span id="image-style-{{$image->img_id}}" class="p-2 float-left" onclick="ImageLike('{{$image->img_id}}')" data-id="{{$image->img_id}}" style="color: {{$colour}}">
				      	<i class="fa fa-heart" aria-hidden="true"></i>
				    </span>
			    @else
				    <span id="image-style-{{$image->img_id}}" data-toggle="modal" data-id="{{$image->img_id}}" data-target="#myModal" class="p-2 float-left model-open" onclick="ImageSelect(this)" style="color: gray">
				      	<i class="fa fa-heart" aria-hidden="true"></i>
				    </span>
			    @endif
			    <p id="image-count-{{$image->img_id}}" class="p-2 float-left">{{!empty($image->total_count)?$image->total_count:0}}</p>
			</div>
		@endforeach
	</div>
	<!-- The Modal -->
	<div class="modal" id="myModal" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	      	<h2>Login</h2>
			{{ Form::hidden('image_id', '',array('id' => 'image_id')) }}
	        <button type="button" onclick="loginModelClose()" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      <div class="modal-body">
	       <div class="tab-content" id="myTabContent">
			 	<div class="tab-pane fade show active" id="login_tab" role="tabpanel" aria-labelledby="home-tab">
			 		<div class="control-group form-group">
		              <div class="controls">
		              	<?php $emailAttributes = array('class'=>"form-control",'name'=>"login_email",'id'=>"login_email"); ?>
		                {{Form::label('email', 'E-Mail Address')}}
		                {{Form::text('email',$value = null, $emailAttributes)}}
		              </div>
		            <span id="email-err" class="error"></span>
		            </div>
			 		<div class="control-group form-group">
		              <div class="controls">
		              	<?php $passAttributes = array('class'=>"form-control",'name'=>"login_password",'id'=>"login_password"); ?>
		                {{Form::label('password', 'Password')}}
		                {{Form::password('password', $passAttributes)}}
		              </div>
		            <span id="password-err" class="error"></span>
		            </div>
			 		<button type="button" class="btn btn-primary" onclick="LoginModel()" id="sendMessageButton">Login</button>
			 		<p class="error" id="login-err"></p>
			 		<p>New User !!! <a href="{{url('/register')}}">Register</a> here..</p>

			 	</div>
			</div>
	      </div>

	      <!-- Modal footer -->
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" onclick="loginModelClose()" data-dismiss="modal">Close</button>
	      </div>

	    </div>
	  </div>
</div>
<!-- /.row -->
</div>
@endsection

<script type="text/javascript">

</script>