@extends('layouts.app2')

@section('title', Str::ucfirst($product->title))

@section('content')
<div class="site__body">
            <div class="page-header">
               <div class="page-header__container container">
                  <div class="page-header__breadcrumb">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                              <a href="{{ url('/') }}">Home</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item">
                              <a href="{{ route('shop') }}">Products</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <div class="block">
               <div class="container">
                  <div class="product product--layout--standard" data-layout="standard">
                     <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                           <div class="product-gallery">
                              <div class="product-gallery__featured">
                                 <div class="owl-carousel" id="product-image"> 
                                 	@foreach($image as $images)                                	
                                 	<a href="images/products/product-16.html" target="_blank">
                                 		<img style="width: 491px; height: 491px" src="{{ asset('storage/product/gallery/'.$images->image) }}" alt=""> 
                                 	</a>
                                 	@endforeach
                                 </div>
                              </div>
                              <div class="product-gallery__carousel">
                                 <div class="owl-carousel" id="product-carousel">
                                 	@foreach($image as $images)
                                 	<a href="#" class="product-gallery__carousel-item">
                                 		<img style="width: 75px; height: 75px;" class="product-gallery__carousel-image" src="{{ asset('storage/product/gallery/'.$images->image) }}" alt=""> 
                                 	</a>
                                 	@endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- .product__gallery / end --><!-- .product__info -->
                        <div class="product__info">
                           <div class="product__wishlist-compare">
                              <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                                 <i style="width: 16px; height: 16px;" class="fa fa-heart"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                                 <i style="width: 16px; height: 16px;" class="fa fa-exchange-alt"></i>
                              </button>
                           </div>
                           <h1 class="product__name">{{ $product->title }}</h1>
                           <div class="product__rating">
                              @if(intval(count(($product->review)) > 0))
                              <div class="product__rating-stars">
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
                              </div>
                              <div class="product__rating-legend"><a href="#">{{count($product->review)}} Reviews</a><span>/</span><a href="#">Write A Review</a></div>
                              @else
                              <div class="product-card__rating-legend">No Reviews Yet</div>
                              @endif
                           </div>
                           <div class="product__description">
                           	{!! Str::limit($product->description, 300, '...') !!}
                           </div>
                           <ul class="product__features">
                              {{-- <li>Speed: 750 RPM</li>
                              <li>Power Source: Cordless-Electric</li>
                              <li>Battery Cell Type: Lithium</li>
                              <li>Voltage: 20 Volts</li>
                              <li>Battery Capacity: 2 Ah</li> --}}
                           </ul>
                           <ul class="product__meta">
                              <li class="product__meta-availability">Availability: 
                                 @if(intval($product->qty) > 0)
                                 <span class="text-success">In Stock</span>
                                 @else
                                 <span class="text-danger">Out of Stock</span>
                                 @endif
                              </li>
                              <li>Brand: <a href="#">Wakita</a></li>
                              <li>SKU: {{ $product->sku }}</li>
                           </ul>
                        </div>
                        <!-- .product__info / end --><!-- .product__sidebar -->
                        <div class="product__sidebar">
                           <div class="product__availability">Availability: 
                              @if(intval($product->qty) > 0)
                              <span class="text-success">In Stock</span>
                              @else
                              <span class="text-danger">Out of Stock</span>
                              @endif
                           </div>
                           <div class="product__prices">
                           	<span class="text-muted" style="text-decoration: line-through;"><small>{{ config('shop.symbol').' '.number_format($product->price)}}</small></span>
	                        <span>{{ config('shop.symbol').' '.number_format($product->sale_price)}}</span>
                           </div>
                           <!-- .product__options -->
                           <form class="product__options" action="{{ route('cart.add', $product->id) }}" method= 'post'>
                           	@csrf
                              @if(count($attributes)>0)
                              <div class="form-group product__option row">
                              	@foreach($attributes as $attr)
                                 <div class="col-md-4">
                                 	<label class="product__option-label">{{ $attr->attributesValues->attribute->name }}</label>
	                                 <div class="input-radio-label">
	                                    <div class="input-radio-label__list">
	                                    	<label>
	                                    		<span>{{ $attr->attributesValues->value }}</span>
	                                    	</label>
	                                    </div>
	                                 </div>
                                 </div>
                                 @endforeach
                              </div>
                              @endif
                              <div class="form-group product__option">
                                 <label class="product__option-label" for="product-quantity">Quantity</label>
                                 <div class="product__actions">
                                    <div class="product__actions-item">
                                       <div class="input-number product__quantity">
                                          <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1" name="qty">
                                          <div class="input-number__add"></div>
                                          <div class="input-number__sub"></div>
                                       </div>
                                    </div>
                                    <input type="hidden" name="price" value="@if ($product->sale_price != "")
                                       {{ $product->sale_price }}
                                    @else {{ $product->price }} @endif">
                                    <div class="product__actions-item product__actions-item--addtocart"><button class="btn btn-primary btn-lg" type="submit">Add to cart</button></div>
                                    <div class="product__actions-item product__actions-item--wishlist">
                                       <a href="{{ route('add-to-wishlist',  $product->id) }}" class="btn btn-secondary btn-lg" data-toggle="tooltip" title="Wishlist">
                                          <i style="width: 16px; height: 16px;" class="fas fa-heart"></i>
                                       </a>
                                    </div>
                                    <div class="product__actions-item product__actions-item--compare">
                                       <a href="{{ route('add-to-compare', $product->id) }}" class="btn btn-secondary btn-lg" data-toggle="tooltip" title="Compare">
                                          <i style="width: 16px; height: 16px;" class="fas fa-exchange-alt"></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <br>
                           <span class="text-muted small">Shipped between {{date('d M, Y', strtotime("+4 days")).' and '. date('d M, Y', strtotime("+6 days"))}}</span>
                           <!-- .product__options / end -->
                        </div>
                        <!-- .product__end -->
                        <div class="product__footer">
                           <div class="product__tags tags">
                              <div class="tags__list">
                              	@foreach($product->category as $categories)
                              	<a href="{{ url('category/'.$categories->slug. '.html') }}">{{ $categories->title }}</a> 
                              	@endforeach
                              </div>
                           </div>
                           <div class="product__share-links share-links">
                              <ul class="share-links__list">
                                 <li class="share-links__item share-links__item--type--like"><a href="#">Like</a></li>
                                 <li class="share-links__item share-links__item--type--tweet"><a href="#">Tweet</a></li>
                                 <li class="share-links__item share-links__item--type--pin"><a href="#">Pin It</a></li>
                                 <li class="share-links__item share-links__item--type--counter"><a href="#">4K</a></li>
                              </ul>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <div class="product-tabs">
                     <div class="product-tabs__list">
                        <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a> <a href="#tab-specification" class="product-tabs__item">Specification</a> 
                        @if(Auth::guard('customer')->check())                        
                        <a href="#tab-reviews" class="product-tabs__item">Reviews</a>
                        @endif
                     </div>
                     <div class="product-tabs__content">
                        <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                           <div class="typography">
                              {!! $product->description !!}
                           </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-specification">
                           <div class="spec">
                              {!! $product->information !!}
                           </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-reviews">
                           <div class="reviews-view">
                              <div class="reviews-view__list">
                                 <h3 class="reviews-view__header">Customer Reviews</h3>
                                 <div class="reviews-list">
                                 	@if(count($review) > 0)
                                    <ol class="reviews-list__content">
                                       @foreach($review as $reviews)
                                       <li class="reviews-list__item">
                                          <div class="review">
                                             <div class="review__avatar"><img src="{{ asset('frontend/stroyka/images/avatars/avatar-1.jpg') }}" alt=""></div>
                                             <div class="review__content">
                                                <div class="review__author">{{ $reviews->customer->first_name. ' ' .$reviews->customer->last_name}}</div>
                                                <div class="review__rating">
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
                                                </div>
                                                <div class="review__text">
                                                	{{ $reviews->review }}
                                                </div>
                                                <div class="review__date">{{ date('d M, Y', strtotime($reviews->created_at)) }}</div>
                                             </div>
                                          </div>
                                       </li>
                                       @endforeach
                                    </ol>
                                    <div class="reviews-list__pagination">
                                       <ul class="pagination justify-content-center">
                                          {{ $review->links() }}
                                       </ul>
                                    </div>
                                    @else
                                    <div class="review_text">
                                    	<span>No reviews yet</span>
                                    </div>
                                    @endif
                                 </div>
                              </div>
                              <form class="reviews-view__form" method="post" action="{{ route('review.add') }}">
                              	@csrf
                                 <h3 class="reviews-view__header">Write A Review</h3>
                                 <div class="row">
                                    <div class="col-12 col-lg-9 col-xl-8">
                                       <div class="form-row">
                                          <div class="form-group col-md-4">
                                             <label for="review-stars">Review Stars</label> 
                                             <select id="review-stars" class="form-control" name="rating">
                                                <option value="5">5 Stars Rating</option>
                                                <option value="4">4 Stars Rating</option>
                                                <option value="3">3 Stars Rating</option>
                                                <option value="2">2 Stars Rating</option>
                                                <option value="1">1 Stars Rating</option>
                                             </select>
                                             <span>5 - Maximam, 1 - Minimum</span>
                                          </div>
                                       </div>
                                       <input type="hidden" name="product_id" value="{{$product->id}}">
                                       <div class="form-group"><label>Your Review</label> <textarea rows="3" class="form-control @error('review') is-invalid @enderror" placeholder="Write review" name="review">{!! old('review') !!}</textarea></div>
                                       @error('review')
					                     <div class="form-control-feedback text-danger">{{$message}}</div>
					                   @enderror

                                       <div class="form-group mb-0"><button type="submit" class="btn btn-primary btn-lg">Post Your Review</button></div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @include('home.product.related', ['product' => $product])
            @include('home.product.recent-views', ['product' => $product])
         </div>
@endsection