@extends('layouts.admin')

@section('title', 'Banners')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banners</li>
          <li class="breadcrumb-item active"><a href="#">List</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('banners.create') }}" class="float-right btn btn-sm btn-primary">Add New</a>
	          	</div>
	            <div class="tile-body">
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Title</th>
	                    <th>Subtitle</th>
	                    <th>Description</th>
	                    <th>Status</th>
	                    <th>Type</th>
	                    <th>Preview</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($banner) > 0)
	                	@foreach($banner as $key => $banners)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td>{{ $banners->title }}</td>
	                		<td>{{ $banners->sub_title }}</td>
	                		<td>{{ $banners->description }}</td>
	                		<td>{{ $banners->status }}</td>
	                		<td>{{ $banners->type }}</td>
	                		<td>
	                			<img src="{{ asset('app/banner/'. $banners->image) }}" style="width: 200px; height: 120px;">
	                		</td>
	                		<td>
			              		<form action="{{ route('banners.destroy', $banners->id) }}" method="post">
					              @csrf
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
						                <a href="{{ route('banners.edit', $banners->id) }}" class="btn btn-primary" type="button">Edit</a>
					                	<input name="_method" type="hidden" value="DELETE">
					                	<button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</button>
					              </div>
					            </div>
					            </form>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No banner added yet. <a href="{{ route('banners.create') }}">Click here to add banner</a></td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection