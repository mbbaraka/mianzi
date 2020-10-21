
<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('breadcrub'); ?>
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	  <div class="row">
	    <div class="col-md-6 col-lg-3">
	      <div class="widget-small primary coloured-icon">
	        <i class="icon fa fa-users fa-3x"></i>
	        <div class="info">
	          <h4>Users</h4>
	          <p><b><?php echo e(App\User::userCount()); ?></b></p>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-6 col-lg-3">
	      <div class="widget-small info coloured-icon">
	        <i class="icon fa fa-thumbs-o-up fa-3x"></i>
	        <div class="info">
	          <h4>Likes</h4>
	          <p><b>25</b></p>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-6 col-lg-3">
	      <div class="widget-small warning coloured-icon">
	        <i class="icon fa fa-files-o fa-3x"></i>
	        <div class="info">
	          <h4><a href="<?php echo e(route('login-activities')); ?>">Login Activites</a></h4>
	          <p><b>10</b></p>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-6 col-lg-3">
	      <div class="widget-small danger coloured-icon">
	        <i class="icon fa fa-star fa-3x"></i>
	        <div class="info">
	          <h4>Visitors</h4>
	          <p><b><?php echo e(App\Tracker::getCount()); ?></b></p>
	        </div>
	      </div>
	    </div>
	  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/admin/index.blade.php ENDPATH**/ ?>