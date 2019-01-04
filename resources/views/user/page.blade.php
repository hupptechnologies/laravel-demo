@extends('layouts.app')
@section('title', $pageDetail->page)
@section('content')
<!-- Features Section -->
<div class="container">
  <div class="row">
    <div class="col-sm-12 m-3">
      <h1>{{ $pageDetail->page }}</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
    	<div class="col-sm-12">
    		<img src="{{ url('public/storage/page_image/'.$pageDetail->page_image) }}" width="100%">
    	</div>
    </div>
    <div class="col-sm-6">
      <div class="col-sm-12">
      {!! $pageDetail->disc !!}
      </div>
    </div>
  </div>
</div>
@endsection