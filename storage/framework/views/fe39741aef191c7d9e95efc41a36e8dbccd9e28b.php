

<div>
	<form class="search__form" action="<?php echo e(route('search')); ?>" method="get">
       <input 
       wire:model="query"
        wire:keydown.ArrowUp="decrementHighlight"
        wire:keydown.ArrowDown="incrementHighlight"
        wire:keydown.enter="selectProduct"
        class="search__input" name="query" placeholder="Search over 10,000 products" aria-label="Site search" type="search" autocomplete="off"> 
       <button class="search__button" type="submit">
          <i style="width: 20px; height: 20px;" class="fa fa-search"></i>
       </button>
       <div class="search__border"></div>
    </form>

	<span wire:loading class="position-absolute">Searching...</span>
    <?php if(!empty($query)): ?>
        <div class="position-absolute" wire:click="reset"></div>
        <?php if(!empty($pdts)): ?>
  	    	<div class="position-absolute">
          <ul class="d-block bg-white" style="list-style-type: none;">
          <?php $__currentLoopData = $pdts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $pdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a  class="text-dark" href="<?php echo e(url($pdt['slug'].'.html')); ?>"><?php echo e($pdt['title']); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>  
          </div>
  	    <?php else: ?>
          <ul class="position-absolute d-block bg-white search__form" style="list-style-type: none;">
            <li><span class="pt-3 text-dark">No results found</span></li>
          </ul>
  	    <?php endif; ?>
    <?php endif; ?>

</div><?php /**PATH C:\xampp\htdocs\mianzi2\resources\views/livewire/search.blade.php ENDPATH**/ ?>