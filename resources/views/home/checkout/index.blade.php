@extends('layouts.app2')

@section('title', 'Checkout')

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
                           <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                        </svg>
                     </li>
                     <li class="breadcrumb-item">
                        <a href="">Account</a> 
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                           <i class="fa fa-angle-right"></i>
                        </svg>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
               </nav>
            </div>
            <div class="page-header__title">
               <h1>Checkout</h1>
            </div>
         </div>
      </div>
      <div class="checkout block">
         <div class="container">
            <div class="row">
                  @if(count($carts)>0)
                    @if($address)
                     <div class="col-12 col-lg-6 col-xl-7">
                        <div class="card mb-lg-0">
                           <div class="card-body">
                              <h3 class="card-title">Billing Details</h3>
                              <table class="checkout__totals">
                                 <tbody class="checkout__totals-subtotals">
                                    <tr>
                                       <th>First Name</th>
                                       <td>{{$address->customer->first_name}}</td>
                                    </tr>
                                    <tr>
                                       <th>Last Name</th>
                                       <td>{{$address->customer->last_name}}</td>
                                    </tr>
                                    <tr>
                                       <th>Email</th>
                                       <td>{{$address->customer->email}}</td>
                                    </tr>
                                    <tr>
                                       <th>Phone Number</th>
                                       <td>{{$address->customer->mobile}}</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="card-divider"></div>
                           <div class="card-body">
                              <h3 class="card-title">Shipping Details</h3>
                              <table class="checkout__totals">
                                 <tbody class="checkout__totals-subtotals">
                                    <tr>
                                       <th>Address One</th>
                                       <td>{{$address->customer->first_name}}</td>
                                    </tr>
                                    <tr>
                                       <th>District</th>
                                       <td>{{$address->customer->email}}</td>
                                    </tr>
                                    <tr>
                                       <th>Region</th>
                                       <td>{{$address->customer->mobile}}</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <div class="form-group">
                                 <div class="form-check">
                                    <span class="form-check-input input-check">
                                       <span class="input-check__body">
                                          <input class="input-check__input" type="checkbox" id="checkout-different-address"> <span class="input-check__box"></span> 
                                       </span>
                                    </span>
                                    <label class="form-check-label" for="checkout-different-address">Ship to a different address?</label>
                                 </div>
                              </div>
                              <div class="form-group"><label for="checkout-comment">Order notes <span class="text-muted">(Optional)</span></label> <textarea id="checkout-comment" class="form-control" rows="4"></textarea></div>
                           </div>
                        </div>
                     </div>
                    @else
                     <div class="col-12 col-lg-6 col-xl-7">
                        <div class="card mb-lg-0">
                           <div class="card-body">
                              <h3 class="card-title">Address</h3>
                              <div class="form-row">
                                 <div class="form-group col-md-6"><label for="checkout-first-name">First Name</label> <input type="text" class="form-control" id="checkout-first-name" placeholder="First Name"></div>
                                 <div class="form-group col-md-6"><label for="checkout-last-name">Last Name</label> <input type="text" class="form-control" id="checkout-last-name" placeholder="Last Name"></div>
                              </div>
                              <div class="form-group"><label for="address-1">Address 1 <span class="text-muted">(Optional)</span></label> <input type="text" class="form-control" id="address-1" placeholder="Address 1"></div>
                              <div class="form-group"><label for="address-2">Address 2 <span class="text-muted">(Optional)</span></label> <input type="text" class="form-control" id="address-2" placeholder="Address 2"></div>
                              <div class="form-group">
                                 <label for="checkout-country">Region</label> 
                                 <select id="checkout-country" class="form-control">
                                    <option>Select a region...</option>
                                    <option>United States</option>
                                    <option>Russia</option>
                                    <option>Italy</option>
                                    <option>France</option>
                                    <option>Ukraine</option>
                                    <option>Germany</option>
                                    <option>Australia</option>
                                 </select>
                              </div>
                              <div class="form-group"><label for="checkout-street-address">Mobile Phone</label> <input type="text" class="form-control" id="checkout-street-address" placeholder="Street Address"></div>
                           </div>
                        </div>
                     </div>
                    @endif
                  @else
                  <div class="col-12 mb-3">
                     <div class="alert alert-lg alert-primary">You've no item to checkout. <a href="{{ route('shop') }}"> Shop now.</a></div>
                  </div>
                  @endif
               <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                  <div class="card mb-0">
                     <div class="card-body">
                        <h3 class="card-title">Your Order</h3>
                        <table class="checkout__totals">
                           <thead class="checkout__totals-header">
                              <tr>
                                 <th>Product</th>
                                 <th>Total</th>
                              </tr>
                           </thead>
                           <tbody class="checkout__totals-products">
                              @foreach($carts as $cart)
                              <tr>
                                 <td style="text-transform: capitalize;">{{$cart->product->title}} × {{$cart->qty}}</td>
                                 <td>{{ config('shop.symbol').' '. number_format($cart->qty * $cart->price) }}</td>
                              </tr>
                              @endforeach
                           </tbody>
                           <tbody class="checkout__totals-subtotals">
                              <tr>
                                 <th>Subtotal</th>
                                 <td>{{ config('shop.symbol').' '. number_format(Carts::subtotal()) }}</td>
                              </tr>
                              <hr>
                              <tr>
                                 <th>Shipping</th>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <div class="payment-methods">
                                       <ul class="payment-methods__list">
                                          <li class="payment-methods__item payment-methods__item--active">
                                             <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input" name="shipping_method" value="standard" type="radio" checked> <span class="input-radio__circle"></span> </span></span><span class="payment-methods__item-title">Standard Shipping</span></label>
                                             <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-description text-muted" style="text-align: left;">
                                                   <span>Standard shipping delivering to your home.</span>
                                                   <p>Shipping Fee: <span>UGX 23,000</span></p>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="payment-methods__item" data-toggle="modal" data-target="#pickupstation">
                                             <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input" name="shipping_method" value="standard" type="radio"> <span class="input-radio__circle"></span> </span></span><span class="payment-methods__item-title">Local Pickup Station</span></label>
                                             <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-description text-muted" style="text-align: left;">
                                                   <span>Standard shipping delivering to a local pickup station.</span>
                                                   <p>Shipping Fee: <span>UGX 23,000</span></p>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot class="checkout__totals-footer">
                              <tr>
                                 <th>Total</th>
                                 <td>$5,882.00</td>
                              </tr>
                           </tfoot>
                        </table>
                        <div class="payment-methods">
                           <h4>Payment</h4>
                           <ul class="payment-methods__list">
                              <li class="payment-methods__item payment-methods__item--active">
                                 <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input" name="checkout_payment_method" type="radio" checked="checked"> <span class="input-radio__circle"></span> </span></span><span class="payment-methods__item-title">Mtn Momo</span></label>
                                 <div class="payment-methods__item-container">
                                    <div class="payment-methods__item-description text-muted">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="checkout__agree form-group">
                           <div class="form-check">
                              <span class="form-check-input input-check">
                                 <span class="input-check__body">
                                    <input class="input-check__input" type="checkbox" id="checkout-terms"> <span class="input-check__box"></span> 
                                    <svg class="input-check__icon" width="9px" height="7px">
                                       <use xlink:href="images/sprite.svg#check-9x7"></use>
                                    </svg>
                                 </span>
                              </span>
                              <label class="form-check-label" for="checkout-terms">I have read and agree to the website <a target="_blank" href="terms-and-conditions.html">terms and conditions</a>*</label>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-xl btn-block">Continue</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade show" id="pickupstation">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
                     <h5>Select Pickup Stations</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="card"> 
                  <div class="card-body">
                     @if(!$address)
                     <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                              <label for="checkout-country">Region</label> 
                              <select id="checkout-country" class="form-control">
                                 <option>Select a region...</option>
                                 <option>United States</option>
                                 <option>Russia</option>
                                 <option>Italy</option>
                                 <option>France</option>
                                 <option>Ukraine</option>
                                 <option>Germany</option>
                                 <option>Australia</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label for="checkout-country">Region</label> 
                              <select id="checkout-country" class="form-control">
                                 <option>Select a region...</option>
                                 <option>United States</option>
                                 <option>Russia</option>
                                 <option>Italy</option>
                                 <option>France</option>
                                 <option>Ukraine</option>
                                 <option>Germany</option>
                                 <option>Australia</option>
                              </select>
                           </div>
                        </div>
                        <hr>
                     </div>
                     @else()  
                     <span>Pick your item from a local pickup station at only {{Shop::pickupFee($address->district_id)->fee * Carts::count()}}  </span>
                     <div class="row justify-content-center">
                        @foreach(Shop::PickupStation($address->district_id) as $pickup)
                           @livewire('pickup', ['pickup' => $pickup, 'idd' =>$address->district_id])
                        @endforeach
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection