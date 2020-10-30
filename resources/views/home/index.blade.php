@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="site__body">
   <!-- .block-slideshow -->
   <div class="block-slideshow block-slideshow--layout--with-departments block">
      <div class="container">
         <div class="row">
            <div class="col-12 col-lg-9 offset-lg-3">
               <div class="block-slideshow__body">
                  <div class="owl-carousel">
                  	@foreach(Banners::get('slider') as $sliders)
                     <a class="block-slideshow__slide" href="#">
                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url({{ asset('app/banner/'.$sliders->image)}}"></div>
                        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url({{ asset('app/banner/'.$sliders->image)}}"></div>
                        <div class="block-slideshow__slide-content">
                           <div class="block-slideshow__slide-title">{{ $sliders->title}}<br>
                           	{{ $sliders->sub_title}}</div>
                           <div class="block-slideshow__slide-text">{{ $sliders->description}}</div>
                           <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">{{ $sliders->button}}</span></div>
                        </div>
                     </a>
                   @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .block-slideshow / end --><!-- .block-features -->
   <div class="block block-features block-features--layout--classic">
      <div class="container">
         <div class="block-features__list">
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-free-delivery-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">Free Shipping</div>
                  <div class="block-features__subtitle">For orders from UGx 1000,000</div>
               </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-24-hours-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">Support 24/7</div>
                  <div class="block-features__subtitle">Call us anytime</div>
               </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-payment-security-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">100% Safety</div>
                  <div class="block-features__subtitle">Only secure payments</div>
               </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-tag-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">Hot Offers</div>
                  <div class="block-features__subtitle">Discounts up to 90%</div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .block-features / end --><!-- .block-products-carousel -->
   @include('home.home.featured')
   <!-- .block-products-carousel / end --><!-- .block-banner -->
   {{-- <div class="block block-banner">
      <div class="container">
         <a href="#" class="block-banner__body">
            <div class="block-banner__image block-banner__image--desktop" style="background-image: url('images/banners/banner-1.jpg')"></div>
            <div class="block-banner__image block-banner__image--mobile" style="background-image: url('images/banners/banner-1-mobile.jpg')"></div>
            <div class="block-banner__title">Hundreds<br class="block-banner__mobile-br">Hand Tools</div>
            <div class="block-banner__text">Hammers, Chisels, Universal Pliers, Nippers, Jigsaws, Saws</div>
            <div class="block-banner__button"><span class="btn btn-sm btn-primary">Shop Now</span></div>
         </a>
      </div>
   </div> --}}
   <!-- .block-banner / end --><!-- .block-products -->
   @include('home.home.best-seller')
   <!-- .block-products / end --><!-- .block-categories -->
   @include('home.home.categories')
   <!-- .block-categories / end --><!-- .block-products-carousel -->
   @include('home.home.new')
   <!-- .block-products-carousel / end --><!-- .block-posts -->
   {{-- <div class="block block-posts block-posts--layout--list-sm" data-layout="list-sm">
      <div class="container">
         <div class="block-header">
            <h3 class="block-header__title">Latest News</h3>
            <div class="block-header__divider"></div>
            <div class="block-header__arrows-list">
               <button class="block-header__arrow block-header__arrow--left" type="button">
                  <svg width="7px" height="11px">
                     <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                  </svg>
               </button>
               <button class="block-header__arrow block-header__arrow--right" type="button">
                  <svg width="7px" height="11px">
                     <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                  </svg>
               </button>
            </div>
         </div>
         <div class="block-posts__slider">
            <div class="owl-carousel">
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-1.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">Special Offers</a></div>
                     <div class="post-card__name"><a href="#">Philosophy That Addresses Topics Such As Goodness</a></div>
                     <div class="post-card__date">October 19, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-2.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">Latest News</a></div>
                     <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And Argument Part 2</a></div>
                     <div class="post-card__date">September 5, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-3.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">New Arrivals</a></div>
                     <div class="post-card__name"><a href="#">Some Philosophers Specialize In One Or More Historical Periods</a></div>
                     <div class="post-card__date">August 12, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-4.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">Special Offers</a></div>
                     <div class="post-card__name"><a href="#">A Variety Of Other Academic And Non-Academic Approaches Have Been Explored</a></div>
                     <div class="post-card__date">Jule 30, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-5.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">New Arrivals</a></div>
                     <div class="post-card__name"><a href="#">Germany Was The First Country To Professionalize Philosophy</a></div>
                     <div class="post-card__date">June 12, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-6.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">Special Offers</a></div>
                     <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And Argument Part 1</a></div>
                     <div class="post-card__date">May 21, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-7.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">Special Offers</a></div>
                     <div class="post-card__name"><a href="#">Many Inquiries Outside Of Academia Are Philosophical In The Broad Sense</a></div>
                     <div class="post-card__date">April 3, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-8.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">Latest News</a></div>
                     <div class="post-card__name"><a href="#">An Advantage Of Digital Circuits When Compared To Analog Circuits</a></div>
                     <div class="post-card__date">Mart 29, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-9.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">New Arrivals</a></div>
                     <div class="post-card__name"><a href="#">A Digital Circuit Is Typically Constructed From Small Electronic Circuits</a></div>
                     <div class="post-card__date">February 10, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
               <div class="post-card">
                  <div class="post-card__image"><a href="#"><img src="images/posts/post-10.jpg" alt=""></a></div>
                  <div class="post-card__info">
                     <div class="post-card__category"><a href="#">Special Offers</a></div>
                     <div class="post-card__name"><a href="#">Engineers Use Many Methods To Minimize Logic Functions</a></div>
                     <div class="post-card__date">January 1, 2019</div>
                     <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                     <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
   <!-- .block-posts / end --><!-- .block-brands -->
   <div class="block block-brands">
      <div class="container">
         <div class="block-brands__slider">
            <div class="owl-carousel">
               @foreach(Categories::getRoot() as $categories)
               <div class="block-brands__item"><a href="{{ url('category/'.$categories->slug) }}"><img style="width: 32px; height: 32px;" src="{{ asset('storage/category/'.$categories->thumbnail) }}" alt="{{$categories->title}}"></a><span>{{$categories->title}}</span></div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@endsection