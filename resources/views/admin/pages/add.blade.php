 @extends('admin.layout.app')
@section('title', 'add page')
@section('content')
<div class="block-header">
    <h2>
        ADD PAGE
    </h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>PAGE INFO</h2>
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
                {!! Form::open(['url' => 'pages/create', 'method' => 'post', 'files' => true]) !!}
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
                        @php
                            $imgAttributes = array('class'=>"form-control", 'name'=>"pageImage", 'id'=>"image");
                        @endphp
                        {{Form::label('image', 'Choose Image', ['class'=>'form-label'])}}
                        {{Form::file('pageImage', $value = null, $imgAttributes)}}
                    </div>
                    <div class="form-group form-float">
                        @php
                            $discAttributes = array('class'=>"form-control",'name'=>"disc",'id'=>"ckeditor");
                        @endphp
                        {{Form::label('name', 'Page Description', ['class'=>'form-label'])}}
                        {{Form::textarea('name',$value = null, $discAttributes)}}
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection