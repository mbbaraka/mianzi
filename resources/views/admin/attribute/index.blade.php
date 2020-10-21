@extends('layouts.admin')

@section('title', 'Attributes')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Attributes</li>
          <li class="breadcrumb-item active"><a href="#">List</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('attributes.create') }}" class="float-right btn btn-sm btn-primary">Add New</a>
	          	</div>
	            <div class="tile-body">
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Title</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($attribute) > 0)
	                	@foreach($attribute as $key => $attributes)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td><a href="{{ route('value.index', [$attributes->name, $attributes->id]) }}" >{{ $attributes->name }}</a>
	                		</td>
	                		<td>
			              		<form action="{{ route('attributes.destroy', $attributes->id) }}" method="post">
					              @csrf
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					              		<a href="{{ route('value.index', [$attributes->name, $attributes->id]) }}" class="btn btn-warning" type="button">Manage Attributes</a>
						                <a href="{{ route('attributes.edit', $attributes->id) }}" class="btn btn-primary" type="button">Edit</a>
					                	<input name="_method" type="hidden" value="DELETE">
					                	<button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</button>
					              </div>
					            </div>
					            </form>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No attribute added yet. <a href="{{ route('attributes.create') }}">Click here to add attribute</a></td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection