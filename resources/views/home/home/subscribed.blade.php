@extends('layouts.app2')
@section('title')
Subscribed
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
                              <a href="{{ route('shop') }}">Subscriptions</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i style="height: 9px; width: 6px;" class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">
                               Subscribed
                           </li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>
                        Subscriptions
                     </h1>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                     <div class="col-12">
                        <div class="alert alert-primary alert-lg mb-3 alert-dismissible fade show">
                           Your email address ({{$email}}) has successfully been subscribed to our newsletter. You can <a href="#">now go shopping</a>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
@endsection