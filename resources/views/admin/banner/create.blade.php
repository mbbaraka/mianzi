@extends('layouts.admin')

@section('title', 'Create Banner')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banner</li>
          <li class="breadcrumb-item active"><a href="#">Create Banner</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="{{ route('banners.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Add New Banner</h3>

	            <form action ="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	@csrf
	              	<div class="form-group">
	                  <label class="control-label">Image</label>
	                  <input
	                    class="form-control @error('image') is-invalid @enderror"
	                    type="file"
	                    name="image"
	                  />
	                  @error('title')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Title</label>
	                  <input
	                    class="form-control @error('title') is-invalid @enderror"
	                    type="text"
	                    name="title"
	                    value="{{old('title')}}"
	                    placeholder="Enter category Title"
	                  />
	                  @error('title')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Sub Title</label>
	                  <input
	                    class="form-control @error('sub_title') is-invalid @enderror"
	                    type="text"
	                    name="sub_title"
	                    value="{{old('sub_title')}}"
	                    placeholder="Enter Sub-Title"
	                  />
	                  @error('sub_title')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Description</label>
	                  <input
	                    class="form-control @error('description') is-invalid @enderror"
	                    type="text"
	                    name="description"
	                    value="{{old('description')}}"
	                    placeholder="Enter Banner Description"
	                  />
	                  @error('description')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Button</label>
	                  <input
	                    class="form-control @error('button') is-invalid @enderror"
	                    type="text"
	                    name="button"
	                    value="{{old('button')}}"
	                    placeholder="Enter Banner Button"
	                  />
	                  @error('button')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Url</label>
	                  <input
	                    class="form-control @error('url') is-invalid @enderror"
	                    type="text"
	                    name="url"
	                    value="{{old('url')}}"
	                    placeholder="Enter Banner Url"
	                  />
	                  @error('url')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="row">
	                	<div class="form-group col-md-6">
		                  <label class="control-label">Type</label>
		                  <select class="form-control" name="type">
		                  	<option value="slider">Slider Banner</option>
		                  	<option value="collection">Collection Banner</option>
		                  </select>
		                  @error('type')
		                  <div class="form-control-feedback text-danger">{{$message}}</div>
		                  @enderror
		                </div>
		                <div class="form-group col-md-6">
		                  <label class="control-label">Status</label>
		                  <select class="form-control" name="status">
		                  	<option value="1">Published</option>
		                  	<option value="0">Unpublished</option>
		                  </select>
		                  @error('status')
		                  <div class="form-control-feedback text-danger">{{$message}}</div>
		                  @enderror
		                </div>
	                </div>
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit">
	                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('banners.index') }}"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	          </div>
	        </div>
	    </div>
@endsection