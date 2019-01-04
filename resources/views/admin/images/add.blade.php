@extends('admin.layout.app')
@section('title', 'add image')
@section('content')
<div class="block-header">
    <h2>
        ADD IMAGE
    </h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>IMAGE DETAIL</h2>
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
                {!! Form::open(['url' => 'images/create', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group form-float">
                        <div class="form-line">
                            @php 
                                $nameAttributes = array('class'=>"form-control", 'name'=>"title", 'id'=>"imageTitle");
                            @endphp
                            {{Form::text('imageTitle', $value = null, $nameAttributes)}}
                            {{Form::label('imageTitle', 'Image Title', ['class'=>'form-label'])}}
                        </div>
                    </div>
                    <div class="form-group form-float">
                        @php 
                            $imgAttributes = array('class'=>"form-control", 'name'=>"image", 'id'=>"image"); 
                        @endphp
                        {{Form::label('image', 'Choose Image', ['class'=>'form-label'])}}
                        {{Form::file('image', $value = null, $imgAttributes)}}
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection