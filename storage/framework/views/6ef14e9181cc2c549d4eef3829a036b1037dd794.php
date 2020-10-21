<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="format-detection" content="telephone=no">
      <title><?php echo $__env->yieldContent('title'); ?> - Mianzi</title>
      <link rel="icon" type="image/png" href="<?php echo e(asset('frontend/images/favicon/favicon.ico')); ?>">
      <!-- fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
      <!-- css -->
      <link rel="stylesheet" href="<?php echo e(asset('frontend/stroyka/vendor/bootstrap-4.2.1/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/stroyka/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/stroyka/css/style.css')); ?>">
     
      <!-- font - fontawesome -->
      <link rel="stylesheet" href="<?php echo e(asset('frontend/stroyka/vendor/fontawesome-5.6.1/css/all.min.css')); ?>">
      <!-- font - stroyka -->
      <link rel="stylesheet" href="<?php echo e(asset('frontend/stroyka/fonts/stroyka/stroyka.css')); ?>">
      <!-- font-fontawesome -->
      <link rel="stylesheet" href="<?php echo e(asset('frontend/stroyka/fonts/font-awesome/css/all.css')); ?>">
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-6"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-97489509-6');</script>
      <?php echo \Livewire\Livewire::styles(); ?>

   </head>
   <body>
      <!-- Sweet Alert -->
      <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--- Sweet Alert -->
      <!-- quickview-modal -->
      <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
         </div>
      </div>
      <!-- quickview-modal / end -->
      <!-- mobilemenu -->
      <?php echo $__env->make('layouts.partials.home.mobile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- mobilemenu / end --><!-- site -->
      <div class="site">
         <!-- mobile site__header -->
         <?php echo $__env->make('layouts.partials.home.mobile-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- mobile site__header / end --><!-- desktop site__header -->
         <?php echo $__env->make('layouts.partials.home.header-2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- desktop site__header / end -->
         <!-- site__body -->
         <?php echo $__env->yieldContent('content'); ?>
         <!-- site__body / end -->
         <!-- site__footer -->
         <?php echo $__env->make('home.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- site__footer / end -->
      </div>
      <!-- site / end -->

       <!-- js -->
      <script src="<?php echo e(asset('frontend/stroyka/vendor/jquery-3.3.1/jquery.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/stroyka/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/stroyka/vendor/owl-carousel-2.3.4/owl.carousel.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/stroyka/vendor/nouislider-12.1.0/nouislider.min.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/stroyka/js/number.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/stroyka/js/main.js')); ?>"></script>
      <script src="<?php echo e(asset('frontend/stroyka/vendor/svg4everybody-2.1.9/svg4everybody.min.js')); ?>"></script>
      <script>svg4everybody();</script>
      <?php echo \Livewire\Livewire::scripts(); ?>

   </body>
</html><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/layouts/app2.blade.php ENDPATH**/ ?>