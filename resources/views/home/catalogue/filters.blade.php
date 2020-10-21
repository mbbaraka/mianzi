<div class="block-sidebar__item">
   <div class="widget-filters widget" data-collapse data-collapse-opened-class="filter--opened">
      <h4 class="widget__title">Filters</h4>
      <div class="widget-filters__list">
         <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
               <button type="button" class="filter__title" data-collapse-trigger>
                  Categories 
                  <svg class="filter__arrow" width="12px" height="7px">
                     <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
               </button>
               <div class="filter__body" data-collapse-content>
                  <div class="filter__container">
                     <div class="filter-categories">
                        <ul class="filter-categories__list">
                           @foreach(Categories::getRoot() as $categories)
                           <li class="filter-categories__item filter-categories__item--parent">
                              <a href="{{ url('category/'.$categories->slug.'.html') }}">{{ $categories->title }}</a>
                              <div class="filter-categories__counter">
                                 {{ count($categories->product) }}
                              </div>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
               <button type="button" class="filter__title" data-collapse-trigger>
                  Price 
                  <svg class="filter__arrow" width="12px" height="7px">
                     <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
               </button>
               <div class="filter__body" data-collapse-content>
                  <div class="filter__container">
                     <div class="filter-price" data-min="500" data-max="{{$maxPrice}}" data-from="590" data-to="{{$maxPrice}} ">
                        <div class="filter-price__slider"></div>
                        <div class="filter-price__title">Price: UGX <span class="filter-price__min-value"></span> – UGX <span class="filter-price__max-value"></span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="widget-filters__item">
            <form method="get" action="{{ route('filter') }}">
            @foreach($filters as $filter)
            <div class="filter filter--opened" data-collapse-item>
               <button type="button" class="filter__title" data-collapse-trigger>
                  {{ $filter->name }} 
                  <svg class="filter__arrow" width="12px" height="7px">
                     <i class="fa fa-angle-down float-right"></i>
                  </svg>
               </button>
               <div class="filter__body" data-collapse-content>
                  <div class="filter__container">
                     <div class="filter-list">
                        <div class="filter-list__list">
                           @if(!empty($filter->values))
                              @foreach($filter->values as $value)
                              <label class="filter-list__item">
                                 <span class="filter-list__input input-check">
                                    <span class="input-check__body">
                                       <input name="{{$filter->name}}[]" class="input-check__input" type="checkbox" multiple value="{{ $value->value }}" id="filter-{{$value->id}}"> <span class="input-check__box"></span>
                                    </span>
                                 </span>
                                 <span class="filter-list__title" for="filter-{{$value->id}}">{{ $value->value}} </span><span class="filter-list__counter">7</span>
                              </label>
                              @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
      <div class="widget-filters__actions d-flex"><button class="btn btn-primary btn-sm" type="submit">Filter</button> <button class="btn btn-secondary btn-sm ml-2" type="reset">Reset</button></div>
      </form>
   </div>
</div>