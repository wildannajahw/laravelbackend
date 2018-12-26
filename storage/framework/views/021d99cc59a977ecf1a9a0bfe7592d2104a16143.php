<?php $__env->startSection('title'); ?> Create Category <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
  <div class="alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php endif; ?>
<div class="col-md-8">
  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="<?php echo e(route('categories.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label>Category name</label><br>
    <input type="text" class="form-control" name="name"/>
    <br>
    <label>Category image</label>
    <input type="file" class="form-control" name="image" v/>
    <br>
    <input type="submit" class="btn btn-primary" value="Save"/>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>