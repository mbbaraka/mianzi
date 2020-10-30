<div class="block-sidebar__item d-none d-lg-block">
   <div class="widget-products widget">
      <h4 class="widget__title">Latest Products</h4>
      <div class="widget-products__list">
         @foreach(Products::get('latest', 5) as $latest)
         <div class="widget-products__item">
            <div class="widget-products__image"><a href="{{ url($latest->slug.'.html') }}"><img style="width: 50px; height: 50px" src="{{ asset('app/product/'.$latest->cover) }}" alt="{{ $latest->title }}"></a></div>
            <div class="widget-products__info">
               <div class="widget-products__name"><a href="{{ url($latest->slug.'.html') }}">{{ $latest->title }}</a></div>
               <div class="widget-products__prices">
                  @if($latest->sale_price == "")
                  <span>{{ config('shop.symbol').' '.number_format($latest->price)}}</span>
                  @else
                  <span class="text-muted small" style="text-decoration: line-through;">{{ config('shop.symbol').' '.number_format($latest->price)}}</span>
                  &nbsp;&nbsp;
                  <span class="float-right">{{ config('shop.symbol').' '.number_format($latest->sale_price)}}</span>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>