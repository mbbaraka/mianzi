@extends('layouts.app2')
@section('title')
{{ ucwords($search_text) }}
@endsection

@section('content')
<div class="site__body">
            <div class="page-header">
               <div class="page-header__container container">
                  <div class="page-header__breadcrumb">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                              <a href="{{ url('/') }}">Home</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i style="height: 9px; width: 6px;" class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item">
                              <a href="{{ route('shop') }}">Products</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i style="height: 9px; width: 6px;" class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">
                               {{ $search_text }}
                           </li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>
                        {{ ucwords($search_text) }}
                     </h1>
                     <p>You searched for {{ ucwords($search_text) }}<span class="float-right">{{count($products)}} Products Found </span></p>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="shop-layout shop-layout--sidebar--start">
                  <div class="shop-layout__sidebar">
                     <div class="block block-sidebar d-none d-lg-block">

                        @include('home.catalogue.filters', ['filters' => $attributes])
                        @include('home.catalogue.partials.latest')
                     </div>
                  </div>
                  <div class="shop-layout__content">
                     <div class="block">
                        <div class="products-view">
                           <div class="products-view__options">
                              <div class="view-options">
                                 <div class="view-options__layout">
                                    <div class="layout-switcher">
                                       <div class="layout-switcher__list">
                                          <button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active">
                                             <svg width="16px" height="16px">
                                                <i class="fa fa-th"></i>
                                             </svg>
                                          </button>
                                          <button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button">
                                             <svg width="16px" height="16px">
                                                <i class="fa fa-th-large"></i>
                                             </svg>
                                          </button>
                                          <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button">
                                             <svg width="16px" height="16px">
                                                <i class="fa fa-th-list"></i>
                                             </svg>
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="view-options__legend">Showing {{count($products)}} of {{count($all_products)}} products</div>
                                 <div class="view-options__divider"></div>
                                 <div class="float-left ">
                                    <button class="btn btn-sm btn-light d-lg-none" data-toggle="modal" data-target="#filter">
                                       <span>Filter</span>
                                       &nbsp;&nbsp;
                                       <span class="fas fa-filter"></span>
                                    </button>
                                 </div>
                                 <div class="view-options__control">
                                    <label for="">Sort By</label>
                                    <div>
                                       @include('home.catalogue.partials.sort')
                                    </div>
                                 </div>
                                 {{-- <div class="view-options__control">
                                    <label for="">Filter</label>
                                    <div>
                                       <select class="form-control form-control-sm" name="" id="">
                                          <option value="">12</option>
                                          <option value="">24</option>
                                       </select>
                                    </div>
                                 </div> --}}
                              </div>
                           </div>
                           <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false">
                              <div class="products-list__body">
                                 @if(count($products) > 0)
                                    @include('home.catalogue.list', ['products' => $products])
                                 @else
                                    <div class="m-5 text-center">
                                       <p>No results found for {{ ucwords($search_text) }}</p>
                                    </div>
                                 @endif
                                 
                              </div>
                           </div>
                           <div class="products-view__pagination">
                              <ul class="pagination justify-content-center">
                                 {{ $products->links()}}
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      {{-- Filter Model --}}
      @include('home.catalogue.partials.filterModal')
@endsection