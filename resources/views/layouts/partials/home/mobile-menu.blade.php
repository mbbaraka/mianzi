      <div class="mobilemenu">
         <div class="mobilemenu__backdrop"></div>
         <div class="mobilemenu__body">
            <div class="mobilemenu__header">
               <div class="mobilemenu__title">Menu</div>
               <button type="button" class="mobilemenu__close">
                  <i style="height: 20px; width: 20px" class="fa fa-arrow-left"></i>
               </button>
            </div>
            <div class="mobilemenu__content">
               <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                  
                  <li class="mobile-links__item" data-collapse-item>
                     <div class="mobile-links__item-title">
                        <a href="#" class="mobile-links__item-link">Categories</a> 
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                           <i style="height: 7px; width: 12px" class="fa fa-angle-down"></i>
                        </button>
                     </div>
                     <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                           @foreach(Categories::getRoot() as $categories)
                              @if(count(Categories::subcategories($categories->id)) > 0)
                                 <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                       <a href="{{ url('category/'.$categories->slug.'.html') }}" class="mobile-links__item-link">{{ $categories->title }}</a> 
                                       <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                          <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                             <i style="height: 7px; width: 12px" class="fa fa-angle-down"></i>
                                          </button>
                                       </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                       <ul class="mobile-links mobile-links--level--2">
                                          @foreach(Categories::subcategories($categories->id) as $sub_categories)
                                          <li class="mobile-links__item" data-collapse-item>
                                             <div class="mobile-links__item-title"><a href="{{ url('category/'.$sub_categories->slug.'.html') }}" class="mobile-links__item-link">{{ $sub_categories->title }}</a></div>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </li>
                              @else
                                  <li class="mobile-links__item">
                                    <div class="mobile-links__item-title">
                                       <a href="{{ url('category/'.$categories->slug.'.html') }}" class="mobile-links__item-link">{{ $categories->title }}</a>
                                    </div>
                                  </li>                                 
                              @endif
                           @endforeach
                        </ul>
                     </div>
                  </li>
                  <li class="mobile-links__item" data-collapse-item>
                     <div class="mobile-links__item-title">
                        <a data-collapse-trigger class="mobile-links__item-link">Account</a> 
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                           <i style="height: 7px; width: 12px" class="fa fa-angle-down"></i>
                        </button>
                     </div>
                     <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                           @if(Auth::guard('customer')->check())
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Orders</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Track Order</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Addresses</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class="mobile-links__item-link">Logout</a></div>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                              </li>
                           @else
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Login</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">French</a></div>
                              </li>
                           @endif
                           
                           
                        </ul>
                     </div>
                  </li>
                  <div class="container mt-2">
                     <span class="text-center">Quick Links</span>
                  </div>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">About Us</a> 
                     </div>
                  </li>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">Contact Us</a> 
                     </div>
                  </li>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">FAQ</a> 
                     </div>
                  </li>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">Blog</a> 
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>