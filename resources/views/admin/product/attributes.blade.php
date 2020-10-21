@extends('layouts.admin')

@section('title', 'Product Attributes')

@section('breadcrub')
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Product Attributes</li>
          <li class="breadcrumb-item active"><a href="#">Product Attributes</a></li>
        </ul>
      </div>
@endsection
@section('content')

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="{{ route('categories.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Add Product Attributes</h3>
	            <hr>
	            <form action ="{{ route('attribute-product.store') }}" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	@csrf
	                <div class="row">
	                	@foreach($attributes as $attribute)
	                		<div class="col-md-3">
	                			<div class="form-group">
				                  <div class="form-check">
				                    <label class="form-check-label">
				                      <input name="attribute[]" class="form-check-input" type="checkbox"  value="{{ $attribute->id }}" />
				                      {{ $attribute->name }}
				                    </label>
				                  </div>
				                </div>
				                <div class="form-group">
				                	@if(!empty($attribute->values))
					                    <select name="attributeValue[]" id="attributeValue{{ $attribute->id }}" class="form-control @error('attributeValue') is-invalid @enderror" style="width: 100%" disabled>
					                        @foreach($attribute->values as $attr)
					                            <option value="{{ $attr->id }}">{{ $attr->value }}</option>
					                        @endforeach
					                    </select>
					                    @error('attributeValue')
						                  <div class="form-control-feedback text-danger">{{$message}}</div>
						                @enderror
					                @endif
				                </div>
	                		</div>
	                	@endforeach
	                </div>
	                <input type="hidden" name="product_id" value="{{ $id }}">
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit">
	                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('products.index') }}"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	        	<br><br><hr>
	        	<div class="tile-body">
	        		<table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead class="thead-dark">
	                  <tr>
	                    <th>#</th>
	                    <th>Name</th>
	                    <th>Value</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	@if(count($item) > 0)
	                	@foreach($item as $key => $items)
	                	<tr>
	                		<td>{{ $key + 1 }}</td>
	                		<td>{{ $items->attributesValues->attribute->name }}
	                		</td><td>{{ $items->attributesValues->value }}</td>
	                		<td>
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					              		<a onclick="confirm('Are you sure?')" href="{{ route('attribute-product.destroy', $items->id) }}" class="btn btn-danger" type="button">Delete</a>
					              </div>
					            </div>
	                		</td>
	                	</tr>
	                	@endforeach
	                	@else
	                	<tr><td colspan="6" class="text-center">No product attibute value added yet. </td></tr>
	                	@endif
	                </tbody>
	              </table>
	        	</div>
	          </div>
	        </div>
	    </div>
	
@endsection
@section('extra-script')
    <script type="text/javascript">
    	$(document).ready(function () {
            const checkbox = $('input.form-check-input');
            $(checkbox).on('change', function () {
                const attributeId = $(this).val();
                if ($(this).is(':checked')) {
                    $('#attributeValue' + attributeId).attr('disabled', false);
                } else {
                    $('#attributeValue' + attributeId).attr('disabled', true);
                }
            });
        });
    </script>
@endsection