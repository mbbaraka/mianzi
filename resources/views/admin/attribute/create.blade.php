@extends('layouts.admin')

@section('title', 'Create Attribute')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Attribute</li>
          <li class="breadcrumb-item active"><a href="#">Create Attribute</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="{{ route('attributes.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Add New Attribute</h3>

	            <form action ="{{ route('attributes.store') }}" method="post">
	            <div class="tile-body">
	              	@csrf
	                <div class="form-group">
	                  <label class="control-label">Title</label>
	                  <input
	                    class="form-control @error('name') is-invalid @enderror"
	                    type="text"
	                    name="name"
	                    value="{{old('name')}}"
	                    placeholder="Enter category Title"
	                  />
	                  @error('title')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit">
	                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('attributes.index') }}"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	          </div>
	        </div>
	    </div>

@endsection