

<?php $__env->startSection('title', 'Banners'); ?>

<?php $__env->startSection('breadcrub'); ?>
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banners</li>
          <li class="breadcrumb-item active"><a href="#">List</a></li>
        </ul>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="<?php echo e(route('banners.create')); ?>" class="float-right btn btn-sm btn-primary">Add New</a>
	          	</div>
	            <div class="tile-body">
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Title</th>
	                    <th>Subtitle</th>
	                    <th>Description</th>
	                    <th>Status</th>
	                    <th>Type</th>
	                    <th>Preview</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php if(count($banner) > 0): ?>
	                	<?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banners): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                	<tr>
	                		<td><?php echo e($key + 1); ?></td>
	                		<td><?php echo e($banners->title); ?></td>
	                		<td><?php echo e($banners->sub_title); ?></td>
	                		<td><?php echo e($banners->description); ?></td>
	                		<td><?php echo e($banners->status); ?></td>
	                		<td><?php echo e($banners->type); ?></td>
	                		<td>
	                			<img src="<?php echo e(asset('storage/banner/'. $banners->image)); ?>" style="width: 200px; height: 120px;">
	                		</td>
	                		<td>
			              		<form action="<?php echo e(route('banners.destroy', $banners->id)); ?>" method="post">
					              <?php echo csrf_field(); ?>
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
						                <a href="<?php echo e(route('banners.edit', $banners->id)); ?>" class="btn btn-primary" type="button">Edit</a>
					                	<input name="_method" type="hidden" value="DELETE">
					                	<button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</button>
					              </div>
					            </div>
					            </form>
	                		</td>
	                	</tr>
	                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                	<?php else: ?>
	                	<tr><td colspan="6" class="text-center">No banner added yet. <a href="<?php echo e(route('banners.create')); ?>">Click here to add banner</a></td></tr>
	                	<?php endif; ?>
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/admin/banner/index.blade.php ENDPATH**/ ?>