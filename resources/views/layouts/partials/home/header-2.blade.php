<header class="site__header d-lg-block d-none">
            <div class="site-header">
               @include('layouts.partials.home.topbar')
               <div class="site-header__nav-panel">
                  <div class="nav-panel">
                     <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                           <div class="nav-panel__departments">
                              <!-- .departments -->
                              <div class="departments" data-departments-fixed-by="">
                                 <div class="departments__body">
                                    <div class="departments__links-wrapper">
                                       <ul class="departments__links">
                                        @foreach(Categories::getRoot() as $categories)
                                          @if(count(Categories::subcategories($categories->id)) > 0)
                                          <li class="departments__item">
                                             <a href="{{ url('category/'.$categories->slug.'.html') }}">
                                                {{ $categories->title }} 
                                                <svg class="departments__link-arrow" width="6px" height="9px">
                                                   <i class="fa fa-angle-right float-right"></i>
                                                </svg>
                                             </a>
                                             <div class="departments__megamenu departments__megamenu--xl">
                                                <!-- .megamenu -->
                                                <div class="megamenu megamenu--departments">
                                                   <div class="row">
                                                      @foreach(Categories::subcategories($categories->id) as $sub_categories)
                                                      <div class="col-3">
                                                         <ul class="megamenu__links megamenu__links--level--0">
                                                            @if(count(Categories::sub_subcategories($sub_categories->id)) > 0)
                                                               <li class="megamenu__item megamenu__item--with-submenu">
                                                                  <a href="{{ url('category/'.$sub_categories->slug.'.html') }}">{{$sub_categories->title}}</a>
                                                                  <ul class="megamenu__links megamenu__links--level--1">
                                                                     @foreach(Categories::sub_subcategories($sub_categories->id) as $items)
                                                                     <li class="megamenu__item"><a href="{{ url('category/'.$items->slug.'.html') }}">{{$items->title}}</a></li>
                                                                     @endforeach
                                                                  </ul>
                                                               </li>
                                                               @else
                                                               <li class="megamenu__item"><a href="{{ url('category/'.$sub_categories->slug.'.html') }}">{{$sub_categories->title}}</a></li>
                                                            @endif
                                                         </ul>
                                                      </div>
                                                      @endforeach
                                                      <div class="col-3">
                                                         <img src="{{ asset('storage/category/'.$categories->thumbnail) }}">
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- .megamenu / end -->
                                             </div>
                                          </li>
                                          @else
                                          <li class="departments__item"><a href="{{ url('category/'.$categories->slug.'.html') }}">{{ $categories->title }}</a></li>
                                          @endif
                                       @endforeach
                                       </ul>
                                    </div>
                                 </div>
                                 <button class="departments__button">
                                    <svg class="departments__button-arrow" width="9px" height="6px">
                                       <i style="width: 18px; height: 14px;" class="fas fa-bars"></i>
                                    </svg>
                                    Shop By Category 
                                 </button>
                              </div>
                              <!-- .departments / end -->
                           </div>
                           <!-- .nav-links -->
                           <div class="nav-panel__nav-links nav-links">
                              <ul class="nav-links__list">
                                 <li class="nav-links__item"><a href="{{ route('about-us') }}"><span>About Us</span></a></li>
                                 <li class="nav-links__item"><a href="{{ route('contact-us') }}"><span>Contact Us</span></a></li>
                                 <li class="nav-links__item"><a href="{{ route('faq') }}"><span>FAQ</span></a></li>
                                 <li class="nav-links__item ml-5"><a href="tel:0773034311"><span><i class="fas fa-phone">&nbsp;&nbsp;</i> Call 0773034311 to Order</span></a></li>
                              </ul>
                           </div>
                           <!-- .nav-links / end -->
                           <div class="nav-panel__indicators">
                              <div class="indicator">
                                 <a href="{{ route('compare') }}" class="indicator__button">
                                    <span class="indicator__area">
                                       <i style="height: 20px; width: 20px" class="fas fa-exchange-alt"></i>
                                       <span class="indicator__value">{{ Compares::count() }}</span>
                                    </span>
                                 </a>
                              </div>
                              <div class="indicator">
                                 <a href="{{ route('wishlists') }}" class="indicator__button">
                                    <span class="indicator__area">
                                       <i style="height: 20px; width: 20px" class="fas fa-heart"></i>
                                       <span class="indicator__value">{{ Wishlists::count() }}</span>
                                    </span>
                                 </a>
                              </div>
                              <div class="indicator indicator--trigger--click">
                                 <a href="{{ route('cart.index') }}" class="indicator__button">
                                    <span class="indicator__area">
                                       <i style="height: 20px; width: 20px" class="fas fa-cart-plus"></i>
                                       <span class="indicator__value">
                                          @if(Auth::guard('customer')->check())
                                          {{ Carts::count()}}
                                          @else
                                          {{ ShoppingCart::count() }} 
                                          @endif
                                       </span>
                                    </span>
                                 </a>
                                 <div class="indicator__dropdown">
                                    <!-- .dropcart -->
                                    @if(Auth::guard('customer')->check())
                                    @if(Carts::count() > 0)
                                    <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          @foreach(Carts::get() as $carts)
                                          <div class="dropcart__product">
                                             <div class="dropcart__product-image"><a href="{{ url($carts->product->slug.'.html') }}"><img style="width: 70px; height: 70px;" src="{{ asset('app/product/'.$carts->product->cover) }}" alt="{{$carts->product->title}}"></a>
                                             </div>
                                             <div class="dropcart__product-info">
                                                <div class="dropcart__product-name"><a href="{{ url($carts->product->slug.'.html') }}">{{ $carts->product->title }}</a></div>
                                                <div class="dropcart__product-meta"><span class="dropcart__product-quantity">{{ $carts->qty }}</span> x <span class="dropcart__product-price">
                                                   @if($carts->product->sale_price == "")
                                                   {{ config('shop.symbol').' '. number_format($carts->product->price) }}
                                                   @else
                                                   {{ config('shop.symbol').' '. number_format($carts->product->sale_price) }}
                                                   @endif
                                                </span></div>
                                             </div>
                                             <a href="{{ route('cart.destroy', $carts->id) }}" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                <i style="width: 10px; height: 10px;" class="fa fa-times"></i>
                                             </a>
                                          </div>
                                          @endforeach
                                       </div>
                                       <div class="dropcart__totals">
                                          <table>
                                             <tr>
                                                <th>Subtotal</th>
                                                <td>
                                                   {{ config('shop.symbol').' '. number_format(Carts::subtotal()) }}
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                       <div class="dropcart__buttons"><a class="btn btn-secondary" href="{{ route('cart.index') }}">View Cart</a> <a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a></div>
                                    </div>
                                    @else
                                     <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          <div class="dropcart__product">
                                             <span>No item in cart yet.  </span>&nbsp;&nbsp;
                                             <a href="{{ route('shop') }}">Shop Now!</a>
                                          </div>
                                       </div>
                                    </div>
                                    @endif
                                    @else
                                    @if(count(ShoppingCart::all()) > 0)
                                    <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          @foreach(ShoppingCart::all() as $carts)
                                          <div class="dropcart__product">
                                             <div class="dropcart__product-image"><a href="product.html"><img style="width: 70px; height: 70px;" src="{{ asset('app/product/'.$carts->cover) }}" alt=""></a></div>
                                             <div class="dropcart__product-info">
                                                <div class="dropcart__product-name"><a href="product.html">{{$carts->name}}</a></div>
                                                <div class="dropcart__product-meta"><span class="dropcart__product-quantity">{{ $carts->qty }}</span> x <span class="dropcart__product-price">{{ config('shop.symbol').' '. number_format($carts->price) }}</span></div>
                                             </div>
                                             <a href="{{ route('cart.destroy', $carts->__raw_id) }}" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                <i style="width: 10px; height: 10px;" class="fa fa-times"></i>
                                             </a>
                                          </div>
                                          @endforeach
                                       </div>
                                       <div class="dropcart__totals">
                                          <table>
                                             <tr>
                                                <th>Subtotal</th>
                                                <td>{{ config('shop.symbol') .' '. number_format(ShoppingCart::totalPrice()) }}</td>
                                             </tr>
                                          </table>
                                       </div>
                                       <div class="dropcart__buttons"><a class="btn btn-secondary" href="{{ route('cart.index') }}">View Cart</a> <a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a></div>
                                    </div>
                                    @else
                                    <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          <div class="dropcart__product">
                                             <span>No item in cart yet.  </span>&nbsp;&nbsp;
                                             <a href="{{ route('shop') }}">Shop Now!</a>
                                          </div>
                                       </div>
                                    </div>
                                    @endif
                                    @endif
                                    <!-- .dropcart / end -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>