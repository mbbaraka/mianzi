

<?php $__env->startSection('title', Str::ucfirst($product->title)); ?>

<?php $__env->startSection('content'); ?>
<div class="site__body">
            <div class="page-header">
               <div class="page-header__container container">
                  <div class="page-header__breadcrumb">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                              <a href="<?php echo e(url('/')); ?>">Home</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item">
                              <a href="<?php echo e(route('shop')); ?>">Products</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page"><?php echo e($product->title); ?></li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <div class="block">
               <div class="container">
                  <div class="product product--layout--standard" data-layout="standard">
                     <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                           <div class="product-gallery">
                              <div class="product-gallery__featured">
                                 <div class="owl-carousel" id="product-image"> 
                                 	<?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                	
                                 	<a href="images/products/product-16.html" target="_blank">
                                 		<img style="width: 491px; height: 491px" src="<?php echo e(asset('app/product/gallery/'.$images->image)); ?>" alt=""> 
                                 	</a>
                                 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </div>
                              </div>
                              <div class="product-gallery__carousel">
                                 <div class="owl-carousel" id="product-carousel">
                                 	<?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 	<a href="#" class="product-gallery__carousel-item">
                                 		<img style="width: 75px; height: 75px;" class="product-gallery__carousel-image" src="<?php echo e(asset('app/product/gallery/'.$images->image)); ?>" alt=""> 
                                 	</a>
                                 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- .product__gallery / end --><!-- .product__info -->
                        <div class="product__info">
                           <div class="product__wishlist-compare">
                              <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                                 <i style="width: 16px; height: 16px;" class="fa fa-heart"></i>
                              </button>
                              <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                                 <i style="width: 16px; height: 16px;" class="fa fa-exchange-alt"></i>
                              </button>
                           </div>
                           <h1 class="product__name"><?php echo e($product->title); ?></h1>
                           <div class="product__rating">
                              <?php if(intval(count(($product->review)) > 0)): ?>
                              <div class="product__rating-stars">
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
                              </div>
                              <div class="product__rating-legend"><a href="#"><?php echo e(count($product->review)); ?> Reviews</a><span>/</span><a href="#">Write A Review</a></div>
                              <?php else: ?>
                              <div class="product-card__rating-legend">No Reviews Yet</div>
                              <?php endif; ?>
                           </div>
                           <div class="product__description">
                           	<?php echo Str::limit($product->description, 300, '...'); ?>

                           </div>
                           <ul class="product__features">
                              
                           </ul>
                           <ul class="product__meta">
                              <li class="product__meta-availability">Availability: 
                                 <?php if(intval($product->qty) > 0): ?>
                                 <span class="text-success">In Stock</span>
                                 <?php else: ?>
                                 <span class="text-danger">Out of Stock</span>
                                 <?php endif; ?>
                              </li>
                              <li>Brand: <a href="#">Wakita</a></li>
                              <li>SKU: <?php echo e($product->sku); ?></li>
                           </ul>
                        </div>
                        <!-- .product__info / end --><!-- .product__sidebar -->
                        <div class="product__sidebar">
                           <div class="product__availability">Availability: 
                              <?php if(intval($product->qty) > 0): ?>
                              <span class="text-success">In Stock</span>
                              <?php else: ?>
                              <span class="text-danger">Out of Stock</span>
                              <?php endif; ?>
                           </div>
                           <div class="product__prices">
                           	<span class="text-muted" style="text-decoration: line-through;"><small><?php echo e(config('shop.symbol').' '.number_format($product->price)); ?></small></span>
	                        <span><?php echo e(config('shop.symbol').' '.number_format($product->sale_price)); ?></span>
                           </div>
                           <!-- .product__options -->
                           <form class="product__options" action="<?php echo e(route('cart.add', $product->id)); ?>" method= 'post'>
                           	<?php echo csrf_field(); ?>
                              <?php if(count($attributes)>0): ?>
                              <div class="form-group product__option row">
                              	<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col-md-4">
                                 	<label class="product__option-label"><?php echo e($attr->attributesValues->attribute->name); ?></label>
	                                 <div class="input-radio-label">
	                                    <div class="input-radio-label__list">
	                                    	<label>
	                                    		<span><?php echo e($attr->attributesValues->value); ?></span>
	                                    	</label>
	                                    </div>
	                                 </div>
                                 </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <?php endif; ?>
                              <div class="form-group product__option">
                                 <label class="product__option-label" for="product-quantity">Quantity</label>
                                 <div class="product__actions">
                                    <div class="product__actions-item">
                                       <div class="input-number product__quantity">
                                          <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1" name="qty">
                                          <div class="input-number__add"></div>
                                          <div class="input-number__sub"></div>
                                       </div>
                                    </div>
                                    <input type="hidden" name="price" value="<?php if($product->sale_price != ""): ?>
                                       <?php echo e($product->sale_price); ?>

                                    <?php else: ?> <?php echo e($product->price); ?> <?php endif; ?>">
                                    <div class="product__actions-item product__actions-item--addtocart"><button class="btn btn-primary btn-lg" type="submit">Add to cart</button></div>
                                    <div class="product__actions-item product__actions-item--wishlist">
                                       <a href="<?php echo e(route('add-to-wishlist',  $product->id)); ?>" class="btn btn-secondary btn-lg" data-toggle="tooltip" title="Wishlist">
                                          <i style="width: 16px; height: 16px;" class="fas fa-heart"></i>
                                       </a>
                                    </div>
                                    <div class="product__actions-item product__actions-item--compare">
                                       <a href="<?php echo e(route('add-to-compare', $product->id)); ?>" class="btn btn-secondary btn-lg" data-toggle="tooltip" title="Compare">
                                          <i style="width: 16px; height: 16px;" class="fas fa-exchange-alt"></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <br>
                           <span class="text-muted small">Shipped between <?php echo e(date('d M, Y', strtotime("+4 days")).' and '. date('d M, Y', strtotime("+6 days"))); ?></span>
                           <!-- .product__options / end -->
                        </div>
                        <!-- .product__end -->
                        <div class="product__footer">
                           <div class="product__tags tags">
                              <div class="tags__list">
                              	<?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              	<a href="<?php echo e(url('category/'.$categories->slug. '.html')); ?>"><?php echo e($categories->title); ?></a> 
                              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                           </div>
                           <div class="product__share-links share-links">
                              <ul class="share-links__list">
                                 <li class="share-links__item share-links__item--type--like"><a href="#">Like</a></li>
                                 <li class="share-links__item share-links__item--type--tweet"><a href="#">Tweet</a></li>
                                 <li class="share-links__item share-links__item--type--pin"><a href="#">Pin It</a></li>
                                 <li class="share-links__item share-links__item--type--counter"><a href="#">4K</a></li>
                              </ul>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <div class="product-tabs">
                     <div class="product-tabs__list">
                        <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a> <a href="#tab-specification" class="product-tabs__item">Specification</a> 
                        
                        <a href="#tab-reviews" class="product-tabs__item">Reviews</a>
                        
                     </div>
                     <div class="product-tabs__content">
                        <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                           <div class="typography">
                              <?php echo $product->description; ?>

                           </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-specification">
                           <div class="spec">
                              <?php echo $product->information; ?>

                           </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-reviews">
                           <div class="reviews-view">
                              <div class="reviews-view__list">
                                 <h3 class="reviews-view__header">Customer Reviews</h3>
                                 <div class="reviews-list">
                                 	<?php if(count($review) > 0): ?>
                                    <ol class="reviews-list__content">
                                       <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <li class="reviews-list__item">
                                          <div class="review">
                                             <div class="review__avatar"><img src="<?php echo e(asset('frontend/stroyka/images/avatars/avatar-1.jpg')); ?>" alt=""></div>
                                             <div class="review__content">
                                                <div class="review__author"><?php echo e($reviews->customer->first_name. ' ' .$reviews->customer->last_name); ?></div>
                                                <div class="review__rating">
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
                                                </div>
                                                <div class="review__text">
                                                	<?php echo e($reviews->review); ?>

                                                </div>
                                                <div class="review__date"><?php echo e(date('d M, Y', strtotime($reviews->created_at))); ?></div>
                                             </div>
                                          </div>
                                       </li>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                    <div class="reviews-list__pagination">
                                       <ul class="pagination justify-content-center">
                                          <?php echo e($review->links()); ?>

                                       </ul>
                                    </div>
                                    <?php else: ?>
                                    <div class="review_text">
                                    	<span>No reviews yet</span>
                                    </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <?php if(Auth::guard('customer')->check()): ?>
                              <form class="reviews-view__form" method="post" action="<?php echo e(route('review.add')); ?>">
                              	<?php echo csrf_field(); ?>
                                 <h3 class="reviews-view__header">Write A Review</h3>
                                 <div class="row">
                                    <div class="col-12 col-lg-9 col-xl-8">
                                       <div class="form-row">
                                          <div class="form-group col-md-4">
                                             <label for="review-stars">Review Stars</label> 
                                             <select id="review-stars" class="form-control" name="rating">
                                                <option value="5">5 Stars Rating</option>
                                                <option value="4">4 Stars Rating</option>
                                                <option value="3">3 Stars Rating</option>
                                                <option value="2">2 Stars Rating</option>
                                                <option value="1">1 Stars Rating</option>
                                             </select>
                                             <span>5 - Maximam, 1 - Minimum</span>
                                          </div>
                                       </div>
                                       <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                       <div class="form-group"><label>Your Review</label> <textarea rows="3" class="form-control <?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Write review" name="review"><?php echo old('review'); ?></textarea></div>
                                       <?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
					                     <div class="form-control-feedback text-danger"><?php echo e($message); ?></div>
					                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                       <div class="form-group mb-0"><button type="submit" class="btn btn-primary btn-lg">Post Your Review</button></div>
                                    </div>
                                 </div>
                              </form>
                              <?php else: ?>
                                 <hr>
                                 <p class="reviews-view__header"><a href="<?php echo e(route('login.html')); ?>">Login</a> to write a review</p>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php echo $__env->make('home.product.related', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('home.product.recent-views', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/product/index.blade.php ENDPATH**/ ?>