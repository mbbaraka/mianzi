@extends('layouts.admin')

@section('title', 'Attribute Values')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">{{$title}}</li>
          <li class="breadcrumb-item active"><a href="#">Attribute Values</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('attributes.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	          	</div>
	            <div class="tile-body">
            	<form action="{{ route('value.store') }}" method="post" enctype="multipart/form-data">
            		@csrf
	                <div class="form-group">
	                  <label class="control-label">Value</label>
	                  <input
	                    class="form-control @error('value') is-invalid @enderror"
	                    type="text"
	                    name="value"
	                    value="{{old('value')}}"
	                    placeholder="Enter sub-category Title"
	                  />
	                  @error('value')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>

	                <input type="hidden" name="attribute" value="{{$id}}">
	                <div class="tile-footer">
		              <button class="btn btn-primary" type="submit">
		                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
		              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('attributes.index') }}"
		                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
		              >
		            </div>
            	</form>
            	<br><br>
            	<hr>
            	<h5>List of Values Under {{$title}}</h5>
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Title</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($values) > 0)
	                	@foreach($values as $key => $value)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td>{{ $value->value }}</td>
	                		<td>
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					                	<a href="{{ route('value.destroy', $value->id) }}" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</a>
					              </div>
					            </div>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No attribute value added yet.</td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection