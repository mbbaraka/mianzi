         <header class="site__header d-lg-none">
            <div class="mobile-header mobile-header--sticky mobile-header--stuck">
               <div class="mobile-header__panel">
                  <div class="container">
                     <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                           <i style="height: 14px; width: 18px" class="fas fa-bars"></i>
                        </button>
                        <a class="mobile-header__logo" href="{{ url('/') }}">
                          <img style="height: 40px;" src="{{ asset('frontend/images/layout-6/logo.png') }}" class="img-fluid  " alt="logo-header">
                        </a>
                        <div class="mobile-header__search">
                           {{-- <form class="search__form" action="{{ route('search') }}" method="get">
                              <input class="search__input" name="query" placeholder="Search over 10,000 products" aria-label="Site search" type="search" autocomplete="off"> 
                              <button class="search__button" type="submit">
                                 <i style="width: 20px; height: 20px;" class="fa fa-search"></i>
                              </button>
                              <div class="search__border"></div>
                           </form> --}}
                           @livewire('search')
                        </div>
                        <div class="mobile-header__indicators">
                           <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                              <button class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-search"></i>
                                 </span>
                              </button>
                           </div>
                           <div class="indicator indicator--mobile">
                              <a href="" class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-user"></i>
                                 </span>
                              </a>
                           </div>
                           <div class="indicator indicator--mobile d-sm-flex">
                              <a href="{{ route('compare') }}" class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-exchange-alt"></i>
                                    <span class="indicator__value">
                                       {{Compares::count()}}
                                    </span>
                                 </span>
                              </a>
                           </div>
                           <div class="indicator indicator--mobile d-sm-flex">
                              <a href="{{ route('wishlists') }}" class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-heart"></i>
                                    <span class="indicator__value">
                                       {{Wishlists::count()}}
                                    </span>
                                 </span>
                              </a>
                           </div>
                           <div class="indicator indicator--mobile">
                              <a href="{{ route('cart.index') }}" class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-cart-plus"></i>
                                    <span class="indicator__value">
                                       @if(Auth::guard('customer')->check())
                                          {{ Carts::count()}}
                                          @else
                                          {{ ShoppingCart::count() }} 
                                       @endif
                                    </span>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>