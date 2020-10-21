@extends('layouts.home')

@section('title', 'Wishlists')

@section('content')

@include('layouts.partials.home.header-custom')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>wishlist</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">{{ Str::random(6) }}</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="wishlist-section section-big-py-space bg-light">
    <div class="custom-container">
    	@if(count($wishlist)>0)
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">availability</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlist as $product)
                    <tr>
                        <td>
                            <a href="#"><img style="width: 70px; height: 90px;" src="{{ asset('storage/product/'.$product->product->cover) }}" alt="product" class="img-fluid  "></a>
                        </td>
                        <td><a href="#">{{ $product->product->title }}</a>
                            <div class="mobile-cart-content row">
                                <div class="col-xs-3">
                                    <p>in stock</p>
                                </div>
                                <div class="col-xs-3">
                                    <h2 class="td-color">{{config('shop.symbol') .' '. number_format($product->product->sale_price) }}</h2></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="#" class="icon mr-1"><i class="ti-close"></i> </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                            <h2>{{config('shop.symbol') .' '. number_format($product->product->sale_price) }}</h2></td>
                        <td>
                            <p>in stock</p>
                        </td>
                        <td><a href="{{ route('wishlist.destroy', $product->id) }}" onclick="confirm('Are you sure?')" class="icon mr-3"><i class="ti-close"></i> </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12"><a href="{{ route('shop') }}" class="btn btn-normal">continue shopping</a> <a href="#" class="btn btn-normal">check out</a></div>
        </div>
        @else
        <div class="row">
        	<span>No product found in wishlist</span>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12"><a href="{{ route('shop') }}" class="btn btn-normal">continue shopping</a> <a href="#" class="btn btn-normal">check out</a></div>
        </div>
        @endif
    </div>
</section>
<!--section end-->
@endsection