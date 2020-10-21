@extends('layouts.admin')

@section('title', 'Edit Category')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Category</li>
          <li class="breadcrumb-item active"><a href="#">Edit Category</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="{{ route('categories.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Edit Category</h3>

	            <form action ="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	@csrf
	              	@method('PUT')
	                <div class="form-group">
	                  <label class="control-label">Title</label>
	                  <input
	                    class="form-control @error('title') is-invalid @enderror"
	                    type="text"
	                    name="title"
	                    value="{{$category->title}}"
	                    placeholder="Enter category Title"
	                  />
	                  @error('title')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                {{-- <div class="form-group">
	                  <label class="control-label">Gender</label>
	                  <div class="form-check">
	                    <label class="form-check-label">
	                      <input
	                        class="form-check-input"
	                        type="radio"
	                        name="gender"
	                      />Male
	                    </label>
	                  </div>
	                  <div class="form-check">
	                    <label class="form-check-label">
	                      <input
	                        class="form-check-input"
	                        type="radio"
	                        name="gender"
	                      />Female
	                    </label>
	                  </div>
	                </div> --}}
	                <div class="form-group">
	                  <label class="control-label">Image</label>
	                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
	                  @error('image')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	               {{--  <div class="form-group">
	                  <div class="form-check">
	                    <label class="form-check-label">
	                      <input class="form-check-input" type="checkbox" />I accept
	                      the terms and conditions
	                    </label>
	                  </div>
	                </div --}}
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit">
	                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('categories.index') }}"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	          </div>
	        </div>
	    </div>
@endsection