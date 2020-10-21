<!-- .topbar -->
               <div class="site-header__topbar topbar">
                  <div class="topbar__container container">
                     <div class="topbar__row">
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ route('about-us') }}">About Us</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ route('contact-us') }}">Contacts</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="#">Store Location</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="track-order.html">Track Order</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="blog-classic.html">Blog</a></div>
                        <div class="topbar__spring"></div>
                        <div class="topbar__item">
                           <div class="topbar-dropdown">
                              <button class="topbar-dropdown__btn" type="button">
                                 @if(Auth::guard('customer')->check())
                                 Hi, {{Auth::guard('customer')->user()->first_name}}
                                 @else
                                 My Account
                                 @endif
                                 <svg width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                 </svg>
                              </button>
                              <div class="topbar-dropdown__body">
                                 <!-- .menu -->
                                 <ul class="menu menu--layout--topbar">
                                    @if(Auth::guard('customer')->check())
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Addresses</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @else
                                    <li><a href="{{ route('login.html') }}">Login</a></li>
                                    <li><a href="{{ route('register.html') }}">Register</a></li>
                                    @endif
                                 </ul>
                                 <!-- .menu / end -->
                              </div>
                           </div>
                        </div>
                        {{-- <div class="topbar__item">
                           <div class="topbar-dropdown">
                              <button class="topbar-dropdown__btn" type="button">
                                 Currency: <span class="topbar__item-value">UGX</span> 
                                 <svg width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                 </svg>
                              </button>
                              <div class="topbar-dropdown__body">
                                 <!-- .menu -->
                                 <ul class="menu menu--layout--topbar">
                                    <li><a href="">UGX</a></li>
                                 </ul>
                                 <!-- .menu / end -->
                              </div>
                           </div>
                        </div> --}}
                     </div>
                  </div>
               </div>
               <!-- .topbar / end -->
               <div class="site-header__middle container">
                  <div class="site-header__logo">
                     <a href="{{ url('/') }}">
                        <img src="{{ asset('frontend/images/layout-6/logo.png') }}" class="img-fluid  " alt="logo-header">
                     </a>
                  </div>
                  <div class="site-header__search">
                     <div class="search">
                        {{-- <form class="search__form" action="{{ route('search') }}" method="get">
                           <input class="search__input" name="query" placeholder="Search over 10,000 products" aria-label="Site search" type="search" autocomplete="off"> 
                           <button class="search__button" type="submit">
                              <i style="width: 20px; height: 20px;" class="fa fa-search"></i>
                           </button>
                           <div class="search__border"></div>
                        </form> --}}
                        @livewire('search')
                     </div>
                  </div>
                  <div class="site-header__phone">
                     <div class="site-header__phone-title">Customer Service</div>
                     <div class="site-header__phone-number">0773034311</div>
                  </div>
               </div>