@extends('layouts.app2')

@section('title', 'Register')

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
                           <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>Register</h1>
                  </div>
               </div>
            </div>
            <div class="block">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-md-6 d-flex mt-4 mt-md-0">
                        <div class="card flex-grow-1 mb-0">
                           <div class="card-body">
                              <h3 class="card-title text-center">Customer Registration</h3>
                              <form action ="{{ route('customer.register') }}" method="post">
                                 @csrf
                                 <div class="form-group"><label>First Name</label> <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name">
                                    @error('first_name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                                 <div class="form-group"><label>Last Name</label> <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Enter First Name">
                                    @error('last_name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                                 <div class="form-group"><label>Email address</label> <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address">
                                    @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                                 <div class="form-group"><label>Password</label> <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                    @error('password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                                 <div class="form-group"><label>Repeat Password</label> <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="review" name="password_confirmation" placeholder="Repeat Password">
                                    @error('password_confirmation')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                                 <button type="submit" class="btn btn-primary mt-4">Register</button>
                                 <small class="form-text text-muted">Already a customer?  <a href="{{ route('login.html') }}">Signin</a></small>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
@endsection