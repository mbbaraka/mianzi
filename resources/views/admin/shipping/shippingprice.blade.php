@extends('layouts.admin')

@section('title', 'Shipping Prices')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">{{ $title }}</li>
          <li class="breadcrumb-item active"><a href="#">Shipping Prices</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('shipping.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	          	</div>
	            <div class="tile-body">
	            <br>
            	<form action="{{ route('shippingprice.store') }}" method="post">
            		@csrf
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
	                			<label class="control-label">District:</label>
	                			<select name="station" class="form-control @error('station') is-invalid @enderror">
		                			@foreach($station as $stations)
		                			<option value="{{ $stations->id }}">{{ $stations->name }}</option>
		                			@endforeach
		                		</select>
		                		@error('station')
		                			<div class="form-control-feedback text-danger">{{$message}}</div>
		                		@enderror
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Fee:</label>
			                  <input
			                    class="form-control @error('fee') is-invalid @enderror"
			                    type="text"
			                    name="fee"
			                    value="{{old('fee')}}"
			                    placeholder="Enter Shipping Fee"
			                  />
			                  @error('fee')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                </div>

	                <input type="hidden" name="shipping" value="{{$id}}">
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
            	<h5>List of Shipping Prices Under {{$title}}</h5>
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>District</th>
	                    <th>Fee</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($price) > 0)
	                	@foreach($price as $key => $prices)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td>{{ $prices->district->name }}</td>
	                		<td>{{ config('shop.symbol').' '.number_format($prices->fee) }}</td>
	                		<td>
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					                	<a href="{{ route('shippingprice.delete', $prices->id) }}" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</a>
					              </div>
					            </div>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No price station added yet.</td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection