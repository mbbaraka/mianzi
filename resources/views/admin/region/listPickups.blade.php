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
          <li class="breadcrumb-item active"><a href="#">Pickup Stations</a></li>
          <li class="breadcrumb-item active">List</li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <div class="tile-body">
            	<h5>List of Pickup Stations</h5>
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Name</th>
	                    <th>Address</th>
	                    <th>Close To</th>
	                    <th>District</th>
	                    <th>Region</th>
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
	                		<td><a href="{{ route('pickupstation.index', $pickups->district_id) }}">{{ $pickups->district->name}}</a></td>
	                		<td><a href="{{ route('regions.index') }}">{{ $pickups->district->region->name}}</a></td>
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