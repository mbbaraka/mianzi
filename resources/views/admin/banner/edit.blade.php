@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banner</li>
          <li class="breadcrumb-item active"><a href="#">Edit Banner</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="{{ route('banners.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Edit Banner</h3>

	            <form action ="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	@csrf
	              	@method('PUT')
	              	<div class="form-group">
	                  <label class="control-label">Image</label>
	                  <input
	                    class="form-control @error('image') is-invalid @enderror"
	                    type="file"
	                    name="image"
	                  />
	                  @error('image')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Title</label>
	                  <input
	                    class="form-control @error('title') is-invalid @enderror"
	                    type="text"
	                    name="title"
	                    value="{{ $banner->title }}"
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
	                    value="{{ $banner->sub_title }}"
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
	                    value="{{ $banner->description }}"
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
	                    value="{{ $banner->button }}"
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
	                    value="{{ $banner->url }}"
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
		                  	<option value="slider" @if($banner->type == "slider") selected @endif>Slider Banner</option>
		                  	<option value="collection" @if($banner->type == "collection") selected @endif>Collection Banner</option>
		                  </select>
		                  @error('type')
		                  <div class="form-control-feedback text-danger">{{$message}}</div>
		                  @enderror
		                </div>
		                <div class="form-group col-md-6">
		                  <label class="control-label">Status</label>
		                  <select class="form-control" name="status">
		                  	<option value="1" @if($banner->status == "1") selected @endif>Published</option>
		                  	<option value="0" @if($banner->status == "0") selected @endif>Unpublished</option>
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