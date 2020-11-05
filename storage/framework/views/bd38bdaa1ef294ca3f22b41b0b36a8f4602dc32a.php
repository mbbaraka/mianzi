

<?php $__env->startSection('title', 'Create Product'); ?>

<?php $__env->startSection('breadcrub'); ?>
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Product</li>
          <li class="breadcrumb-item active"><a href="#">Create Product</a></li>
        </ul>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <a href="<?php echo e(route('products.index')); ?>" class="float-right btn btn-sm btn-primary">Back</a>
	            <h3 class="tile-title">Add New Product</h3>

	            <form action ="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
	            <div class="tile-body">
	              	<?php echo csrf_field(); ?>
	                <div class="row">
	                	<div class="col-md-6">
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
			                    value="<?php echo e(old('title')); ?>"
			                    placeholder="Enter Product Price"
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
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Type</label>
			                  <select name="type" class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
			                  	<option value="Digital">Digital</option>
			                  	<option selected value="Physical">Physical</option>
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
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Price</label>
			                  <input
			                    class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
			                    type="number"
			                    name="price"
			                    value="<?php echo e(old('price')); ?>"
			                    placeholder="UGX ..."
			                  />
			                  <?php $__errorArgs = ['price'];
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
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Sale Price</label>
			                  <input
			                    class="form-control <?php $__errorArgs = ['sale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
			                    type="number"
			                    name="sale_price"
			                    value="<?php echo e(old('sale_price')); ?>"
			                    placeholder="UGX ...."
			                  />
			                  <?php $__errorArgs = ['sale_price'];
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
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Quantity</label>
			                  <input
			                    class="form-control <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
			                    type="number"
			                    name="qty"
			                    value="<?php echo e(old('qty')); ?>"
			                    placeholder="Quantity"
			                  />
			                  <?php $__errorArgs = ['qty'];
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
	                	<div class="col-md-6">
	                		<br>
	                		<div class="form-group">
			                  <div class="form-check">
			                    <label class="form-check-label">
			                      <input class="form-check-input" name="featured" type="checkbox" />Featured
			                    </label>
			                  </div>
			                </div>
	                	</div>
	                </div>
	                <div class="form-group">
	                	<label class="contol-label">Select Categories</label>
	                	<select class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category[]" id="select2" multiple="multiple">
							<optgroup label="Select Categories">
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</optgroup>
						</select>
						<?php $__errorArgs = ['category'];
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
	                	<div class="col-md-12">
	                		<div class="form-group">
			                  <label class="control-label">Product Description</label>
			                  <textarea name="description" class="form-control textarea">
			                  	<?php echo old('description'); ?>

			                  </textarea>
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
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Publish Date</label>
			                  <input
			                    class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
			                    type="date"
			                    name="date"
			                    value="<?php echo e(old('date')); ?>"
			                    placeholder="Enter Product Price"
			                  />
			                  <?php $__errorArgs = ['date'];
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
	                	<div class="col-md-6">
	                		<div class="form-group">
			                  <label class="control-label">Status</label>
			                  <select name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
			                  	<option value="1">Active</option>
			                  	<option value="0">Inactive</option>
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
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
			                  <label class="control-label">Product Information</label>
			                  <textarea name="information" class="form-control textarea">
			                  	<?php echo old('information'); ?>

			                  </textarea>
			                  <?php $__errorArgs = ['information'];
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
	                
	                <div class="form-group">
	                  <label class="control-label">Cover Image</label>
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

	                <div class="form-group">
	                  <label class="control-label">Other Image</label>
	                  <input type="file" class="form-control <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="images[]" multiple>
	                  <?php $__errorArgs = ['images'];
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
	              >&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo e(route('products.index')); ?>"
	                ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a
	              >
	            </div>
	        	</form>
	          </div>
	        </div>
	    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/admin/product/create.blade.php ENDPATH**/ ?>