<div id="quick-view-{{$product->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <div class="product product--layout--standard" data-layout="standard">
                     <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                           <div class="product-gallery">
                              <div class="">                 
                                 <a href="{{ asset('storage/product/'.$product->cover) }}" target="_blank">
                                    <img style="width: 360px; height: 400px" src="{{ asset('storage/product/'.$product->cover) }}" alt=""> 
                                 </a>
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
                              <div class="product__rating-stars">
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
                             @endif</div>
                           </div>
                           <div class="product__description">
                              {!! Str::limit($product->description, 300, '...') !!}
                           </div>
                           <ul class="product__features">
                              <li>Speed: 750 RPM</li>
                              <li>Power Source: Cordless-Electric</li>
                              <li>Battery Cell Type: Lithium</li>
                              <li>Voltage: 20 Volts</li>
                              <li>Battery Capacity: 2 Ah</li>
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
                           <div class="product__availability">Availability: <span class="text-success">In Stock</span></div>
                           <div class="product__prices">
                              <span class="text-muted" style="text-decoration: line-through;"><small>{{ config('shop.symbol').' '.number_format($product->price)}}</small></span>
                           <span>{{ config('shop.symbol').' '.number_format($product->sale_price)}}</span>
                           </div>
                           <!-- .product__options -->
                           <form class="product__options" action="{{ route('cart.add', $product->id) }}" method= 'post'>
                              @csrf
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
                           <div class="product__actions-item product__actions-item--compare">
                              <a href="{{ url($product->slug.'.html') }}" class="btn btn-primary btn-lg">
                                 View Details
                              </a>
                           </div>
                           {{-- <span class="text-muted small">Shipped between {{date('d M, Y').' and '. date('d M, Y')}}</span> --}}
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
         </div>
      </div>
   </div>
</div>