@extends('admin.layout.app')
@section('title', 'pages list')
@section('content')
<div class="row clearfix">
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
                    PAGES
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li><a href="{{ url('pages/add') }}" class="btn btn-primary">Add</a></li>
                </ul>
            </div>
        	@if (isset($pages))
            <div class="body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PAGE NAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($pages as $key => $page)
                    	<tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->page }}</td>
                            <td><a href="{{ url('pages/edit/'.$page->id) }}"><i class="material-icons">edit</i></a>&nbsp;
                            <a onclick="deletePage({{ $page->id }})" style="cursor: pointer;"><i class="material-icons">delete</i></a></td>
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
            	{{ $pages->links() }}
            </div>
        	@endif
        </div>
    </div>
</div>
<script type="text/javascript">
    function deletePage(id)
    {
        swal({
            title: "Are you sure?",
            text: "Are you sure want to delete this Page?",
            icon: "warning",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        }, function () {
            window.location.href = '{{ url("pages/delete") }}/' + id;
        });
    }
</script>
@endsection