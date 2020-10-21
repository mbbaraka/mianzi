
<form action="<?php echo e(url()->current()); ?>" method="get">
  <select class="form-control form-control-sm" name="sort" id="" onchange="this.form.submit()">
     <option value="">Default</option>
     <option value="a-z">Title (A-Z)</option>
     <option value="z-a">Title (Z-A)</option>
     <option value="min-max">Price (Min - Max)</option>
  </select>
</form><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/home/catalogue/partials/sort.blade.php ENDPATH**/ ?>