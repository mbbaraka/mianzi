<div class="block-sidebar__item d-none d-lg-block">
   <div class="widget-products widget">
      <h4 class="widget__title">Latest Products</h4>
      <div class="widget-products__list">
         <?php $__currentLoopData = Products::get('latest', 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="widget-products__item">
            <div class="widget-products__image"><a href="<?php echo e(url($latest->slug.'.html')); ?>"><img style="width: 50px; height: 50px" src="<?php echo e(asset('storage/product/'.$latest->cover)); ?>" alt="<?php echo e($latest->title); ?>"></a></div>
            <div class="widget-products__info">
               <div class="widget-products__name"><a href="<?php echo e(url($latest->slug.'.html')); ?>"><?php echo e($latest->title); ?></a></div>
               <div class="widget-products__prices">
                  <?php if($latest->sale_price == ""): ?>
                  <span><?php echo e(config('shop.symbol').' '.number_format($latest->price)); ?></span>
                  <?php else: ?>
                  <span class="text-muted small" style="text-decoration: line-through;"><?php echo e(config('shop.symbol').' '.number_format($latest->price)); ?></span>
                  &nbsp;&nbsp;
                  <span class="float-right"><?php echo e(config('shop.symbol').' '.number_format($latest->sale_price)); ?></span>
                  <?php endif; ?>
               </div>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/catalogue/partials/latest.blade.php ENDPATH**/ ?>