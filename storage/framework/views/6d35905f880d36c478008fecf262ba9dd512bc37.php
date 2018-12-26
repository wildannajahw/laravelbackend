<form class="d-inline" action="<?php echo e(route('categories.delete-permanent', ['id' => $category- >id])); ?>" method="POST" onsubmit="return confirm('Delete this category permanently?')">
  <?php echo csrf_field(); ?>
  <input type="hidden" name="_method" value="DELETE"/>
  <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
</form>
