

<?php $__env->startSection('title', 'Edit Banner'); ?>

<?php $__env->startSection('breadcrub'); ?>
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banner</li>
          <li class="breadcrumb-item active"><a href="#">Edit Banner</a></li>
        </ul>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="<?php echo e(route('banners.index')); ?>" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Edit Banner</h3>

	            <form action ="<?php echo e(route('banners.update', $banner->id)); ?>" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	<?php echo csrf_field(); ?>
	              	<?php echo method_field('PUT'); ?>
	              	<div class="form-group">
	                  <label class="control-label">Image</label>
	                  <input
	                    class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
	                    type="file"
	                    name="image"
	                  />
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
	                    value="<?php echo e($banner->title); ?>"
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
	                  <label class="control-label">Sub Title</label>
	                  <input
	                    class="form-control <?php $__errorArgs = ['sub_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
	                    type="text"
	                    name="sub_title"
	                    value="<?php echo e($banner->sub_title); ?>"
	                    placeholder="Enter Sub-Title"
	                  />
	                  <?php $__errorArgs = ['sub_title'];
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
	                  <label class="control-label">Description</label>
	                  <input
	                    class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
	                    type="text"
	                    name="description"
	                    value="<?php echo e($banner->description); ?>"
	                    placeholder="Enter Banner Description"
	                  />
	                  <?php $__errorArgs = ['description'];
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
	                  <label class="control-label">Button</label>
	                  <input
	                    class="form-control <?php $__errorArgs = ['button'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
	                    type="text"
	                    name="button"
	                    value="<?php echo e($banner->button); ?>"
	                    placeholder="Enter Banner Button"
	                  />
	                  <?php $__errorArgs = ['button'];
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
	                  <label class="control-label">Url</label>
	                  <input
	                    class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
	                    type="text"
	                    name="url"
	                    value="<?php echo e($banner->url); ?>"
	                    placeholder="Enter Banner Url"
	                  />
	                  <?php $__errorArgs = ['url'];
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
	                <div class="row">
	                	<div class="form-group col-md-6">
		                  <label class="control-label">Type</label>
		                  <select class="form-control" name="type">
		                  	<option value="slider" <?php if($banner->type == "slider"): ?> selected <?php endif; ?>>Slider Banner</option>
		                  	<option value="collection" <?php if($banner->type == "collection"): ?> selected <?php endif; ?>>Collection Banner</option>
		                  </select>
		                  <?php $__errorArgs = ['type'];
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
		                <div class="form-group col-md-6">
		                  <label class="control-label">Status</label>
		                  <select class="form-control" name="status">
		                  	<option value="1" <?php if($banner->status == "1"): ?> selected <?php endif; ?>>Published</option>
		                  	<option value="0" <?php if($banner->status == "0"): ?> selected <?php endif; ?>>Unpublished</option>
		                  </select>
		                  <?php $__errorArgs = ['status'];
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
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit">
	                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo e(route('banners.index')); ?>"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	          </div>
	        </div>
	    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/admin/banner/edit.blade.php ENDPATH**/ ?>