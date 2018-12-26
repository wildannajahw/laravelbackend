<?php $__env->startSection("title"); ?> Users list <?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<div class="row">
  <div class="col-md-6">
    <form action="<?php echo e(route('users.index')); ?>">
      <div class="input-group mb-3">
        <input value="<?php echo e(Request::get('keyword')); ?>" name="keyword" class="form-control col-md-10" type="text" placeholder="Filter berdasarkan email"/>
      <div class="input-group-append">
        <input type="submit" value="Filter" class="btn btn-primary">
      </div>
      </div>
    </form>
  </div>
</div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><b>Name</b></th>
        <th><b>Username</b></th>
        <th><b>Email</b></th>
        <th><b>Avatar</b></th>
        <th><b>Status</b></th>
        <th><b>Action</b></th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->username); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td>
          <?php if($user->avatar): ?>
            <img src="<?php echo e(asset('storage/'.$user->avatar)); ?>" width="70px"/>
          <?php else: ?>
          N/A
          <?php endif; ?>
        </td>
        <td>
          <?php if($user->status == "ACTIVE"): ?>
            <span class="badge badge-success">
              <?php echo e($user->status); ?>

            </span>
          <?php else: ?>
            <span class="badge badge-danger">
              <?php echo e($user->status); ?>

            </span>
          <?php endif; ?>
        </td>
        <td>
          <a class="btn btn-info text-white btn-sm" href="<?php echo e(route('users.edit', ['id'=>$user->id])); ?>">Edit</a>
          <a href="<?php echo e(route('users.show', ['id' => $user->id])); ?>" class="btn btn-primary btn-sm">Detail</a>
          <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="<?php echo e(route('users.destroy', ['id' => $user->id ])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            <?php if(session('status')): ?>
              <div class="alert alert-success">
                <?php echo e(session('status')); ?>

              </div>
            <?php endif; ?>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>