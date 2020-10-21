@extends('layouts.home')

@section('title', 'Checkout')

@section('content')

@include('layouts.partials.home.header-custom')

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>checkout</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3></div>
                            <div class="theme-form">
                                <div class="row check-out ">

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>First Name</label>
                                        <input type="text" name="field-name" value="{{ $address->customer->first_name }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>Last Name</label>
                                        <input type="text" name="field-name" value="{{ $address->customer->last_name }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Phone</label>
                                        <input type="text" name="field-name" value="{{ $address->phone }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Email Address</label>
                                        <input type="text" name="field-name" value="{{ $address->customer->email }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label class="field-label">Region</label>
                                        <input type="text" name="field-name" value="{{ $address->region->name }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label class="field-label">District</label>
                                        <input type="text" name="field-name" value="{{ $address->district->name }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label class="field-label">Address 1</label>
                                        <input type="text" name="field-name" value="{{ $address->address1 }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label class="field-label">Address 2</label>
                                        <input type="text" name="field-name" value="{{ $address->address2 }}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Note</label>
                                        <input type="text" name="field-name" value="{{ $address->note }}" placeholder="Street address">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="checkbox" name="shipping-option" id="account-option"> &ensp;
                                        <label for="account-option">Create An Account?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                    	@foreach($cart as $items)
                                        <li style="text-transform: capitalize;">{{ $items->name }} × {{ $items->qty }} <span>{{ config('shop.symbol') . number_format($items->price) }}</span></li>
                                        @endforeach
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count">{{ config('shop.symbol') . number_format(ShoppingCart::total()) }}</span></li>
                                        <li>Shipping
                                            <div class="shipping">
                                            	@foreach($shipping as $shipping_methods)
                                                <div class="radio-option">
                                                        <input style="cursor: pointer;" type="radio" name="shipping" id="{{$shipping_methods->id}}" {{ $loop->first ? 'checked="checked"' : ''}}>
                                                        <label for="{{$shipping_methods->id}}">{{ $shipping_methods->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="total">
                                        <li>Total <span class="count">{{ config('shop.symbol') . number_format(ShoppingCart::total()) }}</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-1" checked="checked">
                                                        <label for="payment-1">Check Payments<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="payment-group" id="payment-3">
                                                        <label for="payment-3">PayPal<span class="image"><img src="assets/images/paypal.png" alt=""></span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right"><a href="#" class="btn-normal btn">Place Order</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

@endsection