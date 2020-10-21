<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/main.css')); ?>">
    <!-- Font-icon css-->
    <!-- Font-icon css-->
    <link href="<?php echo e(asset('backend/fonts/css/all.css')); ?>" rel="stylesheet">
    <title><?php echo $__env->yieldContent('title'); ?> : Mianzi</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <?php echo $__env->yieldContent('content'); ?>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo e(asset('backend/js/jquery-3.2.1.min.js')); ?>}"></script>
    <script src="<?php echo e(asset('backend/js/popper.min.js')); ?>}"></script>
    <script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>}"></script>
    <script src="<?php echo e(asset('backend/js/main.js')); ?>}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo e(asset('backend/js/plugins/pace.min.js')); ?>}"></script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/auth/app.blade.php ENDPATH**/ ?>