@extends('layouts.admin')

@section('title', 'Categories')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p> The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Categories</li>
          <li class="breadcrumb-item active"><a href="#">List</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('categories.create') }}" class="float-right btn btn-sm btn-primary">Add New</a>
	          	</div>
	            <div class="tile-body">
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Title</th>
	                    <th>Image</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($category) > 0)
	                	@foreach($category as $key => $categories)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td><a href="{{ route('subcategories.index', [$categories->title, $categories->id]) }}" >{{ $categories->title }}</a></td>
	                		<td>
	                			<a target="_blank" href="{{ url('app/category/'.$categories->image_url) }}">
	                				<img style="height: 100px; width: 150px;" class="img-fluid" src="{{ asset('app/category/'.$categories->thumbnail) }}">
	                			</a>
	                		</td>
	                		<td>
			              		<form action="{{ route('categories.destroy', $categories->id) }}" method="post">
					              @csrf
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					              		<a href="{{ route('subcategories.index', [$categories->title, $categories->id]) }}" class="btn btn-warning" type="button">Manage Categories</a>
						                <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-primary" type="button">Edit</a>
					                	<input name="_method" type="hidden" value="DELETE">
					                	<button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</button>
					              </div>
					            </div>
					            </form>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No category added yet. <a href="{{ route('categories.create') }}">Click here to add category</a></td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection