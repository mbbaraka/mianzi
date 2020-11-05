<div class="block block--highlighted block-categories block-categories--layout--classic">
   <div class="container">
      <div class="block-header">
         <h3 class="block-header__title">Popular Categories</h3>
         <div class="block-header__divider"></div>
         <ul class="block-header__groups-list">
            <li><button type="button" class="block-header__group block-header__group">View All</button></li>
         </ul>
      </div>
      <div class="block-categories__list">
      	<?php $__currentLoopData = Categories::getRoot(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="block-categories__item category-card category-card--layout--classic">
            <div class="category-card__body">
               <div class="category-card__image"><a href="<?php echo e(url('category/'.$categories->slug. '.html')); ?>"><img style="width: 130px; height: 130px;" src="<?php echo e(asset('app/category/'.$categories->thumbnail)); ?>" alt="<?php echo e($categories->title); ?>"></a></div>
               <div class="category-card__content">
                  <div class="category-card__name"><a href="<?php echo e(url('category/'.$categories->slug. '.html')); ?>"><?php echo e($categories->title); ?></a></div>
                  <ul class="category-card__links">
                  	<?php $__currentLoopData = Categories::subcategories($categories->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li><a href="<?php echo e(url('category/'.$sub_categories->slug. '.html')); ?>"><?php echo e($sub_categories->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  <div class="category-card__all"><a href="#">Show All</a></div>
                  <div class="category-card__products">572 Products</div>
               </div>
            </div>
         </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/home/categories.blade.php ENDPATH**/ ?>