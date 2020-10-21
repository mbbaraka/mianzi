@extends('layouts.app2')

@section('title', 'Compare')

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
                           <li class="breadcrumb-item active" aria-current="page">Compare</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>Compare</h1>
                  </div>
               </div>
            </div>
            <div class="block">
               <div class="container">
                  <div class="table-responsive">
                     <table class="compare-table">
                        <tbody>
                           <tr>
                              <th>Product</th>
                              @foreach($compare as $product)
                              <td>
                                 <a class="compare-table__product-link" href="{{ url($product->product->slug.'.html') }}">
                                    <div class="compare-table__product-image"><img style="width: 140px; height: 140px;" src="{{ asset('storage/product/'.$product->product->cover) }}" alt="{{$product->product->title}}"></div>
                                    <div class="compare-table__product-name">{{ $product->product->title }}</div>
                                 </a>
                              </td>
                              @endforeach
                           </tr>
                           <tr>
                              <th>Rating</th>
                              @foreach($compare as $reviews)
                              <td>
                                 <div class="compare-table__product-rating">
                                    <div class="rating">
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
                                          <div class="compare-table__product-rating-legend">{{count($product->review)}} Reviews</div>
                                         @else
                                         <div class="product-card__rating-legend">No Reviews Yet</div>
                                         @endif
                                    </div>
                                 </div>
                              </td>
                              @endforeach
                           </tr>
                           <tr>
                              <th>Availability</th>
                              @foreach($compare as $stock)
                              <td>
                                 @if(intval($stock->product->qty) > 0)
                                 <span class="compare-table__product-badge badge badge-success">In Stock</span>
                                 @else
                                 <span class="compare-table__product-badge badge badge-danger">Out of Stock</span>
                                 @endif
                              </td>
                              @endforeach
                           </tr>
                           <tr>
                              <th>Price</th>
                              @foreach($compare as $price)
                              <td>
                                 @if($price->product->sale_price == "")
                                 {{ config('shop.symbol').' '.number_format($price->product->price)}}
                                 @else
                                 {{ config('shop.symbol').' '.number_format($price->product->sale_price)}}
                                 @endif
                              </td>
                              @endforeach
                           </tr>
                           <tr>
                              <th>Add To Cart</th>
                              @foreach($compare as $cart)
                              <td>
                                 <form action="{{ route('cart.add', $cart->product->id) }}" method= 'post'>
                                 @csrf
                                 <input type="hidden" name="price" value="@if ($cart->product->sale_price !="")
                                    {{ $cart->product->sale_price }}
                                    @else
                                    {{$cart->product->price }}
                                 @endif">
                                 <input type="hidden" name="qty" value="1">
                                 <button type="submit" class="btn btn-primary btn-sm">Add To Cart</button>
                              </td>
                              @endforeach
                           </tr>
                           <tr>
                              <th>SKU</th>
                              @foreach($compare as $sku)
                              <td>{{$sku->product->sku}}</td>
                              @endforeach
                           </tr>
                           @if(count($attribute)>0)

                              @foreach($attribute as $attr)
                              <tr>
                                 <th>{{ $attr->attributesValues->attribute->name }}</th>
                                 @foreach($compare as $compares)
                                    @if($attr->attributesValues->value)
                                    <td>{{ $attr->attributesValues->value }}</td>
                                    @else
                                    <td>NA</td>
                                    @endif
                                 @endforeach
                              </tr>
                              @endforeach
                           @endif
                           <tr>
                              <th></th>
                              @foreach($compare as $compares)
                              <td><a href="{{ route('compare.destroy', $compares->id) }}" class="btn btn-secondary btn-sm">Remove</a></td>
                              @endforeach
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
        {{--  <div class="site__body">
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
                              <a href="#">Breadcrumb</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Latest News</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>Latest News</h1>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-12 col-lg-3 order-1 order-lg-0">
                     <div class="block block-sidebar block-sidebar--position--start">
                        <div class="block-sidebar__item">
                           <div class="widget-categories widget-categories--location--blog widget">
                              <h4 class="widget__title">Categories</h4>
                              <ul class="widget-categories__list" data-collapse data-collapse-opened-class="widget-categories__item--open">
                                 <li class="widget-categories__item" data-collapse-item>
                                    <div class="widget-categories__row">
                                       <a href="#">
                                          <svg class="widget-categories__arrow" width="6px" height="9px">
                                             <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                          </svg>
                                          Latest News
                                       </a>
                                    </div>
                                 </li>
                                 <li class="widget-categories__item" data-collapse-item>
                                    <div class="widget-categories__row">
                                       <a href="#">
                                          <svg class="widget-categories__arrow" width="6px" height="9px">
                                             <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                          </svg>
                                          New Arrivals
                                       </a>
                                    </div>
                                 </li>
                                 <li class="widget-categories__item" data-collapse-item>
                                    <div class="widget-categories__row">
                                       <a href="#">
                                          <svg class="widget-categories__arrow" width="6px" height="9px">
                                             <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                          </svg>
                                          Reviews
                                       </a>
                                    </div>
                                 </li>
                                 <li class="widget-categories__item" data-collapse-item>
                                    <div class="widget-categories__row">
                                       <a href="#">
                                          <svg class="widget-categories__arrow" width="6px" height="9px">
                                             <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                          </svg>
                                          Drills and Mixers
                                       </a>
                                    </div>
                                 </li>
                                 <li class="widget-categories__item" data-collapse-item>
                                    <div class="widget-categories__row">
                                       <a href="#">
                                          <svg class="widget-categories__arrow" width="6px" height="9px">
                                             <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                          </svg>
                                          Cordless Screwdrivers
                                       </a>
                                    </div>
                                 </li>
                                 <li class="widget-categories__item" data-collapse-item>
                                    <div class="widget-categories__row">
                                       <a href="#">
                                          <svg class="widget-categories__arrow" width="6px" height="9px">
                                             <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                          </svg>
                                          Screwdrivers
                                       </a>
                                    </div>
                                 </li>
                                 <li class="widget-categories__item" data-collapse-item>
                                    <div class="widget-categories__row">
                                       <a href="#">
                                          <svg class="widget-categories__arrow" width="6px" height="9px">
                                             <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                          </svg>
                                          Wrenches
                                       </a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-lg-8">
                     <div class="block">
                        <div class="posts-view">
                           <div class="posts-view__list posts-list posts-list--layout--classic">
                              <div class="posts-list__body">
                                 <div class="posts-list__item">
                                    <div class="post-card post-card--layout--grid post-card--size--lg">
                                       <div class="post-card__image"><a href="#"><img src="images/posts/post-1.jpg" alt=""></a></div>
                                       <div class="post-card__info">
                                          <div class="post-card__category"><a href="#">Special Offers</a></div>
                                          <div class="post-card__name"><a href="#">Philosophy That Addresses Topics Such As Goodness</a></div>
                                          <div class="post-card__date">October 19, 2019</div>
                                          <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                          <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}
@endsection