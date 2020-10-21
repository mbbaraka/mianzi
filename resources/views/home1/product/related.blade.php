<!-- product section start -->
<section class="section-big-py-space ratio_asos bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 product-related">
                <h2>related products</h2></div>
        </div>
        <div class="row  related-pro1">
            @foreach($relatedproducts as $products)
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="product">
                    <div class="product-box">
                        <div class="product-imgbox">
                            <div class="product-front">
                                <img style="width: 190px; height: 244px;" src="{{ asset('storage/product/'.$products->cover) }}" class="img-fluid  " alt="{{ $products->title }}">
                            </div>
                            <div class="product-back">
                                <img style="width: 190px; height: 244px;" src="{{ asset('storage/product/'.$products->cover) }}" class="img-fluid  " alt="{{ $products->title }}">
                            </div>
                            <div class="product-icon">
                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                    <i class="ti-bag" ></i>
                                </button>
                                <a href="javascript:void(0)" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                    <i class="ti-search" aria-hidden="true"></i>
                                </a>
                                <a href="compare.html" title="Compare">
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </a>
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
                                            {{ $products->title }}
                                        </h6>
                                    </a>
                                </div>
                                <div class="detail-right">
                                    @if($products->sale_price != "")
                                    <div class="check-price">
                                        {{ config('shop.symbol') .' '. number_format($product->price) }}
                                    </div>
                                    <div class="price">
                                        <div class="price">
                                            {{ config('shop.symbol') .' '. number_format($product->sale_price) }}
                                        </div>
                                    </div>
                                    @else
                                    <div class="price">
                                        <div class="price">
                                            {{ config('shop.symbol') .' '. number_format($product->price) }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- product section end