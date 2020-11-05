<!-- .block-features / end --><!-- .block-products-carousel -->
            <div class="block block-products-carousel" data-layout="grid-4">
               <div class="container">
                  <div class="block-header">
                     <h3 class="block-header__title">Featured Products</h3>
                     <div class="block-header__divider"></div>
                     <ul class="block-header__groups-list">
                        <li><button type="button" class="block-header__group block-header__group">View All</button></li>
                        
                     </ul>
                     <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                           <i style="width: 7px; height: 11px;" class="fa fa-angle-left"></i>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                           <i style="width: 7px; height: 11px;" class="fa fa-angle-right"></i>
                        </button>
                     </div>
                  </div>
                  <div class="block-products-carousel__slider">
                      <div class="owl-carousel">
                      	<?php $__currentLoopData = Products::get('featured'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <div class="block-products-carousel__column">
	                           <div class="block-products-carousel__cell">
	                              <div class="product-card">
	                                 <button class="product-card__quickview" type="button">
	                                    <i style="width: 16px; height: 16px;" class="fa fa-expand"></i>
	                                    <span class="fake-svg-icon"></span>
	                                 </button>
	                                 <div class="product-card__badges-list">
	                                    <?php if(($product->sale_price != "") && ($product->sale_price < $product->price)): ?>
	                                       <div class="product-card__badge product-card__badge--new">
	                                          <?php echo e(number_format((($product->price - $product->sale_price)/$product->price)* 100).'%'); ?>

	                                       </div>
	                                    <?php endif; ?>
	                                 </div>
	                                 <div class="product-card__image"><a href="<?php echo e(url($product->slug.'.html')); ?>"><img style="width: 228.5px; height: 228.5px;" src="<?php echo e(asset('app/product/'.$product->cover)); ?>" alt="<?php echo e($product->title); ?>"></a></div>
	                                 <div class="product-card__info">
	                                    <div class="product-card__name"><a href="<?php echo e(url($product->slug.'.html')); ?>"><?php echo e($product->title); ?></a></div>
	                                    <div class="product-card__rating">
	                                     <?php if(intval(count(($product->review)) > 0)): ?>
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
	                                       <div class="product-card__rating-legend"><?php echo e(count($product->review)); ?> Reviews</div>
	                                      <?php else: ?>
	                                      <div class="product-card__rating-legend">No Reviews Yet</div>
	                                      <?php endif; ?>
	                                    </div>
	                                    <ul class="product-card__features-list">
	                                       <?php $__currentLoopData = Products::attributes($product->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								             <li><?php echo e($attr->attributesValues->attribute->name); ?>m: <?php echo e($attr->attributesValues->value); ?></li>
								           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                     </div>
                  </div>
               </div>
            </div><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/home/featured.blade.php ENDPATH**/ ?>