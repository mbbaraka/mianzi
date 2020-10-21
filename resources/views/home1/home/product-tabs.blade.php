<!-- media tab start -->
<section class="section-big-pb-space ratio_40 pb-10">
    <!--tab product-->
    <section class="section-py-space" >
        <div class="tab-product-main">
            <div class="tab-prodcut-contain">
                <ul class="tabs tab-title">
                    <li @if(request('tab') == 'tab-featured') class="{{ $loop->first ? 'current' : ''}}" @endif><a href="tab-featured">Featured</a></li>
                    <li @if(request('tab') == 'tab-trending') class="{{ $loop->first ? 'current' : ''}}" @endif><a href="tab-trending">Best Selling</a></li>
                    <li @if(request('tab') == 'tab-latest') class="{{ $loop->first ? 'current' : ''}}" @endif><a href="tab-latest">Latest</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--tab product-->
    <div class="custom-container product">
        <div class="row">
            <div class="col pr-0">
                <div class="theme-tab product tab-abjust">
                    <div class="tab-content-cls">
                        <div id="tab-featured" class="tab-content active default product">
                            <div class="product-slide-6 product-m no-arrow">
                                @foreach(Products::get('featured') as $product)
                                <div>
                                    <div>
                                    <div class="product-box">
                                        <div class="product-imgbox">
                                            <div class="product-front">
                                                <img style="width: 270px; height: 345px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-back">
                                                <img style="width: 270px; height: 345px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-icon">
                                                @livewire('add-to-cart', ['product' => $product])
                                                
                                                @if (Auth::guard('customer')->check()) 
                                                @livewire('add-to-wishlist', ['product' => $product])
                                                @endif
                                                <a href="#" data-toggle="modal" data-target="#quick-view-{{ $product->id }}" title="Quick View">
                                                    <i class="ti-search" aria-hidden="true"></i>
                                                </a>
                                                <a href="compare.html" title="Compare">
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="new-label">
                                                <div>new</div>
                                            </div>
                                            <div class="on-sale">
                                                on sale
                                            </div>
                                        </div>
                                        <div class="product-detail">
                                            <div class="detail-title">
                                                <div class="detail-left">
                                                    <div class="rating-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="">
                                                        <h6 class="price-title">
                                                            {{ Str::limit($product->title, 30 , '...') }}
                                                        </h6>
                                                    </a>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="check-price">
                                                        {{ config('shop.symbol') . $product->price }}
                                                    </div>
                                                    <div class="price">
                                                        <div class="price">
                                                            {{ config('shop.symbol') . $product->sale_price }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                {{-- @include('home.components.quick-view', ['product' => $product]) --}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tab-trending" class="tab-content ">
                            <div class="product-slide-6 product-m no-arrow">
                                @foreach(Products::get('best-selling') as $product)
                                <div>
                                    <div>
                                    <div class="product-box">
                                        <div class="product-imgbox">
                                            <div class="product-front">
                                                <img style="width: 270px; height: 345px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-back">
                                                <img style="width: 270px; height: 345px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-icon">
                                                @livewire('add-to-cart', ['product' => $product])
                                                
                                                @if (Auth::guard('customer')->check()) 
                                                @livewire('add-to-wishlist', ['product' => $product])
                                                @endif
                                                <a href="#" data-toggle="modal" data-target="#quick-view-{{ $product->id }}" title="Quick View">
                                                    <i class="ti-search" aria-hidden="true"></i>
                                                </a>
                                                <a href="compare.html" title="Compare">
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="new-label">
                                                <div>new</div>
                                            </div>
                                            <div class="on-sale">
                                                on sale
                                            </div>
                                        </div>
                                        <div class="product-detail">
                                            <div class="detail-title">
                                                <div class="detail-left">
                                                    <div class="rating-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="">
                                                        <h6 class="price-title">
                                                            {{ Str::limit($product->title, 30 , '...') }}
                                                        </h6>
                                                    </a>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="check-price">
                                                        {{ config('shop.symbol') . $product->price }}
                                                    </div>
                                                    <div class="price">
                                                        <div class="price">
                                                            {{ config('shop.symbol') . $product->sale_price }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                {{-- @include('home.components.quick-view', ['product' => $product]) --}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tab-latest" class="tab-content ">
                            <div class="product-slide-6 product-m no-arrow">
                                @foreach(Products::get('latest') as $product)
                                <div>
                                    <div>
                                    <div class="product-box">
                                        <div class="product-imgbox">
                                            <div class="product-front">
                                                <img style="width: 270px; height: 345px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-back">
                                                <img style="width: 270px; height: 345px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-icon">
                                                @livewire('add-to-cart', ['product' => $product])
                                                
                                                @if (Auth::guard('customer')->check()) 
                                                @livewire('add-to-wishlist', ['product' => $product])
                                                @endif
                                                <a href="#" data-toggle="modal" data-target="#quick-view-{{ $product->id }}" title="Quick View">
                                                    <i class="ti-search" aria-hidden="true"></i>
                                                </a>
                                                <a href="compare.html" title="Compare">
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="new-label">
                                                <div>new</div>
                                            </div>
                                            <div class="on-sale">
                                                on sale
                                            </div>
                                        </div>
                                        <div class="product-detail">
                                            <div class="detail-title">
                                                <div class="detail-left">
                                                    <div class="rating-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="">
                                                        <h6 class="price-title">
                                                            {{ Str::limit($product->title, 30 , '...') }}
                                                        </h6>
                                                    </a>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="check-price">
                                                        {{ config('shop.symbol') . $product->price }}
                                                    </div>
                                                    <div class="price">
                                                        <div class="price">
                                                            {{ config('shop.symbol') . $product->sale_price }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                {{-- @include('home.components.quick-view', ['product' => $product]) --}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>