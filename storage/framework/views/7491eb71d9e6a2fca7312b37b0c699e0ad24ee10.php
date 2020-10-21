

<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('breadcrub'); ?>
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p> The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active"><a href="#">List</a></li>
        </ul>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

		<div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	          	<div>
	          		<a href="<?php echo e(route('products.create')); ?>" class="float-right btn btn-sm btn-primary">Add New</a>
	          	</div>
	            <div class="tile-body">
	              <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
	                <thead class="thead-dark">
	                  <tr>
	                    <th>#</th>
	                    <th>Title</th>
	                    <th>Image</th>
	                    <th>Price</th>
	                    <th>Stock</th>
	                    <th>Categories</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php if(count($product) > 0): ?>
	                	<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                	<tr>
	                		<td><?php echo e($key + 1); ?></td>
	                		<td><a target="_blank" href="<?php echo e(url($products->slug.'.html')); ?>" ><?php echo e($products->title); ?></a></td>
	                		<td>
	                			<a target="_blank" href="<?php echo e(url('storage/product/'.$products->cover)); ?>">
	                				<img style="height: 100px; width: 150px;" class="img-fluid" src="<?php echo e(asset('storage/product/'.$products->cover)); ?>">
	                			</a>
	                		</td>
	                		<td><?php echo e(number_format($products->price)); ?></td>
	                		<td><?php echo e($products->qty); ?></td>
	                		<td>
	                			<?php $__currentLoopData = $products->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                			<span class="badge badge-primary rounded"><?php echo e($categories->title); ?></span>
	                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                		</td>
	                		<td>
			              		<form action="<?php echo e(route('products.destroy', $products->id)); ?>" method="post">
					              <?php echo csrf_field(); ?>
	                			<div class="bs-component" style="margin-bottom: 15px;">
					              <div class="btn-group" role="group" aria-label="Basic example">
					              		<a href="<?php echo e(route('product.attribute', $products->id)); ?>" class="btn btn-warning" type="button">Product Attributes</a>
						                <a href="<?php echo e(route('products.edit', $products->id)); ?>" class="btn btn-primary" type="button">Edit</a>
					                	<input name="_method" type="hidden" value="DELETE">
					                	<button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger" type="button">Delete</button>
					              </div>
					            </div>
					            </form>
	                		</td>
	                	</tr>
	                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                	<?php else: ?>
	                	<tr><td colspan="6" class="text-center">No product added yet. <a href="<?php echo e(route('products.create')); ?>">Click here to add product</a></td></tr>
	                	<?php endif; ?>
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/admin/product/index.blade.php ENDPATH**/ ?>