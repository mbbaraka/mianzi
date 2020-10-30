<div class="block block--highlighted block-categories block-categories--layout--classic">
   <div class="container">
      <div class="block-header">
         <h3 class="block-header__title">Popular Categories</h3>
         <div class="block-header__divider"></div>
         <ul class="block-header__groups-list">
            <li><button type="button" class="block-header__group block-header__group">View All</button></li>
         </ul>
      </div>
      <div class="block-categories__list">
      	@foreach(Categories::getRoot() as $categories)
         <div class="block-categories__item category-card category-card--layout--classic">
            <div class="category-card__body">
               <div class="category-card__image"><a href="{{ url('category/'.$categories->slug. '.html') }}"><img style="width: 130px; height: 130px;" src="{{ asset('app/category/'.$categories->thumbnail) }}" alt="{{ $categories->title }}"></a></div>
               <div class="category-card__content">
                  <div class="category-card__name"><a href="{{ url('category/'.$categories->slug. '.html') }}">{{ $categories->title }}</a></div>
                  <ul class="category-card__links">
                  	@foreach(Categories::subcategories($categories->id) as $sub_categories)
                     <li><a href="{{ url('category/'.$sub_categories->slug. '.html') }}">{{ $sub_categories->title }}</a></li>
                    @endforeach
                  </ul>
                  <div class="category-card__all"><a href="#">Show All</a></div>
                  <div class="category-card__products">572 Products</div>
               </div>
            </div>
         </div>
        @endforeach
      </div>
   </div>
</div>