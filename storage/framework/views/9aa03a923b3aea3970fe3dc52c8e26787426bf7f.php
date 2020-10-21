<div class="block-sidebar__item">
   <div class="widget-filters widget" data-collapse data-collapse-opened-class="filter--opened">
      <h4 class="widget__title">Filters</h4>
      <div class="widget-filters__list">
         <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
               <button type="button" class="filter__title" data-collapse-trigger>
                  Categories 
                  <svg class="filter__arrow" width="12px" height="7px">
                     <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
               </button>
               <div class="filter__body" data-collapse-content>
                  <div class="filter__container">
                     <div class="filter-categories">
                        <ul class="filter-categories__list">
                           <?php $__currentLoopData = Categories::getRoot(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li class="filter-categories__item filter-categories__item--parent">
                              <a href="<?php echo e(url('category/'.$categories->slug.'.html')); ?>"><?php echo e($categories->title); ?></a>
                              <div class="filter-categories__counter">
                                 <?php echo e(count($categories->product)); ?>

                              </div>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
               <button type="button" class="filter__title" data-collapse-trigger>
                  Price 
                  <svg class="filter__arrow" width="12px" height="7px">
                     <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                  </svg>
               </button>
               <div class="filter__body" data-collapse-content>
                  <div class="filter__container">
                     <div class="filter-price" data-min="500" data-max="<?php echo e($maxPrice); ?>" data-from="590" data-to="<?php echo e($maxPrice); ?> ">
                        <div class="filter-price__slider"></div>
                        <div class="filter-price__title">Price: UGX <span class="filter-price__min-value"></span> – UGX <span class="filter-price__max-value"></span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="widget-filters__item">
            <form method="get" action="<?php echo e(route('filter')); ?>">
            <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="filter filter--opened" data-collapse-item>
               <button type="button" class="filter__title" data-collapse-trigger>
                  <?php echo e($filter->name); ?> 
                  <svg class="filter__arrow" width="12px" height="7px">
                     <i class="fa fa-angle-down float-right"></i>
                  </svg>
               </button>
               <div class="filter__body" data-collapse-content>
                  <div class="filter__container">
                     <div class="filter-list">
                        <div class="filter-list__list">
                           <?php if(!empty($filter->values)): ?>
                              <?php $__currentLoopData = $filter->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <label class="filter-list__item">
                                 <span class="filter-list__input input-check">
                                    <span class="input-check__body">
                                       <input name="<?php echo e($filter->name); ?>[]" class="input-check__input" type="checkbox" multiple value="<?php echo e($value->value); ?>" id="filter-<?php echo e($value->id); ?>"> <span class="input-check__box"></span>
                                    </span>
                                 </span>
                                 <span class="filter-list__title" for="filter-<?php echo e($value->id); ?>"><?php echo e($value->value); ?> </span><span class="filter-list__counter">7</span>
                              </label>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </div>
      <div class="widget-filters__actions d-flex"><button class="btn btn-primary btn-sm" type="submit">Filter</button> <button class="btn btn-secondary btn-sm ml-2" type="reset">Reset</button></div>
      </form>
   </div>
</div><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/catalogue/filters.blade.php ENDPATH**/ ?>