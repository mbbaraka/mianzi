      <div class="mobilemenu">
         <div class="mobilemenu__backdrop"></div>
         <div class="mobilemenu__body">
            <div class="mobilemenu__header">
               <div class="mobilemenu__title">Menu</div>
               <button type="button" class="mobilemenu__close">
                  <i style="height: 20px; width: 20px" class="fa fa-arrow-left"></i>
               </button>
            </div>
            <div class="mobilemenu__content">
               <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                  
                  <li class="mobile-links__item" data-collapse-item>
                     <div class="mobile-links__item-title">
                        <a href="#" class="mobile-links__item-link">Categories</a> 
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                           <i style="height: 7px; width: 12px" class="fa fa-angle-down"></i>
                        </button>
                     </div>
                     <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                           <?php $__currentLoopData = Categories::getRoot(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if(count(Categories::subcategories($categories->id)) > 0): ?>
                                 <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                       <a href="<?php echo e(url('category/'.$categories->slug.'.html')); ?>" class="mobile-links__item-link"><?php echo e($categories->title); ?></a> 
                                       <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                          <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                             <i style="height: 7px; width: 12px" class="fa fa-angle-down"></i>
                                          </button>
                                       </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                       <ul class="mobile-links mobile-links--level--2">
                                          <?php $__currentLoopData = Categories::subcategories($categories->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li class="mobile-links__item" data-collapse-item>
                                             <div class="mobile-links__item-title"><a href="<?php echo e(url('category/'.$sub_categories->slug.'.html')); ?>" class="mobile-links__item-link"><?php echo e($sub_categories->title); ?></a></div>
                                          </li>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </ul>
                                    </div>
                                 </li>
                              <?php else: ?>
                                  <li class="mobile-links__item">
                                    <div class="mobile-links__item-title">
                                       <a href="<?php echo e(url('category/'.$categories->slug.'.html')); ?>" class="mobile-links__item-link"><?php echo e($categories->title); ?></a>
                                    </div>
                                  </li>                                 
                              <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
                  </li>
                  <li class="mobile-links__item" data-collapse-item>
                     <div class="mobile-links__item-title">
                        <a data-collapse-trigger class="mobile-links__item-link">Account</a> 
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                           <i style="height: 7px; width: 12px" class="fa fa-angle-down"></i>
                        </button>
                     </div>
                     <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                           <?php if(Auth::guard('customer')->check()): ?>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Orders</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Track Order</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Addresses</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class="mobile-links__item-link">Logout</a></div>
                                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                              </li>
                           <?php else: ?>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Login</a></div>
                              </li>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">French</a></div>
                              </li>
                           <?php endif; ?>
                           
                           
                        </ul>
                     </div>
                  </li>
                  <div class="container mt-2">
                     <span class="text-center">Quick Links</span>
                  </div>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">About Us</a> 
                     </div>
                  </li>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">Contact Us</a> 
                     </div>
                  </li>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">FAQ</a> 
                     </div>
                  </li>
                  <li class="mobile-links__item">
                     <div class="mobile-links__item-title">
                        <a class="mobile-links__item-link">Blog</a> 
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div><?php /**PATH C:\xampp\htdocs\mianzi2\resources\views/layouts/partials/home/mobile-menu.blade.php ENDPATH**/ ?>