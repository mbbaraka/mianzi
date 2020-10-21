@extends('layouts.home')
@section('title', 'Cart')
@section('content')

@include('layouts.partials.home.header-custom')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>cart</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="cart-section section-big-py-space bg-light">
    @if(count($cart) > 0)
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">action</th>
                        <th scope="col">total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $items)
                    <tr>
                        <td>
                            <a href="{{ url($items->slug.'.html') }}"><img style="height: 90px; width: 70px;" src="{{ asset('storage/product/' . $items->cover) }}" alt="{{ $items->name }}" class=""></a>
                        </td>
                        <td><a href="{{ url($items->slug.'.html') }}">{{ $items->name }}</a>
                            <div class="mobile-cart-content row">
                                <div class="col-xs-3">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number" value="{{ $items->qty }}">
                                            <div class="input-group-append">
						                      <span class="bg-light input-group-text"><i class="fa fa-refresh"></i></span>
						                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <h2 class="td-color">{{ config('shop.symbol') .' '. number_format($items->price) }}</h2></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="{{ route('cart.destroy', $items->__raw_id) }}" class="icon"><i class="ti-close"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                            <h2>{{ config('shop.symbol') .' '. number_format($items->price) }}</h2></td>
                        <td>
                            <div class="qty-box">
                                <form method="post" class="form-inline" action="{{ route('cart.update', $items->__raw_id) }}">
                                	@csrf{{-- 
                                	@method('PUT') --}}
                                	<div class="input-group">
	                                    <input type="number" min="0" name="qty" class="form-control input-number" value="{{ $items->qty }}">
	                                    <div class="input-group-append">
					                      <button type="submit" class="bg-light border-dark input-group-text"><i class="fa fa-refresh"></i></button>
					                    </div>
	                                </div>
                                </form>
                            </div>
                        </td>
                        <td><a href="{{ route('cart.destroy', $items->__raw_id) }}" {{-- onclick="confirm('Are you sure?')" --}} class="icon"><i class="ti-close"></i></a></td>
                        <td>
                            <h2 class="td-color">{{ config('shop.symbol') .' '. number_format($items->qty * $items->price) }}</h2></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                    <tr>
                        <td>total price :</td>
                        <td>
                            <h2>{{ config('shop.symbol') .' '. number_format(ShoppingCart::totalPrice()) }}</h2></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="{{ route('shop') }}" class="btn btn-normal">continue shopping</a> <a href="{{ route('checkout') }}" class="btn btn-normal ml-3">check out</a></div>
        </div>
    </div>
    @else
    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-warning alert-dismissible">
                    <button class="close" data-toggle="close">x</button>
                    <p>No Item in the cart </p>
                </div>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="{{ route('shop') }}" class="btn btn-normal">Go shopping</a></div>
        </div>
    </div>
    @endif
</section>
<!--section end-->
@endsection