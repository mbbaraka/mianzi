<!-- .topbar -->
               <div class="site-header__topbar topbar">
                  <div class="topbar__container container">
                     <div class="topbar__row">
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="<?php echo e(route('about-us')); ?>">About Us</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="<?php echo e(route('contact-us')); ?>">Contacts</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="#">Store Location</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="track-order.html">Track Order</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="blog-classic.html">Blog</a></div>
                        <div class="topbar__spring"></div>
                        <div class="topbar__item">
                           <div class="topbar-dropdown">
                              <button class="topbar-dropdown__btn" type="button">
                                 <?php if(Auth::guard('customer')->check()): ?>
                                 Hi, <?php echo e(Auth::guard('customer')->user()->first_name); ?>

                                 <?php else: ?>
                                 My Account
                                 <?php endif; ?>
                                 <svg width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                 </svg>
                              </button>
                              <div class="topbar-dropdown__body">
                                 <!-- .menu -->
                                 <ul class="menu menu--layout--topbar">
                                    <?php if(Auth::guard('customer')->check()): ?>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Addresses</a></li>
                                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
                                       <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                    <?php else: ?>
                                    <li><a href="<?php echo e(route('login.html')); ?>">Login</a></li>
                                    <li><a href="<?php echo e(route('register.html')); ?>">Register</a></li>
                                    <?php endif; ?>
                                 </ul>
                                 <!-- .menu / end -->
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
               <!-- .topbar / end -->
               <div class="site-header__middle container">
                  <div class="site-header__logo">
                     <a href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset('frontend/images/layout-6/logo.png')); ?>" class="img-fluid  " alt="logo-header">
                     </a>
                  </div>
                  <div class="site-header__search">
                     <div class="search">
                        
                        <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('search')->dom;
} elseif ($_instance->childHasBeenRendered('s7dLkYT')) {
    $componentId = $_instance->getRenderedChildComponentId('s7dLkYT');
    $componentTag = $_instance->getRenderedChildComponentTagName('s7dLkYT');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('s7dLkYT');
} else {
    $response = \Livewire\Livewire::mount('search');
    $dom = $response->dom;
    $_instance->logRenderedChild('s7dLkYT', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
                     </div>
                  </div>
                  <div class="site-header__phone">
                     <div class="site-header__phone-title">Customer Service</div>
                     <div class="site-header__phone-number">0773034311</div>
                  </div>
               </div><?php /**PATH C:\xampp\htdocs\mianzi2\resources\views/layouts/partials/home/topbar.blade.php ENDPATH**/ ?>