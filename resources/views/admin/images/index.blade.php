@extends('admin.layout.app')
@section('title', 'images list')
@section('content')
<div class="block-header">
    <h2>
        IMAGE GALLERY
    </h2>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        @if (\Session::has('success'))
            <div class="alert alert-success">
               <p>{{ \Session::get('success') }}</p>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            <div class="header">
                <h2>
                    UPLOADED IMAGES
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li><a href="{{ url('images/add') }}" class="btn btn-primary">Add</a></li>
                </ul>
            </div>
            <div class="body">
                <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                	@if ($images)
                    	<div class="body table-responsive">
    		                <table class="table table-striped table-hover">
    		                    <thead>
    		                        <tr>
    		                            <th>#</th>
    		                            <th>Title</th>
    		                            <th>Image</th>
    		                            <th>ACTION</th>
    		                        </tr>
    		                    </thead>
    		                    <tbody>
    		                    	@foreach ($images as $key => $image)
    		                    	<tr>
    		                            <td scope="row">{{ $image->id }}</td>
    		                            <td>{{ $image->title }}</td>
    		                            <td><img src="{{ url('public/storage/images/'.$image->name) }}" height="50px"></td>
    		                            <td><a href="{{ url('images/edit/'.$image->id) }}"><i class="material-icons">edit</i></a>&nbsp;
    		                            <a onclick="deleteImage({{ $image->id }})" style="cursor: pointer;"><i class="material-icons">delete</i></a></td>
    		                        </tr>
    		                    	@endforeach
    		                    </tbody>
    		                </table>
    		            	{{ $images->links() }}
    		            </div>
                	@endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	function deleteImage(id)
    {
		swal({
	      	title: "Are you sure?",
	      	text: "Are you sure want to delete this Image?",
	      	icon: "warning",
			type: "warning",
	      	showCancelButton: true,
  			confirmButtonClass: "btn-danger",
  			confirmButtonText: "Delete",
  			closeOnConfirm: false
	    },function(){
	        window.location.href = '{{ url("images/delete") }}/' + id;
	    });
	}
</script>
@endsection