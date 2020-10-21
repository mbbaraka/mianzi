<div class="row">
    @foreach($products as $product)
    <div class="col-xl-3 col-md-4 col-6 col-grid-box">
        <div class="product">
            <div class="product-box">
                <div class="product-imgbox">
                    <a href="{{ url($product->slug.'.html') }}">
                        <div class="product-front">
                            <img style="width: 217px; height: 279px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                        </div>
                        <div class="product-back">
                            <img style="width: 217px; height: 279px" src="{{ asset('storage/product/'.$product->cover) }}" class="img-fluid  " alt="product">
                        </div>
                    </a>
                </div>
                <div class="product-detail detail-center ">
                    <div class="detail-title">
                        <div class="detail-left">
                            <div class="rating-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>{{ Str::limit($product->description, 250 , '...') }}</p>
                            <a href="{{ url($product->slug.'.html') }}">
                                <h6 class="price-title">
                                    {{ Str::limit($product->title, 30 , '...') }}
                                </h6>
                            </a>
                        </div>
                        <div class="detail-right">
                            <div class="check-price">
                                {{ config('shop.symbol') .' '. number_format($product->price) }}
                            </div>
                            <div class="price">
                                <div class="price">
                                    {{ config('shop.symbol') .' '. number_format($product->sale_price) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="icon-detail">
                        @livewire('add-to-cart', ['product' => $product])
                                                
                        @if (Auth::guard('customer')->check()) 
                        @livewire('add-to-wishlist', ['product' => $product])
                        @endif
                        <a href="#" data-toggle="modal" data-target="#quick-view-{{$product->id}}" title="Quick View">
                            <i class="ti-search" aria-hidden="true"></i>
                        </a>
                        <a href="compare.html" title="Compare">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.components.quick-view', ['product' => $product])
    @endforeach
</div>