@foreach($products as $product)
<div class="products-list__item">
    <div class="product-card">
       <button class="product-card__quickview" data-toggle="modal" data-target="#quick-view-{{$product->id}}">
          <svg width="16px" height="16px">
             <i class="fa fa-expand"></i>
          </svg>
          <span class="fake-svg-icon"></span>
       </button>
       <div class="product-card__badges-list">
          @if(($product->sale_price != "") && ($product->sale_price < $product->price))
             <div class="product-card__badge product-card__badge--new">
                {{
                   number_format((($product->price - $product->sale_price)/$product->price)* 100).'%'
                }}
             </div>
          @endif
       </div>
       <div class="product-card__image"><a href="{{ url($product->slug.'.html') }}"><img style="width: 228.5px; max-height: 228.5px;" src="{{ asset('storage/product/'.$product->cover) }}" alt="{{ $product->title }}"></a></div>
       <div class="product-card__info">
          <div class="product-card__name"><a href="{{ url($product->slug.'.html') }}">{{ Str::limit($product->title, 30, '...')}}</a></div>
          <div class="product-card__rating">
             @if(intval(count(($product->review)) > 0))
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
             <div class="product-card__rating-legend">{{count($product->review)}} Reviews</div>
            @else
            <div class="product-card__rating-legend">No Reviews Yet</div>
            @endif
          </div>
          <ul class="product-card__features-list">

            @if(count(Products::attributes($product->id)) > 0)
            @foreach(Products::attributes($product->id) as $attr)
             <li>{{ $attr->attributesValues->attribute->name }}: {{ $attr->attributesValues->value }}</li>            
            @endforeach
            @else
              <span>No Product features</span>
            @endif
          </ul>
       </div>
       <div class="product-card__actions">
          <div class="product-card__availability">Availability: <span class="text-success">
            @if(intval($product->qty) > 0)
             <span class="text-success">In Stock</span>
             @else
             <span class="text-danger">Out of Stock</span>
             @endif
          </span></div>
          <div class="product-card__prices">
          	<span style="text-decoration: line-through;"><small>{{ config('shop.symbol').' '.number_format($product->price)}}</small></span>
	        <span>{{ config('shop.symbol').' '.number_format($product->sale_price)}}</span>
          </div>
          <div class="product-card__buttons">
             <form action="{{ route('cart.add', $product->id) }}" method= 'post'>
                 @csrf
                 <input type="hidden" name="qty" value="1">
                 <input type="hidden" name="price" value="@if ($product->sale_price != "")
                    {{ $product->sale_price }}
                 @else {{ $product->price }} @endif">
                 <button class="btn btn-primary product-card__addtocart" type="submit">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="submit">Add To Cart</button> 
              </form>
              <a class="btn btn-light product-card__wishlist" href="{{ route('add-to-wishlist',  $product->id) }}" title="Add to wishlist">
                 <i style="width: 16px; height: 16px;" class="fas fa-heart"></i>
                 <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
              </a>
              <a class="btn btn-light product-card__compare" href="{{ route('add-to-compare', $product->id) }}" title="Add to compare">
                 <i style="width: 16px; height: 16px;" class="fas fa-exchange-alt"></i>
                 <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
              </a>
          </div>
       </div>
    </div>
 </div>
 @include('home.catalogue.partials.productModal', ['product' => $product, 'attributes' => $attributes])
@endforeach