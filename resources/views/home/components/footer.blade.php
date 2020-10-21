<footer class="site__footer">
            <div class="site-footer">
               <div class="container">
                  <div class="site-footer__widgets">
                     <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="site-footer__widget footer-contacts">
                              <h5 class="footer-contacts__title">Contact Us</h5>
                              <div class="footer-contacts__text">For any inquires feel free to reach to us</div>
                              <ul class="footer-contacts__contacts">
                                 <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 725 Muni University, Arua Uganda</li>
                                 <li><a href="mailto:mianzi.co.ug"><i class="footer-contacts__icon far fa-envelope"></i> info@mianzi.co.ug</a></li>
                                 <li><a href="tel:0773034311"><i class="footer-contacts__icon fas fa-mobile-alt"></i> (256) 773-034-311</a></li>
                                 <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 07:00am - 07:00pm</li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                           <div class="site-footer__widget footer-links">
                              <h5 class="footer-links__title">Information</h5>
                              <ul class="footer-links__list">
                                 <li class="footer-links__item"><a href="{{ route('about-us') }}" class="footer-links__link">About Us</a></li>
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Delivery Information</a></li>
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy Policy</a></li>
                                 <li class="footer-links__item"><a href="{{ route('contact-us') }}" class="footer-links__link">Contact Us</a></li>
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Returns</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                           <div class="site-footer__widget footer-links">
                              <h5 class="footer-links__title">My Account</h5>
                              <ul class="footer-links__list">
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Store Locations</a></li>
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Order History</a></li>
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Wishlist</a></li>
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Newsletter</a></li>
                                 <li class="footer-links__item"><a href="#" class="footer-links__link">Affiliate</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                           <div class="site-footer__widget footer-newsletter">
                              <h5 class="footer-newsletter__title">Newsletter</h5>
                              <div class="footer-newsletter__text">Subscribe to our newsletter to receive updates on our latest offers and discounts!</div>
                              @error('subscription_email')<br>
                                    <span class="text-danger">{{$message}}</span>
                              @enderror
                              <form action="{{ route('subscribe') }}" method="post" class="footer-newsletter__form">
                                 @csrf
                                 <label class="sr-only" for="footer-newsletter-address">Email Address</label> <input name="subscription_email" type="text" class="footer-newsletter__form-input form-control @error('subscription_email') is-invalid @enderror" id="footer-newsletter-address" placeholder="Email Address...">
                                 
                                 <button type="submit" class="footer-newsletter__form-button btn btn-primary">Subscribe</button></form>
                              <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on social networks</div>
                              <ul class="footer-newsletter__social-links">
                                 <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                 <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                 <li class="footer-newsletter__social-link footer-newsletter__social-link--youtube"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                 {{-- <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                 <li class="footer-newsletter__social-link footer-newsletter__social-link--rss"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fas fa-rss"></i></a></li> --}}
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="site-footer__bottom">
                     <div class="site-footer__copyright"><a target="" href="https://www.mianzi.co.ug">Mianzi</a></div>
                     <div class="site-footer__payments"><img src="{{ asset('frontend/stroyka/images/payments.png') }}" alt=""></div>
                  </div>
               </div>
            </div>
         </footer>