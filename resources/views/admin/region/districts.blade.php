@extends('layouts.admin')

@section('title', 'Districts')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">{{$region->name}}</li>
          <li class="breadcrumb-item active"><a href="#">Districts</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('regions.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	          	</div>
	            <div class="tile-body">
            	<form action="{{ route('districts.store') }}" method="post">
            		@csrf
	                <div class="form-group">
	                  <label class="control-label">District</label>
	                  <input
	                    class="form-control @error('name') is-invalid @enderror"
	                    type="text"
	                    name="name"
	                    value="{{old('name')}}"
	                    placeholder="Enter District name"
	                  />
	                  @error('name')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>

	                <input type="hidden" name="region" value="{{$id}}">
	                <div class="tile-footer">
		              <button class="btn btn-primary" type="submit">
		                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
		              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('regions.index') }}"
		                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
		              >
		            </div>
            	</form>
            	<br><br>
            	<hr>
            	<h5>List of Districts Under {{$region->name}}</h5>
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>District</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($district) > 0)
	                	@foreach($district as $key => $districts)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td>{{ $districts->name }}</td>
	                		<td>
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					              		<a href="{{ route('pickupstation.index', $districts->id) }}" class="btn btn-warning" type="button">Manage Pickup Stations</a>
						                <a href="{{ route('districts.edit', $districts->id) }}" class="btn btn-primary" type="button">Edit</a>
					                	<a href="{{ route('districts.delete', $districts->id) }}" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</a>
					              </div>
					            </div>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No district added yet.</td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection