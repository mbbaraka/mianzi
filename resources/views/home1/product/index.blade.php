@extends('layouts.home')

@section('title', Str::ucfirst($product->title))

@section('content')

@include('layouts.partials.home.header-custom')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>{{ $product->title }}</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-pt-space bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="product-slick">
                        <div><img style="width: 410px; height: 530px;" src="{{ asset('storage/product/'.$product->cover) }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                        @foreach($image as $key => $images)
                        <div><img style="width: 410px; height: 530px;" src="{{ asset('storage/product/gallery/'.$images->image) }}" alt="" class="img-fluid  image_zoom_cls-{{$key + 1}}"></div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                <div><img style="width: 115px; height: 148px;" src="{{ asset('storage/product/'.$product->cover) }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                                @foreach($image as $key => $images)
                                <div><img style="width: 115px; height: 148px;" src="{{ asset('storage/product/gallery/'.$images->image) }}" alt="" class="img-fluid  image_zoom_cls-{{$key + 1}}"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-right product-description-box">
                        <h2 style="text-transform: capitalize;">{{ $product->title }}</h2>
                        <div class="border-product">
                            <h6 class="product-title">product details</h6>
                            <p>{!! Str::limit($product->description, 250 , '...') !!}</p>
                        </div>
                        @if($attribute)
                        <div class="single-product-tables border-product detail-section">
                            <table>
                                <tbody>
                                @foreach($attribute as $attr)
                                <tr>
                                    <td>{{ $attr->attributesValues->attribute->name }}: </td>
	                				          <td>{{ $attr->attributesValues->value }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        <div class="border-product">
                            <h6 class="product-title">share it</h6>
                            <div class="product-icon">
                                <ul class="product-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    {{-- <li><a href="#"><i class="fa fa-instagram"></i></a></li> --}}
                                    {{-- <li><a href="#"><i class="fa fa-rss"></i></a></li> --}}
                                </ul>
                                @if (Auth::guard('customer')->check())
                                	<form class="d-inline-block" method="post" action="{{ route('add-to-wishlist') }}">
	                                	@csrf
	                                	<input type="hidden" name="product_id" value="{{ $product->id }}">
	                                	<input type="hidden" name="customer_id" value="{{ Auth::guard('customer')->id() }}">
	                                    @if(Wishlists::check())
	                                    <a href="{{ route('wishlists') }}"><span class="ml-5"><i class="mr-2 fa fa-heart"></i>Already in Wishlist</span></a>
	                                    @else
	                                    <button type="submit" class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
	                                    @endif
	                                </form>
                                @else
                                	<span class="ml-5"><a href="{{ route('login.html') }}">Login to add to WishList</a></span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">100% SECURE PAYMENT</h6>
                            <div class="payment-card-bottom">
                                <ul>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend//images/layout-1/pay/1.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend//images/layout-1/pay/2.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend//images/layout-1/pay/3.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend//images/layout-1/pay/4.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend//images/layout-1/pay/1.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-right product-form-box">
                    	  @if($product->sale_price != "")
                        <h4><del>{{ config('shop.symbol') .' '. $product->price }}</del><span>{{ number_format(($product->price-$product->sale_price)/($product->price)*100) }}% off</span></h4>
                        <h3>{{ config('shop.symbol') .' '. number_format($product->sale_price) }}</h3>
                        @else
                        <h3>{{ config('shop.symbol') .' '. number_format($product->price) }}</h3>
                        @endif                        
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                        <div class="product-description border-product">
                            <h6 class="product-title">Time Reminder</h6>
                            <div class="timer">
                                <p id="demo"><span>25 <span class="padding-l">:</span> <span class="timer-cal">Days</span> </span><span>22 <span class="padding-l">:</span> <span class="timer-cal">Hrs</span> </span><span>13 <span class="padding-l">:</span> <span class="timer-cal">Min</span> </span><span>57 <span class="timer-cal">Sec</span></span>
                                </p>
                            </div>
                            <h6 class="product-title">select size</h6>
                            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body"><img src="assets/images/size-chart.jpg" alt="" class="img-fluid "></div>
                                    </div>
                                </div>
                            </div>
                            <div class="size-box">
                                <ul>
                                    <li class="active"><a href="#">s</a></li>
                                    <li><a href="#">m</a></li>
                                    <li><a href="#">l</a></li>
                                    <li><a href="#">xl</a></li>
                                </ul>
                            </div>
                            <h6 class="product-title">quantity</h6>
                            <div class="qty-box">
                                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                    <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                            </div>
                        </div>
                        <div class="product-buttons">
                        	<a href="{{ route('cart.add', $product->id) }}" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">buy now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!-- product-tab starts -->
<section class="tab-product  tab-exes">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
               <div class="creative-card creative-inner">
                   <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                       <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
                           <div class="material-border"></div>
                       </li>
                       <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">Details</a>
                           <div class="material-border"></div>
                       </li>
                       <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Write Review</a>
                           <div class="material-border"></div>
                       </li>
                   </ul>
                   <div class="tab-content nav-material" id="top-tabContent">
                       <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                           <p>
                           	{!! $product->description !!}
                           </p>
                       </div>
                       <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                           <p>
                           	{!! $product->information !!}
                           </p>
                       </div>
                       <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                           <form class="theme-form">
                               <div class="form-row">
                                   <div class="col-md-12">
                                       <div class="media">
                                           <label>Rating</label>
                                           <div class="media-body ml-3">
                                               <div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <label for="name">Name</label>
                                       <input type="text" class="form-control" id="name" placeholder="Enter Your name" required>
                                   </div>
                                   <div class="col-md-6">
                                       <label for="email">Email</label>
                                       <input type="text" class="form-control"  placeholder="Email" required>
                                   </div>
                                   <div class="col-md-12">
                                       <label for="review">Review Title</label>
                                       <input type="text" class="form-control"  placeholder="Enter your Review Subjects" required>
                                   </div>
                                   <div class="col-md-12">
                                       <label for="review">Review Title</label>
                                       <textarea class="form-control" placeholder="Wrire Your Testimonial Here" id="exampleFormControlTextarea1" rows="6"></textarea>
                                   </div>
                                   <div class="col-md-12">
                                       <button class="btn btn-normal" type="submit">Submit YOur Review</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->

@include('home.product.related', ['relatedproducts' => $relatedproducts])
@endsection