            <div class="products-view__list products-list" data-layout="grid-5-full" data-with-features="false">
               <div class="container">
                  <div class="block-header">
                     <h3 class="block-header__title">Recently Viewed Products</h3>
                     <div class="block-header__divider"></div>
                  </div>
                  <div class="products-list__body">
                     <?php if(Auth::guard('customer')->check()): ?>
                        <?php $__currentLoopData = Products::recent(Auth::guard('customer')->id(), $product->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="block-products-carousel__column">
                              <div class="block-products-carousel__cell">
                                 <div class="product-card">
                                    <button class="product-card__quickview" type="button">
                                       <svg width="16px" height="16px">
                                          <i style="width: 16px; height: 16px;" class="fa fa-expand"></i>
                                       </svg>
                                       <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__badges-list">
                                    <?php if(($product->product->sale_price != "") && ($product->product->sale_price < $product->product->price)): ?>
                                       <div class="product-card__badge product-card__badge--new">
                                          <?php echo e(number_format((($product->product->price - $product->product->sale_price)/$product->product->price)* 100).'%'); ?>

                                       </div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="product-card__image"><a href="<?php echo e(url($product->slug.'.html')); ?>"><img style="width: 180px; height: 180px;" src="<?php echo e(asset('storage/product/'.$product->cover)); ?>" alt="<?php echo e($product->title); ?>"></a></div>
                                    <div class="product-card__info">
                                       <div class="product-card__name"><a href="<?php echo e(url($product->slug.'.html')); ?>"><?php echo e($product->title); ?></a></div>
                                       <div class="product-card__rating">
                                          <div class="rating">
                                             <div class="rating__body">
                                                <small style="color: #ffd333; font-size: 10px;">
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star-half"></i>
                                               </small>
                                             </div>
                                          </div>
                                          <div class="product-card__rating-legend">9 Reviews</div>
                                       </div>
                                       <ul class="product-card__features-list">
                                          <li>Speed: 750 RPM</li>
                                          <li>Power Source: Cordless-Electric</li>
                                          <li>Battery Cell Type: Lithium</li>
                                          <li>Voltage: 20 Volts</li>
                                          <li>Battery Capacity: 2 Ah</li>
                                       </ul>
                                    </div>
                                    <div class="product-card__actions">
                                       <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                       <div class="product-card__prices">
                                          <span style="text-decoration: line-through;"><small><?php echo e(config('shop.symbol').' '.number_format($product->price)); ?></small></span>
                                          <span class="float-right"><?php echo e(config('shop.symbol').' '.number_format($product->sale_price)); ?></span>
                                       </div>
                                       <div class="product-card__buttons">
                                          <form action="<?php echo e(route('cart.add', $product->id)); ?>" method= 'post'>
                                             <?php echo csrf_field(); ?>
                                             <input type="hidden" name="qty" value="1">
                                             <input type="hidden" name="price" value="<?php if($product->sale_price != ""): ?>
                                                <?php echo e($product->sale_price); ?>

                                             <?php else: ?> <?php echo e($product->price); ?> <?php endif; ?>">
                                             <button class="btn btn-primary product-card__addtocart" type="submit">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="submit">Add To Cart</button> 
                                          </form>
                                          <a class="btn btn-light product-card__wishlist" href="<?php echo e(route('add-to-wishlist',  $product->id)); ?>" title="Add to wishlist">
                                             <i style="width: 16px; height: 16px;" class="fas fa-heart"></i>
                                             <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                          </a>
                                          <a class="btn btn-light product-card__compare" href="<?php echo e(route('add-to-compare', $product->id)); ?>" title="Add to compare">
                                             <i style="width: 16px; height: 16px;" class="fas fa-exchange-alt"></i>
                                             <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php else: ?>
                        <?php $__currentLoopData = Products::recent($session, $product->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="products-list__item">
                                 <div class="product-card">
                                    <button class="product-card__quickview" type="button">
                                       <svg width="16px" height="16px">
                                          <i style="width: 16px; height: 16px;" class="fa fa-expand"></i>
                                       </svg>
                                       <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__badges-list">
                                    <?php if(($product->product->sale_price != "") && ($product->product->sale_price < $product->product->price)): ?>
                                       <div class="product-card__badge product-card__badge--new">
                                          <?php echo e(number_format((($product->product->price - $product->product->sale_price)/$product->product->price)* 100).'%'); ?>

                                       </div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="product-card__image"><a href="<?php echo e(url($product->product->slug.'.html')); ?>"><img style="width: 180px; height: 180px;" src="<?php echo e(asset('storage/product/'.$product->product->cover)); ?>" alt="<?php echo e($product->product->title); ?>"></a></div>
                                    <div class="product-card__info">
                                       <div class="product-card__name"><a href="<?php echo e(url($product->product->slug.'.html')); ?>"><?php echo e($product->product->title); ?></a></div>
                                       <div class="product-card__rating">
                                          <div class="rating">
                                             <div class="rating__body">
                                                <small style="color: #ffd333; font-size: 10px;">
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star-half"></i>
                                               </small>
                                             </div>
                                          </div>
                                          <div class="product-card__rating-legend">9 Reviews</div>
                                       </div>
                                       <ul class="product-card__features-list">
                                          <li>Speed: 750 RPM</li>
                                          <li>Power Source: Cordless-Electric</li>
                                          <li>Battery Cell Type: Lithium</li>
                                          <li>Voltage: 20 Volts</li>
                                          <li>Battery Capacity: 2 Ah</li>
                                       </ul>
                                    </div>
                                    <div class="product-card__actions">
                                       <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                       <div class="product-card__prices">
                                          <span style="text-decoration: line-through;"><small><?php echo e(config('shop.symbol').' '.number_format($product->product->price)); ?></small></span>
                                          <span class="float-right"><?php echo e(config('shop.symbol').' '.number_format($product->product->sale_price)); ?></span>
                                       </div>
                                       <div class="product-card__buttons">
                                          <form action="<?php echo e(route('cart.add', $product->product->id)); ?>" method= 'post'>
                                             <?php echo csrf_field(); ?>
                                             <input type="hidden" name="qty" value="1">
                                             <input type="hidden" name="price" value="<?php if($product->sale_price != ""): ?>
                                                <?php echo e($product->product->sale_price); ?>

                                             <?php else: ?> <?php echo e($product->product->price); ?> <?php endif; ?>">
                                             <button class="btn btn-primary product-card__addtocart" type="submit">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="submit">Add To Cart</button> 
                                          </form>
                                          <a class="btn btn-light product-card__wishlist" href="<?php echo e(route('add-to-wishlist',  $product->product->id)); ?>" title="Add to wishlist">
                                             <i style="width: 16px; height: 16px;" class="fas fa-heart"></i>
                                             <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                          </a>
                                          <a class="btn btn-light product-card__compare" href="<?php echo e(route('add-to-compare', $product->product->id)); ?>" title="Add to compare">
                                             <i style="width: 16px; height: 16px;" class="fas fa-exchange-alt"></i>
                                             <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                  </div>
               </div>
            </div><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/product/recent-views.blade.php ENDPATH**/ ?>