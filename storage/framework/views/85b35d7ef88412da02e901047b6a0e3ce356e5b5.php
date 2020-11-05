

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="site__body">
   <!-- .block-slideshow -->
   <div class="block-slideshow block-slideshow--layout--with-departments block">
      <div class="container">
         <div class="row">
            <div class="col-12 col-lg-9 offset-lg-3">
               <div class="block-slideshow__body">
                  <div class="owl-carousel">
                  	<?php $__currentLoopData = Banners::get('slider'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <a class="block-slideshow__slide" href="#">
                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url(<?php echo e(asset('app/banner/'.$sliders->image)); ?>"></div>
                        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url(<?php echo e(asset('app/banner/'.$sliders->image)); ?>"></div>
                        <div class="block-slideshow__slide-content">
                           <div class="block-slideshow__slide-title"><?php echo e($sliders->title); ?><br>
                           	<?php echo e($sliders->sub_title); ?></div>
                           <div class="block-slideshow__slide-text"><?php echo e($sliders->description); ?></div>
                           <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg"><?php echo e($sliders->button); ?></span></div>
                        </div>
                     </a>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .block-slideshow / end --><!-- .block-features -->
   <div class="block block-features block-features--layout--classic">
      <div class="container">
         <div class="block-features__list">
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-free-delivery-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">Free Shipping</div>
                  <div class="block-features__subtitle">For orders from UGx 1000,000</div>
               </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-24-hours-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">Support 24/7</div>
                  <div class="block-features__subtitle">Call us anytime</div>
               </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-payment-security-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">100% Safety</div>
                  <div class="block-features__subtitle">Only secure payments</div>
               </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
               <div class="block-features__icon">
                  <svg width="48px" height="48px">
                     <use xlink:href="images/sprite.svg#fi-tag-48"></use>
                  </svg>
               </div>
               <div class="block-features__content">
                  <div class="block-features__title">Hot Offers</div>
                  <div class="block-features__subtitle">Discounts up to 90%</div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .block-features / end --><!-- .block-products-carousel -->
   <?php echo $__env->make('home.home.featured', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- .block-products-carousel / end --><!-- .block-banner -->
   
   <!-- .block-banner / end --><!-- .block-products -->
   <?php echo $__env->make('home.home.best-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- .block-products / end --><!-- .block-categories -->
   <?php echo $__env->make('home.home.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- .block-categories / end --><!-- .block-products-carousel -->
   <?php echo $__env->make('home.home.new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- .block-products-carousel / end --><!-- .block-posts -->
   
   <!-- .block-posts / end --><!-- .block-brands -->
   <div class="block block-brands">
      <div class="container">
         <div class="block-brands__slider">
            <div class="owl-carousel">
               <?php $__currentLoopData = Categories::getRoot(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="block-brands__item"><a href="<?php echo e(url('category/'.$categories->slug)); ?>"><img style="width: 32px; height: 32px;" src="<?php echo e(asset('storage/category/'.$categories->thumbnail)); ?>" alt="<?php echo e($categories->title); ?>"></a><span><?php echo e($categories->title); ?></span></div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/index.blade.php ENDPATH**/ ?>