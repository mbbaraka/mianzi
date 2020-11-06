<div id="filter" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <?php echo $__env->make('home.catalogue.filters', ['filters' => $attributes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
      </div>
   </div>
</div><?php /**PATH C:\xampp\htdocs\mianzi2\resources\views/home/catalogue/partials/filterModal.blade.php ENDPATH**/ ?>