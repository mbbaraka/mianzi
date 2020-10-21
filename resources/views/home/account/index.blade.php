@extends('layouts.app2')

@section('title', 'Dashboard')

@section('content')
 <div class="site__body">
   <div class="page-header">
      <div class="page-header__container container">
         <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="index.html">Home</a> 
                     <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                     </svg>
                  </li>
                  <li class="breadcrumb-item">
                     <a href="#">Account</a> 
                     <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                     </svg>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
               </ol>
            </nav>
         </div>
         <div class="page-header__title">
            <h1>Dashboard</h1>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-4 order-0 order-lg-0">
            <div class="block block-sidebar block-sidebar--position--start">
               <div class="block-sidebar__item">
                  <div class="widget-categories widget-categories--location--blog widget">
                     <ul class="widget-categories__list" data-collapse data-collapse-opened-class="widget-categories__item--open">
                         <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="#">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <i class="fa fa-bar-chart"></i>
                                 </svg>
                                 Dashboard
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="#">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <i class="fa fa-tags"></i>
                                 </svg>
                                 Orders
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="#">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <i class="fa fa-map"></i>
                                 </svg>
                                 Addresses
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="#">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <i class="fa fa-envelope"></i>
                                 </svg>
                                 Subscription
                              </a>
                           </div>
                        </li>
                         <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="#">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <i class="fa fa-user"></i>
                                 </svg>
                                 My Account
                              </a>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-8">
            <div class="block">
               <table class="wishlist">
                     <thead class="wishlist__head">
                        <tr class="wishlist__row">
                           <th class="wishlist__column wishlist__column--image">Image</th>
                           <th class="wishlist__column wishlist__column--product">Product</th>
                           <th class="wishlist__column wishlist__column--stock">Stock Status</th>
                           <th class="wishlist__column wishlist__column--price">Price</th>
                           <th class="wishlist__column wishlist__column--tocart"></th>
                           <th class="wishlist__column wishlist__column--remove"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>hello</td>
                           <td>hello</td>
                           <td>hello</td>
                           <td>hello</td>
                           <td>hello</td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection