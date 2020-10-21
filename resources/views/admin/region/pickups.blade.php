@extends('layouts.admin')

@section('title', 'Pickup Stations')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">{{$district->name}}</li>
          <li class="breadcrumb-item active"><a href="#">Pickup Stations</a></li>
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
            	<form action="{{ route('pickupstation.store') }}" method="post">
            		@csrf
	                <div class="form-group">
	                  <label class="control-label">Name</label>
	                  <input
	                    class="form-control @error('name') is-invalid @enderror"
	                    type="text"
	                    name="name"
	                    value="{{old('name')}}"
	                    placeholder="Enter Station name"
	                  />
	                  @error('name')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>

	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Address:</label>
			                  <input
			                    class="form-control @error('address') is-invalid @enderror"
			                    type="text"
			                    name="address"
			                    value="{{old('address')}}"
			                    placeholder="Enter Address name"
			                  />
			                  @error('address')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
		                <div class="col-md-6">
		                	<div class="form-group">
			                  <label class="control-label">Close To:</label>
			                  <input
			                    class="form-control @error('close_to') is-invalid @enderror"
			                    type="text"
			                    name="close_to"
			                    value="{{old('close_to')}}"
			                    placeholder="Enter Close to"
			                  />
			                  @error('close_to')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
		                </div>
	                </div>

	                <input type="hidden" name="district" value="{{$id}}">
	                <div class="tile-footer">
		              <button class="btn btn-primary" type="submit">
		                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
		              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('districts.index', $id) }}"
		                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
		              >
		            </div>
            	</form>
            	<br><br>
            	<hr>
            	<h5>List of Pickup Stations Under {{$district->name}}</h5>
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Name</th>
	                    <th>Address</th>
	                    <th>Close To</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($pickup) > 0)
	                	@foreach($pickup as $key => $pickups)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td>{{ $pickups->name }}</td>
	                		<td>{{ $pickups->address }}</td>
	                		<td>{{ $pickups->close_to }}</td>
	                		<td>
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					                	<a href="{{ route('pickupstation.delete', $pickups->id) }}" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</a>
					              </div>
					            </div>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No pickup station added yet.</td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection