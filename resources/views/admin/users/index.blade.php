@extends('admin.layout.app')
@section('title', 'user list')
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
                    USERS
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li><a href="{{ url('users/add') }}" class="btn btn-primary">Add</a></li>
                </ul>
            </div>
        	@if (isset($users))
            <div class="body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($users as $key => $user)
                    	<tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ url('users/edit/'.$user->id) }}"><i class="material-icons">edit</i></a>&nbsp;
                            <a onclick="deleteUser({{ $user->id }})" style="cursor: pointer;"><i class="material-icons">delete</i></a></td>
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
            	{{ $users->links() }}
            </div>
        	@endif
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteUser(id)
    {
        swal({
            title: "Are you sure?",
            text: "Are you sure want to delete this User?",
            icon: "warning",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        },function(){
            window.location.href = '{{ url("users/delete") }}/' + id;
        });
    }
</script>
@endsection