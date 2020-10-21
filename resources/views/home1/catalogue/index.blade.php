@extends('layouts.home')

@section('title')
@if (Request::routeIs('shop'))
    {{$category}}
    @else 
    {{$category->title}}
@endif
@endsection

@section('content')

@include('layouts.partials.home.header-custom')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>
                            @if (Request::routeIs('shop'))
                                {{$category}}
                                @else 
                                {{$category->title}}
                            @endif
                        </h2>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">
                                @if (Request::routeIs('shop'))
                                    {{$category}}
                                    @else 
                                    {{$category->title}}
                                @endif
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-big-py-space ratio_asos bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-3 collection-filter category-side category-page-side">
                    <!-- side-bar colleps block stat -->
                    @include('home.catalogue.filters', ['filters' => $attributes])
                    <!-- silde-bar colleps block end here -->
                    <!-- side-bar single product slider start -->
                    <div class="theme-card creative-card creative-inner">
                        <h5 class="title-border">new product</h5>
                        <div class="offer-slider slide-1">
                            <div>
                                @foreach($new as $new_product)
                                <div class="media">
                                    <a href=""><img style="width: 112px; height: 140px;" class="img-fluid " src="{{ asset('storage/product/'.$new_product->cover) }}" alt="{{$new_product->title}}"></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="{{ url($new_product->slug.'.html') }}"><h6>{{$new_product->title}}</h6></a>
                                        <h4>
                                            @if($new_product->sale_price != "")
                                           <div class="check-price">
                                                {{ config('shop.symbol') .' '. number_format($new_product->sale_price) }}
                                            </div>
                                            @else
                                            <div class="price">
                                                <div class="price">
                                                    {{ config('shop.symbol') .' '. number_format($new_product->price) }}
                                                </div>
                                            </div> 
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                           {{--  <div>
                                <div class="media">
                                    <a href=""><img class="img-fluid " src="../assets/images/product-sidebar/004.jpg" alt="product"></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="product-page(no-sidebar).html"><h6>Slim Fit Cotton Shirt</h6></a>
                                        <h4>$500.00</h4></div>
                                </div>
                                <div class="media">
                                    <a href=""><img class="img-fluid " src="../assets/images/product-sidebar/004.jpg" alt="product"></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="product-page(no-sidebar).html"><h6>Slim Fit Cotton Shirt</h6></a>
                                        <h4>$500.00</h4></div>
                                </div>
                                <div class="media">
                                    <a href=""><img class="img-fluid " src="../assets/images/product-sidebar/001.jpg" alt="product"></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="product-page(no-sidebar).html"><h6>Slim Fit Cotton Shirt</h6></a>
                                        <h4>$500.00</h4></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- side-bar single product slider end -->
                    <!-- side-bar banner start here -->
                    <div class="collection-sidebar-banner">
                        {{-- <a href="#"><img src="../assets/images/category/side-banner.png" class="img-fluid " alt="side-banner"></a> --}}
                    </div>
                    <!-- side-bar banner end here -->
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="#"><img src="../assets/images/category/1.jpg" class="img-fluid " alt="category"></a>
                                    <div class="top-banner-content small-section">
                                        <h4>
                                            @if (Request::routeIs('shop'))
                                                {{$category}}
                                                @else 
                                                {{$category->title}}
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Showing Products 1-24 of 10 Result</h5></div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="{{ asset('frontend/images/category/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="{{ asset('frontend/images/category/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="{{ asset('frontend/images/category/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="{{ asset('frontend/images/category/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <form class="form-inline">
                                                    <div class="product-page-per-view">
                                                        <select name="per_page" type="submit">
                                                        	<option>Display</option>
                                                            <option value="24">24 Products Par Page</option>
                                                            <option value="50">50 Products Par Page</option>
                                                            <option value="100">100 Products Par Page</option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter" type="submit">
                                                        <select name="sort">
                                                        	<option>Sort</option>
                                                            <option value="A-Z" type="submit">Ascending</option>
                                                            <option value="Z-A">Descending</option>
                                                        </select>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid product-load-more">
                                        @include('home.catalogue.list', ['products' => $products])
                                    </div>
                                    <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore">load more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->
@endsection