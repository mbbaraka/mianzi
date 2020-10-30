@extends('layouts.admin')

@section('title', 'Products')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p> The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active"><a href="#">List</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="{{ route('products.create') }}" class="float-right btn btn-sm btn-primary">Add New</a>
	          	</div>
	            <div class="tile-body">
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead class="thead-dark">
	                  <tr>
	                    <th>#</th>
	                    <th>Title</th>
	                    <th>Image</th>
	                    <th>Price</th>
	                    <th>Stock</th>
	                    <th>Categories</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($product) > 0)
	                	@foreach($product as $key => $products)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td><a target="_blank" href="{{ url($products->slug.'.html') }}" >{{ $products->title }}</a></td>
	                		<td>
	                			<a target="_blank" href="{{ url('/app/product/'.$products->cover) }}">
	                				<img style="height: 100px; width: 150px;" class="img-fluid" src="{{ asset('/app/product/'.$products->cover) }}">
	                			</a>
	                		</td>
	                		<td>{{ number_format($products->price) }}</td>
	                		<td>{{ $products->qty }}</td>
	                		<td>
	                			@foreach($products->category as $categories)
	                			<span class="badge badge-primary rounded">{{ $categories->title }}</span>
	                			@endforeach
	                		</td>
	                		<td>
			              		<form action="{{ route('products.destroy', $products->id) }}" method="post">
					              @csrf
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					              		<a href="{{ route('product.attribute', $products->id) }}" class="btn btn-warning" type="button">Product Attributes</a>
						                <a href="{{ route('products.edit', $products->id) }}" class="btn btn-primary" type="button">Edit</a>
					                	<input name="_method" type="hidden" value="DELETE">
					                	<button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</button>
					              </div>
					            </div>
					            </form>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No product added yet. <a href="{{ route('products.create') }}">Click here to add product</a></td></tr>
	                	@endif
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
@endsection