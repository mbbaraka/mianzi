<header class="site__header d-lg-block d-none">
            <div class="site-header">
               <?php echo $__env->make('layouts.partials.home.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <div class="site-header__nav-panel">
                  <div class="nav-panel">
                     <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                           <div class="nav-panel__departments">
                              <!-- .departments -->
                              <div class="departments" data-departments-fixed-by="">
                                 <div class="departments__body">
                                    <div class="departments__links-wrapper">
                                       <ul class="departments__links">
                                        <?php $__currentLoopData = Categories::getRoot(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if(count(Categories::subcategories($categories->id)) > 0): ?>
                                          <li class="departments__item">
                                             <a href="<?php echo e(url('category/'.$categories->slug.'.html')); ?>">
                                                <?php echo e($categories->title); ?> 
                                                <svg class="departments__link-arrow" width="6px" height="9px">
                                                   <i class="fa fa-angle-right float-right"></i>
                                                </svg>
                                             </a>
                                             <div class="departments__megamenu departments__megamenu--xl">
                                                <!-- .megamenu -->
                                                <div class="megamenu megamenu--departments">
                                                   <div class="row">
                                                      <?php $__currentLoopData = Categories::subcategories($categories->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <div class="col-3">
                                                         <ul class="megamenu__links megamenu__links--level--0">
                                                            <?php if(count(Categories::sub_subcategories($sub_categories->id)) > 0): ?>
                                                               <li class="megamenu__item megamenu__item--with-submenu">
                                                                  <a href="<?php echo e(url('category/'.$sub_categories->slug.'.html')); ?>"><?php echo e($sub_categories->title); ?></a>
                                                                  <ul class="megamenu__links megamenu__links--level--1">
                                                                     <?php $__currentLoopData = Categories::sub_subcategories($sub_categories->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                     <li class="megamenu__item"><a href="<?php echo e(url('category/'.$items->slug.'.html')); ?>"><?php echo e($items->title); ?></a></li>
                                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                  </ul>
                                                               </li>
                                                               <?php else: ?>
                                                               <li class="megamenu__item"><a href="<?php echo e(url('category/'.$sub_categories->slug.'.html')); ?>"><?php echo e($sub_categories->title); ?></a></li>
                                                            <?php endif; ?>
                                                         </ul>
                                                      </div>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <div class="col-3">
                                                         <img src="<?php echo e(asset('storage/category/'.$categories->thumbnail)); ?>">
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- .megamenu / end -->
                                             </div>
                                          </li>
                                          <?php else: ?>
                                          <li class="departments__item"><a href="<?php echo e(url('category/'.$categories->slug.'.html')); ?>"><?php echo e($categories->title); ?></a></li>
                                          <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </ul>
                                    </div>
                                 </div>
                                 <button class="departments__button">
                                    <svg class="departments__button-arrow" width="9px" height="6px">
                                       <i style="width: 18px; height: 14px;" class="fas fa-bars"></i>
                                    </svg>
                                    Shop By Category 
                                 </button>
                              </div>
                              <!-- .departments / end -->
                           </div>
                           <!-- .nav-links -->
                           <div class="nav-panel__nav-links nav-links">
                              <ul class="nav-links__list">
                                 <li class="nav-links__item"><a href="<?php echo e(route('about-us')); ?>"><span>About Us</span></a></li>
                                 <li class="nav-links__item"><a href="<?php echo e(route('contact-us')); ?>"><span>Contact Us</span></a></li>
                                 <li class="nav-links__item"><a href="<?php echo e(route('faq')); ?>"><span>FAQ</span></a></li>
                                 <li class="nav-links__item ml-5"><a href="tel:0773034311"><span><i class="fas fa-phone">&nbsp;&nbsp;</i> Call 0773034311 to Order</span></a></li>
                              </ul>
                           </div>
                           <!-- .nav-links / end -->
                           <div class="nav-panel__indicators">
                              <div class="indicator">
                                 <a href="<?php echo e(route('compare')); ?>" class="indicator__button">
                                    <span class="indicator__area">
                                       <i style="height: 20px; width: 20px" class="fas fa-exchange-alt"></i>
                                       <span class="indicator__value"><?php echo e(Compares::count()); ?></span>
                                    </span>
                                 </a>
                              </div>
                              <div class="indicator">
                                 <a href="<?php echo e(route('wishlists')); ?>" class="indicator__button">
                                    <span class="indicator__area">
                                       <i style="height: 20px; width: 20px" class="fas fa-heart"></i>
                                       <span class="indicator__value"><?php echo e(Wishlists::count()); ?></span>
                                    </span>
                                 </a>
                              </div>
                              <div class="indicator indicator--trigger--click">
                                 <a href="<?php echo e(route('cart.index')); ?>" class="indicator__button">
                                    <span class="indicator__area">
                                       <i style="height: 20px; width: 20px" class="fas fa-cart-plus"></i>
                                       <span class="indicator__value">
                                          <?php if(Auth::guard('customer')->check()): ?>
                                          <?php echo e(Carts::count()); ?>

                                          <?php else: ?>
                                          <?php echo e(ShoppingCart::count()); ?> 
                                          <?php endif; ?>
                                       </span>
                                    </span>
                                 </a>
                                 <div class="indicator__dropdown">
                                    <!-- .dropcart -->
                                    <?php if(Auth::guard('customer')->check()): ?>
                                    <?php if(Carts::count() > 0): ?>
                                    <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          <?php $__currentLoopData = Carts::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <div class="dropcart__product">
                                             <div class="dropcart__product-image"><a href="<?php echo e(url($carts->product->slug.'.html')); ?>"><img style="width: 70px; height: 70px;" src="<?php echo e(asset('storage/product/'.$carts->product->cover)); ?>" alt="<?php echo e($carts->product->title); ?>"></a>
                                             </div>
                                             <div class="dropcart__product-info">
                                                <div class="dropcart__product-name"><a href="<?php echo e(url($carts->product->slug.'.html')); ?>"><?php echo e($carts->product->title); ?></a></div>
                                                <div class="dropcart__product-meta"><span class="dropcart__product-quantity"><?php echo e($carts->qty); ?></span> x <span class="dropcart__product-price">
                                                   <?php if($carts->product->sale_price == ""): ?>
                                                   <?php echo e(config('shop.symbol').' '. number_format($carts->product->price)); ?>

                                                   <?php else: ?>
                                                   <?php echo e(config('shop.symbol').' '. number_format($carts->product->sale_price)); ?>

                                                   <?php endif; ?>
                                                </span></div>
                                             </div>
                                             <a href="<?php echo e(route('cart.destroy', $carts->id)); ?>" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                <i style="width: 10px; height: 10px;" class="fa fa-times"></i>
                                             </a>
                                          </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </div>
                                       <div class="dropcart__totals">
                                          <table>
                                             <tr>
                                                <th>Subtotal</th>
                                                <td>
                                                   <?php echo e(config('shop.symbol').' '. number_format(Carts::subtotal())); ?>

                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                       <div class="dropcart__buttons"><a class="btn btn-secondary" href="<?php echo e(route('cart.index')); ?>">View Cart</a> <a class="btn btn-primary" href="<?php echo e(route('checkout')); ?>">Checkout</a></div>
                                    </div>
                                    <?php else: ?>
                                     <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          <div class="dropcart__product">
                                             <span>No item in cart yet.  </span>&nbsp;&nbsp;
                                             <a href="<?php echo e(route('shop')); ?>">Shop Now!</a>
                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if(count(ShoppingCart::all()) > 0): ?>
                                    <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          <?php $__currentLoopData = ShoppingCart::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <div class="dropcart__product">
                                             <div class="dropcart__product-image"><a href="product.html"><img style="width: 70px; height: 70px;" src="<?php echo e(asset('storage/product/'.$carts->cover)); ?>" alt=""></a></div>
                                             <div class="dropcart__product-info">
                                                <div class="dropcart__product-name"><a href="product.html"><?php echo e($carts->name); ?></a></div>
                                                <div class="dropcart__product-meta"><span class="dropcart__product-quantity"><?php echo e($carts->qty); ?></span> x <span class="dropcart__product-price"><?php echo e(config('shop.symbol').' '. number_format($carts->price)); ?></span></div>
                                             </div>
                                             <a href="<?php echo e(route('cart.destroy', $carts->__raw_id)); ?>" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                <i style="width: 10px; height: 10px;" class="fa fa-times"></i>
                                             </a>
                                          </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </div>
                                       <div class="dropcart__totals">
                                          <table>
                                             <tr>
                                                <th>Subtotal</th>
                                                <td><?php echo e(config('shop.symbol') .' '. number_format(ShoppingCart::totalPrice())); ?></td>
                                             </tr>
                                          </table>
                                       </div>
                                       <div class="dropcart__buttons"><a class="btn btn-secondary" href="<?php echo e(route('cart.index')); ?>">View Cart</a> <a class="btn btn-primary" href="<?php echo e(route('checkout')); ?>">Checkout</a></div>
                                    </div>
                                    <?php else: ?>
                                    <div class="dropcart">
                                       <div class="dropcart__products-list">
                                          <div class="dropcart__product">
                                             <span>No item in cart yet.  </span>&nbsp;&nbsp;
                                             <a href="<?php echo e(route('shop')); ?>">Shop Now!</a>
                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <!-- .dropcart / end -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header><?php /**PATH C:\xampp\htdocs\mianzi2\resources\views/layouts/partials/home/header-2.blade.php ENDPATH**/ ?>