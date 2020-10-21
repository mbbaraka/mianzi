@extends('layouts.admin')

@section('title', 'Subcategories')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> UAFCR</h1>
          <p>Do your best to win full approval in God's sight</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">{{$title}}</li>
          <li class="breadcrumb-item active"><a href="#">Subcategories</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('categories.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	          	</div>
	            <div class="tile-body">
            	<form action="{{ route('subcategories.store') }}" method="post" enctype="multipart/form-data">
            		@csrf
	                <div class="form-group">
	                  <label class="control-label">Title</label>
	                  <input
	                    class="form-control @error('title') is-invalid @enderror"
	                    type="text"
	                    name="title"
	                    value="{{old('title')}}"
	                    placeholder="Enter sub-category Title"
	                  />
	                  @error('title')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>

	                <input type="hidden" name="root" value="{{$id}}">
	                <div class="form-group">
	                  <label class="control-label">Image</label>
	                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
	                  @error('image')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="tile-footer">
		              <button class="btn btn-primary" type="submit">
		                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
		              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('categories.index') }}"
		                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
		              >
		            </div>
            	</form>
            	<br><br>
            	<hr>
            	<h5>List of Categories Under {{$title}}</h5>
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
	                	@if(count($subcategory) > 0)
	                	@foreach($subcategory as $key => $categories)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td>{{ $categories->title }}</td>
	                		<td>
	                			<a target="_blank" href="{{ url('storage/category/'.$categories->image_url) }}">
	                				<img style="height: 100px; width: 150px;" class="img-fluid" src="{{ asset('storage/category/'.$categories->thumbnail) }}">
	                			</a>
	                		</td>
	                		<td>
			              		<form action="{{ route('categories.destroy', $categories->id) }}" method="post">
					              @csrf
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					                	<input name="_method" type="hidden" value="DELETE">
					                	<button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</button>
					              </div>
					            </div>
					            </form>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No subcategory added yet.</td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection