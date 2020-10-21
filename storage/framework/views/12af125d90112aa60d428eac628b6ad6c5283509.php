
<?php $__env->startSection('title'); ?>
<?php if(Request::routeIs('shop')): ?>
    <?php echo e($category); ?>

    <?php else: ?> 
    <?php echo e($category->title); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
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
                                 <i style="height: 9px; width: 6px;" class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item">
                              <a href="<?php echo e(route('shop')); ?>">Products</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <i style="height: 9px; width: 6px;" class="fa fa-angle-right"></i>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">
                               <?php if(Request::routeIs('shop')): ?>
                                <?php echo e($category); ?>

                                <?php else: ?> 
                                <?php echo e($category->title); ?>

                               <?php endif; ?>
                           </li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>
                        <?php if(Request::routeIs('shop')): ?>
                          <?php echo e($category); ?>

                          <?php else: ?> 
                          <?php echo e($category->title); ?>

                         <?php endif; ?>
                     </h1>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="shop-layout shop-layout--sidebar--start">
                  <div class="shop-layout__sidebar">
                     <div class="block block-sidebar d-none d-lg-block">

                        <?php echo $__env->make('home.catalogue.filters', ['filters' => $attributes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('home.catalogue.partials.latest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     </div>
                  </div>
                  <div class="shop-layout__content">
                     <div class="block">
                        <div class="products-view">
                           <div class="products-view__options">
                              <div class="view-options">
                                 <div class="view-options__layout">
                                    <div class="layout-switcher">
                                       <div class="layout-switcher__list">
                                          <button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active">
                                             <svg width="16px" height="16px">
                                                <i class="fa fa-th"></i>
                                             </svg>
                                          </button>
                                          <button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button">
                                             <svg width="16px" height="16px">
                                                <i class="fa fa-th-large"></i>
                                             </svg>
                                          </button>
                                          <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button">
                                             <svg width="16px" height="16px">
                                                <i class="fa fa-th-list"></i>
                                             </svg>
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="view-options__legend">Showing <?php echo e(count($products)); ?> of <?php echo e(count($all_products)); ?> products</div>
                                 <div class="view-options__divider"></div>
                                 <div class="float-left ">
                                    <button class="btn btn-sm btn-light d-lg-none" data-toggle="modal" data-target="#filter">
                                       <span>Filter</span>
                                       &nbsp;&nbsp;
                                       <span class="fas fa-filter"></span>
                                    </button>
                                 </div>
                                 <div class="view-options__control">
                                    <label for="">Sort By</label>
                                    <div>
                                       <?php echo $__env->make('home.catalogue.partials.sort', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                 </div>
                                 
                              </div>
                           </div>
                           <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false">
                              <div class="products-list__body">
                                 <?php if(count($products) > 0): ?>
                                 <?php echo $__env->make('home.catalogue.list', ['products' => $products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                 <?php else: ?>
                                 <span class="text-center text-warning">No Products yet for this category</span>
                                 <?php endif; ?>
                              </div>
                           </div>
                           <div class="products-view__pagination">
                              <ul class="pagination justify-content-center">
                                 <?php echo e($products->withQueryString()->links()); ?>

                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <?php echo $__env->make('home.catalogue.partials.filterModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/catalogue/index.blade.php ENDPATH**/ ?>