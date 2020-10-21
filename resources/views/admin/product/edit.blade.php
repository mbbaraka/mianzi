@extends('layouts.admin')

@section('title', 'Edit Product')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Product</li>
          <li class="breadcrumb-item active"><a href="#">Edit Product</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="{{ route('products.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Edit Product</h3>

	            <form action ="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	@csrf
	              	@method('PUT')
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Title</label>
			                  <input
			                    class="form-control @error('title') is-invalid @enderror"
			                    type="text"
			                    name="title"
			                    value="{{$product->title}}"
			                    placeholder="Enter Product Price"
			                  />
			                  @error('title')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Type</label>
			                  <select name="type" class="form-control @error('type') is-invalid @enderror">
			                  	<option value="Digital">Digital</option>
			                  	<option selected value="Physical">Physical</option>
			                  </select>
			                  @error('type')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Price</label>
			                  <input
			                    class="form-control @error('price') is-invalid @enderror"
			                    type="number"
			                    name="price"
			                    value="{{$product->price}}"
			                    placeholder="UGX ..."
			                  />
			                  @error('price')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Sale Price</label>
			                  <input
			                    class="form-control @error('sale_price') is-invalid @enderror"
			                    type="number"
			                    name="sale_price"
			                    value="{{$product->sale_price}}"
			                    placeholder="UGX ...."
			                  />
			                  @error('sale_price')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Quantity</label>
			                  <input
			                    class="form-control @error('qty') is-invalid @enderror"
			                    type="number"
			                    name="qty"
			                    value="{{$product->qty}}"
			                    placeholder="Quantity"
			                  />
			                  @error('qty')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                	<div class="col-md-6">
	                		<br>
	                		<div class="form-group">
			                  <div class="form-check">
			                    <label class="form-check-label">
			                      <input class="form-check-input" @if($product->featured == '1') checked @endif name="featured" type="checkbox" />Featured
			                    </label>
			                  </div>
			                </div>
	                	</div>
	                </div>
	                <div class="form-group">
	                	<label class="contol-label">Select Categories</label>
	                	<select class="form-control @error('category') is-invalid @enderror" name="category[]" id="select2" multiple="multiple">
							<optgroup label="Select Categories">
								@foreach($categories as $category)
								<option @foreach($product->category as $cat) {{ $cat->id == $category->id ? 'selected' : '' }} @endforeach value="{{ $category->id }}">{{ $category->title }}</option>
								@endforeach

							</optgroup>
						</select>
						@error('category')
		                  <div class="form-control-feedback text-danger">{{$message}}</div>
		                @enderror
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
			                  <label class="control-label">Product Description</label>
			                  <textarea name="description" class="form-control textarea">
			                  	{!!$product->description!!}
			                  </textarea>
			                  @error('description')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Publish Date</label>
			                  <input
			                    class="form-control @error('date') is-invalid @enderror"
			                    type="date"
			                    name="date"
			                    value="{{$product->publish_date}}"
			                    placeholder="Enter Product Price"
			                  />
			                  @error('date')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Status</label>
			                  <select name="status" class="form-control @error('status') is-invalid @enderror">
			                  	<option value="1">Active</option>
			                  	<option value="0">Inactive</option>
			                  </select>
			                  @error('status')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
			                  <label class="control-label">Product Information</label>
			                  <textarea name="information" class="form-control textarea">
			                  	{!! $product->information !!}
			                  </textarea>
			                  @error('information')
			                  <div class="form-control-feedback text-danger">{{$message}}</div>
			                  @enderror
			                </div>
	                	</div>
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
	                <div class="">
	                	<img style="height: 150px; width: 120px" class="img-fluid" src="{{ asset('storage/product/'.$product->cover) }}">
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Cover Image</label>
	                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
	                  @error('image')
	                  <div class="form-control-feedback text-danger">{{$message}}</div>
	                  @enderror
	                </div>
	                <div class="row">
	                	@foreach($image as $images)
	                	<div class="col-md-2">
	                		<img style="height: 128px;" class="img-fluid" src="{{ asset('storage/product/gallery/'.$images->image) }}">
	                		<a onclick="confirm('Are you sure?')" href="{{ route('image.remove', $images->id) }}" class="btn btn-danger btn-block">Remove?</a>
	                	</div>
	                	@endforeach
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Other Image</label>
	                  <input type="file" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple>
	                  @error('images')
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
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('products.index') }}"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	          </div>
	        </div>
	    </div>
@endsection