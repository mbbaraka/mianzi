         <header class="site__header d-lg-none">
            <div class="mobile-header mobile-header--sticky mobile-header--stuck">
               <div class="mobile-header__panel">
                  <div class="container">
                     <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                           <i style="height: 14px; width: 18px" class="fas fa-bars"></i>
                        </button>
                        <a class="mobile-header__logo" href="<?php echo e(url('/')); ?>">
                          <img style="height: 40px;" src="<?php echo e(asset('frontend/images/layout-6/logo.png')); ?>" class="img-fluid  " alt="logo-header">
                        </a>
                        <div class="mobile-header__search">
                           
                           <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('search')->dom;
} elseif ($_instance->childHasBeenRendered('AwtMgYu')) {
    $componentId = $_instance->getRenderedChildComponentId('AwtMgYu');
    $componentTag = $_instance->getRenderedChildComponentTagName('AwtMgYu');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('AwtMgYu');
} else {
    $response = \Livewire\Livewire::mount('search');
    $dom = $response->dom;
    $_instance->logRenderedChild('AwtMgYu', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
                        </div>
                        <div class="mobile-header__indicators">
                           <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                              <button class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-search"></i>
                                 </span>
                              </button>
                           </div>
                           <div class="indicator indicator--mobile">
                              <a href="" class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-user"></i>
                                 </span>
                              </a>
                           </div>
                           <div class="indicator indicator--mobile d-sm-flex">
                              <a href="<?php echo e(route('compare')); ?>" class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-exchange-alt"></i>
                                    <span class="indicator__value">
                                       <?php echo e(Compares::count()); ?>

                                    </span>
                                 </span>
                              </a>
                           </div>
                           <div class="indicator indicator--mobile d-sm-flex">
                              <a href="<?php echo e(route('wishlists')); ?>" class="indicator__button">
                                 <span class="indicator__area">
                                    <i style="height: 20px; width: 20px" class="fas fa-heart"></i>
                                    <span class="indicator__value">
                                       <?php echo e(Wishlists::count()); ?>

                                    </span>
                                 </span>
                              </a>
                           </div>
                           <div class="indicator indicator--mobile">
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
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header><?php /**PATH C:\xampp\htdocs\mianzi2\resources\views/layouts/partials/home/mobile-header.blade.php ENDPATH**/ ?>