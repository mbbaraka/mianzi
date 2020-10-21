@extends('layouts.admin')

@section('title')
	Roles
@endsection
@section('breadcrub')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active"><a href="#">Lists</a></li>
        </ul>
      </div>
@endsection

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="">
                            <h3>Roles</h3>
                            <a href="{{route('roles.create')}}" class="btn btn-success btn-sm float-right">Add New</a>
                        </div>
                        <div class="tile-body">
                            <table class="table table-hover table-responsive-sm" id="sampleTable">
                                <thead>
                                    <tr>
                                    	<th>Id</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($roles as $row)
                                    <tr>
                                    	<td>{{ $row->id }}</td>
                                    	<td>{{ $row->name }}</td>
                                        <td>
                                            @foreach($row->permissions()->pluck('name') as $permission)
                                                {{ $permission }},
                                            @endforeach
                                        </td>
                                    	<td>
                                            <div style="display:flex;">
                                                <a href="{{route('roles.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                    &nbsp;
                                                <form id="delete_form{{$row->id}}" method="POST" action="{{ route('roles.destroy',$row->id) }}" onclick="return confirm('Are you sure?')">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                </form>
                                            </div>
                                    	</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection
