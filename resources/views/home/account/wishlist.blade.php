@extends('layouts.app2')

@section('title', 'Wishlist')

@section('content')
 <div class="site__body">
            <div class="page-header">
               <div class="page-header__container container">
                  <div class="page-header__breadcrumb">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                              <a href="index.html">Home</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                              </svg>
                           </li>
                           <li class="breadcrumb-item">
                              <a href="#">Account</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Wish List</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>Wish List</h1>
                  </div>
               </div>
            </div>
            <div class="block">
               <div class="container">
                  <table class="wishlist">
                     <thead class="wishlist__head">
                        <tr class="wishlist__row">
                           <th class="wishlist__column wishlist__column--image">Image</th>
                           <th class="wishlist__column wishlist__column--product">Product</th>
                           <th class="wishlist__column wishlist__column--stock">Stock Status</th>
                           <th class="wishlist__column wishlist__column--price">Price</th>
                           <th class="wishlist__column wishlist__column--tocart"></th>
                           <th class="wishlist__column wishlist__column--remove"></th>
                        </tr>
                     </thead>
                     <tbody class="wishlist__body">
                     	@foreach($wishlist as $wishlists)
                        <tr class="wishlist__row">
                           <td class="wishlist__column wishlist__column--image"><a href="#"><img src="{{ asset('app/product/'.$wishlists->product->cover) }}" alt=""></a></td>
                           <td class="wishlist__column wishlist__column--product">
                              <a href="{{ url($wishlists->product->slug. '.html') }}" class="wishlist__product-name">{{ $wishlists->product->title}}</a>
                              <div class="wishlist__product-rating">
                                 @if(intval(count(($wishlists->product->review)) > 0))
                                    <div class="rating">
                                       <div class="rating__body">
                                          <small style="color: #ffd333; font-size: 10px;">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star-half"></i>
                                         </small>
                                       </div>
                                    </div>
                                    <div class="wishlist__product-rating-legend">{{count($wishlists->product->review)}} Reviews</div>
                                   @else
                                   <div class="product-card__rating-legend">No Reviews Yet</div>
                                   @endif
                              </div>
                           </td>
                           <td class="wishlist__column wishlist__column--stock">
                              <div class="badge badge-success">In Stock</div>
                           </td>
                           <td class="wishlist__column wishlist__column--price">{{ config('shop.symbol').' '.number_format($wishlists->product->sale_price)}}</td>
                           <td class="wishlist__column wishlist__column--tocart">
                           	<form action="{{ route('cart.add', $wishlists->product->id) }}" method= 'post'>
                           	@csrf
                           	<input type="hidden" name="price" value="@if ($wishlists->product->sale_price !="")
                           		{{ $wishlists->product->sale_price }}
                           		@else
                           		{{$wishlists->product->price }}
                           	@endif">
                           	<input type="hidden" name="qty" value="1">
                           	<button type="submit" class="btn btn-primary btn-sm">Add To Cart</button>
                           </form>
                           </td>
                           <td class="wishlist__column wishlist__column--remove">
                              <a href="{{ route('wishlist.destroy', $wishlists->id) }}" class="btn btn-light btn-sm">
                                 <i style="width: 12px; height: 12px;" class="fa fa-times"></i>
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
@endsection