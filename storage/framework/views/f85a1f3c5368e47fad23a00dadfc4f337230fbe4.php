<?php $__env->startSection('footer-scripts'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$('#categories').select2({
ajax: {
  url: 'http://larashop.test/ajax/categories/search',
  processResults: function(data){
  return {
    results: data.map(function(item){return {id: item.id, text:item.name} })
  }
  }
}
});
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?> Create book <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
<div class="alert alert-success">
  <?php echo e(session('status')); ?>

</div>
<?php endif; ?>
<div class="row">
  <div class="col-md-8">
    <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
      <?php echo csrf_field(); ?>
      <input type="text" class="form-control" name="title" placeholder="Product name"><br>
      <input type="file" class="form-control" name="cover"><br>
      <input type="number" class="form-control" id="stock" name="stock" min=0 value=0><br>
      <input type="text" class="form-control" name="convection" id="convection" placeholder="Convection"><br>

      <input type="number" class="form-control" name="price" id="price" placeholder="Product price"><br>
      <!-- <label for="categories">Categories</label><br>
      <selectname="categories[]" multiple id="categories" class="form-control">
      </select> -->
      <br><br>
      <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
      <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>

    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>