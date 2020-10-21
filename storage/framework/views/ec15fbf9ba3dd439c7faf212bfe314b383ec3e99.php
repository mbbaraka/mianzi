

<?php $__env->startSection('title', 'Edit Category'); ?>

<?php $__env->startSection('breadcrub'); ?>
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Category</li>
          <li class="breadcrumb-item active"><a href="#">Edit Category</a></li>
        </ul>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="<?php echo e(route('categories.index')); ?>" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Edit Category</h3>

	            <form action ="<?php echo e(route('categories.update', $category->id)); ?>" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	<?php echo csrf_field(); ?>
	              	<?php echo method_field('PUT'); ?>
	                <div class="form-group">
	                  <label class="control-label">Title</label>
	                  <input
	                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
	                    type="text"
	                    name="title"
	                    value="<?php echo e($category->title); ?>"
	                    placeholder="Enter category Title"
	                  />
	                  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	                  <div class="form-control-feedback text-danger"><?php echo e($message); ?></div>
	                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	                </div>
	                
	                <div class="form-group">
	                  <label class="control-label">Image</label>
	                  <input type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image" required>
	                  <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	                  <div class="form-control-feedback text-danger"><?php echo e($message); ?></div>
	                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	                </div>
	               
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit">
	                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo e(route('categories.index')); ?>"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	          </div>
	        </div>
	    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>