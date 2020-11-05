

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="site__body">
            <div class="page-header">
               <div class="page-header__container container">
                  <div class="page-header__breadcrumb">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                              <a href="index.html">Home</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                              </svg>
                           </li>
                           <li class="breadcrumb-item">
                              <a href="#">My Account</a> 
                              <svg class="breadcrumb-arrow" width="6px" height="9px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                              </svg>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="page-header__title">
                     <h1>Login</h1>
                  </div>
               </div>
            </div>
            <div class="block">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-md-6 d-flex">
                        <div class="card flex-grow-1 mb-md-0">
                           <div class="card-body">
                              <h3 class="card-title">Login</h3>
                              <form action="<?php echo e(route('login.check')); ?>" method ="post">
                        		<?php echo csrf_field(); ?>
                        		<?php if(session('error')): ?>
                        			<span class="invalid-feedback" role="alert">
	                                    <strong><?php echo e(session('error')); ?></strong>
	                              </span>
                        		<?php endif; ?>
                                 <div class="form-group"><label>Email address</label> <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter email" name="email" value="<?php echo e(old('email')); ?>">
                                 	 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                                <span class="invalid-feedback" role="alert">
		                                    <strong><?php echo e($message); ?></strong>
		                                </span>
		                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                                 <div class="form-group"><label>Password</label> <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Password"> 
                                 	<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                                <span class="invalid-feedback" role="alert">
		                                    <strong><?php echo e($message); ?></strong>
		                                </span>
		                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                   <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($message); ?></strong>
                                      </span>
                                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                   <br>
                                 	<small class="form-text text-muted"><a href="#">Forgot Password?</a></small>
                                 </div>
                                 
                                 <button type="submit" class="btn btn-primary">Login</button>
                                 <small class="form-text text-muted">New Customer?  <a href="<?php echo e(route('register.html')); ?>">Signup</a></small>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/auth/login.blade.php ENDPATH**/ ?>