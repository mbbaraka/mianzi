@extends('layouts.admin')

@section('title', 'Edit District')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">{{$district->region->name}}</li>
          <li class="breadcrumb-item active"><a href="#">Edit Districts</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('districts.index', $district->id) }}" class="float-right btn btn-sm btn-primary">Back</a>
	          	</div>
	            <div class="tile-body">
            	<form action="{{ route('districts.update', $district->id) }}" method="post">
            		@csrf
	                <div class="form-group">
	                  <label class="control-label">District</label>
	                  <input
	                    class="form-control @error('name') is-invalid @enderror"
	                    type="text"
	                    name="name"
	                    value="{{$district->name}}"
	                    placeholder="Enter District name"
	                  />
	                  @error('name')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>

	                <input type="hidden" name="region" value="{{$district->region_id}}">
	                <div class="tile-footer">
		              <button class="btn btn-primary" type="submit">
		                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
		              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('regions.index') }}"
		                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
		              >
		            </div>
            	</form>
            	
	            </div>
	          </div>
	        </div>
	    </div>
@endsection