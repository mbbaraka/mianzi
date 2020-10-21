<div class="title1 section-my-space">
    <h4>New Products</h4>
</div>
<!--title end-->


<!--product start-->
<section class="product section-big-pb-space">
    <div class="custom-container">
        <div class="row ">
            <div class="col pr-0">
                <div class="product-slide-6 no-arrow mb--10">
                    @foreach(Products::get('latest', 10) as $product)
                    <div>
                        <div class="product-box">
                            <div class="product-imgbox">
                                <div class="product-front">
                                    <img style="width: 247px; height: 318px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                                </div>
                                <div class="product-back">
                                    <img style="width: 247px; height: 318px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
