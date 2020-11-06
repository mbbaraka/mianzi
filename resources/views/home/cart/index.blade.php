@extends('layouts.app2')

@section('title', 'Cart')

@section('content')
 <div class="site__body">
            <div class="page-header">
               <div class="page-header__container container">
                  <div class="page-header__breadcrumb">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                              <a href="{{ url('/') }}">Home</a> 
                              <i style="width: 6px; height: 9px;" class="fa fa-arrow-right"></i>
                           </li>
                           <li class="breadcrumb-item">
                              <a href="#">Account</a> 
                              <i style="width: 6px; height: 9px;" class="fa fa-arrow-right"></i>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>Shopping Cart</h1>
                  </div>
               </div>
            </div>
            <div class="cart block">
               <div class="container">
               	@if(Auth::guard('customer')->check())
                  @if(Carts::count() > 0)
                  <table class="cart__table cart-table">
                     <thead class="cart-table__head">
                        <tr class="cart-table__row">
                           <th class="cart-table__column cart-table__column--image">Image</th>
                           <th class="cart-table__column cart-table__column--product">Product</th>
                           <th class="cart-table__column cart-table__column--price">Price</th>
                           <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                           <th class="cart-table__column cart-table__column--total">Total</th>
                           <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                     </thead>
                     <tbody class="cart-table__body">
                     	@foreach(Carts::get() as $carts) 
                        <form method="post" action="{{ route('cart.update', $carts->id) }}">
                        @csrf                   	
                        <tr class="cart-table__row">
                           <td class="cart-table__column cart-table__column--image"><a href="{{ url($carts->slug.'.html') }}"><img src="{{ asset('app/product/'. $carts->product->cover) }}" alt="{{$carts->product->title }}"></a></td>
                           <td class="cart-table__column cart-table__column--product">
                              <a href="{{ url($carts->product->slug.'.html') }}" class="cart-table__product-name">{{ $carts->product->title }}</a>
                           </td>
                           <td class="cart-table__column cart-table__column--price" data-title="Price">
	                           {{ config('shop.symbol').' '. number_format($carts->price) }}
                           </td>
                           <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                              <div class="input-number">
                                 <input class="form-control input-number__input" name="qty" type="number" min="1" value="{{$carts->qty}}">
                                 <div class="input-number__add"></div>
                                 <div class="input-number__sub"></div>
                              </div>
                           </td>
                           <td class="cart-table__column cart-table__column--total" data-title="Total">{{ config('shop.symbol').' '. number_format($carts->qty * $carts->price) }}</td>
                           <td class="cart-table__column cart-table__column--remove">
                              <a href="{{ route('cart.destroy', $carts->id) }}" class="btn btn-light btn-sm">
                                 <i style="width: 12px; height: 12px;" class="fa fa-times"></i>
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <div class="cart__actions">
                     <div class="cart__coupon-form"><label for="input-coupon-code" class="sr-only">Password</label> <input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code"> <button class="btn btn-primary" name="coupon">Apply Coupon</button></div>
                     <div class="cart__buttons"><a href="{{ route('shop') }}" class="btn btn-light">Continue Shopping</a> <button class="btn btn-primary cart__update-button" type="submit" name="update">Update Cart</button></div>
                  </div>
               </form>
                  <div class="row justify-content-end pt-5">
                     <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="card">
                           <div class="card-body">
                              <h3 class="card-title">Cart Totals</h3>
                              <table class="cart__totals">
                                 <thead class="cart__totals-header">
                                    <tr>
                                       <th>Subtotal</th>
                                       <td>{{ config('shop.symbol').' '. number_format(Carts::subtotal()) }}</td>
                                    </tr>
                                 </thead>
                              </table>
                              <a class="btn btn-primary btn-xl btn-block cart__checkout-button" href="{{ route('checkout') }}">Proceed to checkout</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @else
                  	<span>No Item in Cart. <a href="{{ route('shop') }}">Shop Now</a></span>
                  @endif
                @else
                  @if(count(ShoppingCart::all()) > 0)
                  <table class="cart__table cart-table">
                     <thead class="cart-table__head">
                        <tr class="cart-table__row">
                           <th class="cart-table__column cart-table__column--image">Image</th>
                           <th class="cart-table__column cart-table__column--product">Product</th>
                           <th class="cart-table__column cart-table__column--price">Price</th>
                           <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                           <th class="cart-table__column cart-table__column--total">Total</th>
                           <th class="cart-table__column cart-table__column--remove"></th>
                           <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                     </thead>
                     <tbody class="cart-table__body">   
                     	@foreach(ShoppingCart::all() as $carts )                           
                        <form method="post" action="{{ route('cart.update', $carts->__raw_id) }}">
                        @csrf                                     	
                        <tr class="cart-table__row">
                           <td class="cart-table__column cart-table__column--image"><a href="#"><img src="{{ asset('app/product/'. $carts->cover) }}" alt="{{$carts->name }}"></a></td>
                           <td class="cart-table__column cart-table__column--product">
                              <a href="{{ url($carts->slug.'.html') }}" class="cart-table__product-name">{{ $carts->name }}</a>
                           </td>
                           <td class="cart-table__column cart-table__column--price" data-title="Price">
	                           {{ config('shop.symbol').' '. number_format($carts->price) }}
                           </td>
                           <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                              <div class="input-number">
                                 <input class="form-control input-number__input" name="qty" type="number" min="1" value="{{$carts->qty}}">
                                 <div class="input-number__add"></div>
                                 <div class="input-number__sub"></div>
                              </div>
                           </td>
                           <td class="cart-table__column cart-table__column--total" data-title="Total">{{ config('shop.symbol').' '. number_format($carts->qty * $carts->price) }}</td>
                           <td class="cart-table__column cart-table__column--remove">
                              <a href="{{ route('cart.destroy', $carts->__raw_id) }}" class="btn btn-light btn-sm">
                                 <i style="width: 12px; height: 12px;" class="fa fa-times"></i>
                              </a>
                           </td>
                           <td class="cart-table__column cart-table__column--remove">
                              {{-- <a href="{{ route('cart.destroy', $carts->__raw_id) }}" class="btn btn-light btn-sm">
                                 <i style="width: 12px; height: 12px;" class="fa fa-recycle"></i>
                              </a> --}}
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <div class="cart__actions">
                     <div class="cart__coupon-form"><input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code"> <button type="submit" class="btn btn-primary">Apply Coupon</button></div>
                     <div class="cart__buttons"><a href="{{ route('shop') }}" class="btn btn-light">Continue Shopping</a> <button class="btn btn-primary cart__update-button" type="submit" name="update">Update Cart</button></div>
                  </div>
               </form>
                  <div class="row justify-content-end pt-5">
                     <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="card">
                           <div class="card-body">
                              <h3 class="card-title">Cart Totals</h3>
                              <table class="cart__totals">
                                 <thead class="cart__totals-header">
                                    <tr>
                                       <th>Subtotal</th>
                                       <td>{{ config('shop.symbol').' '. number_format(ShoppingCart::totalPrice()) }}</td>
                                    </tr>
                                 </thead>
                              </table>
                              <a class="btn btn-primary btn-xl btn-block cart__checkout-button" href="{{ route('checkout') }}">Proceed to checkout</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @else
                     <span>No Item in Cart. <a href="{{ route('shop') }}">Shop Now?</a></span>
                  @endif
                @endif
               </div>
            </div>
         </div>
@endsection