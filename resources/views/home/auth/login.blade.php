@extends('layouts.app2')

@section('title', 'Login')

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
                              <a href="#">My Account</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>Login</h1>
                  </div>
               </div>
            </div>
            <div class="block">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-md-6 d-flex">
                        <div class="card flex-grow-1 mb-md-0">
                           <div class="card-body">
                              <h3 class="card-title">Login</h3>
                              <form action="{{ route('login.check') }}" method ="post">
                        		@csrf
                        		@if (session('error'))
                        			<span class="invalid-feedback" role="alert">
	                                    <strong>{{ session('error') }}</strong>
	                              </span>
                        		@endif
                                 <div class="form-group"><label>Email address</label> <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" name="email" value="{{old('email')}}">
                                 	 @error('email')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                             @enderror
                                 </div>
                                 <div class="form-group"><label>Password</label> <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"> 
                                 	@error('password')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                             @enderror
                                   @error('error')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                   @enderror
                                   <br>
                                 	<small class="form-text text-muted"><a href="#">Forgot Password?</a></small>
                                 </div>
                                 {{-- <div class="form-group">
                                    <div class="form-check">
                                       <span class="form-check-input input-check">
                                          <span class="input-check__body">
                                             <input class="input-check__input" type="checkbox" id="login-remember"> <span class="input-check__box"></span> 
                                             <svg class="input-check__icon" width="9px" height="7px">
                                                <use xlink:href="images/sprite.svg#check-9x7"></use>
                                             </svg>
                                          </span>
                                       </span>
                                       <label class="form-check-label" for="login-remember">Remember Me</label> 
                                    </div>
                                 </div> --}}
                                 <button type="submit" class="btn btn-primary">Login</button>
                                 <small class="form-text text-muted">New Customer?  <a href="{{ route('register.html') }}">Signup</a></small>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
@endsection