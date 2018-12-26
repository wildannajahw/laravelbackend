<?php $__env->startSection('title'); ?> Edit Category <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
  <div class="alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php endif; ?>

  <div class="col-md-8">
  <form action="<?php echo e(route('categories.update', ['id' => $category->id])); ?>" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">

    <?php echo csrf_field(); ?>

    <input type="hidden" value="PUT" name="_method">
    <label>Category name</label> <br>
    <input type="text" class="form-control" value="<?php echo e($category->name); ?>" name="name"><br><br>
    <label>Cateogry slug</label>
    <input type="text" class="form-control" value="<?php echo e($category->slug); ?>" name="slug"> <br><br>
    <label>Category image</label><br>

    <?php if($category->image): ?>
    <span>Current image</span><br>
    <img src="<?php echo e(asset('storage/'. $category->image)); ?>" width="120px"> <br><br>

    <?php endif; ?>
    <input type="file" class="form-control" name="image">
    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small> <br><br>
    <input type="submit" class="btn btn-primary" value="Update">
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>