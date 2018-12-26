<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6" style="border-right: solid 2px; border-color:#bf9b30">
            <h3>LOGIN</h3>
            <h4>Already have an account?</h4>
            <form method="POST" action="<?php echo e(route('login')); ?>">
              <?php echo csrf_field(); ?>

                <div class="form-group d-flex justify-content-center">


                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    <br>
                    <?php if($errors->has('email')): ?>

                        <span class="invalid-feedback" role="alert" style="width:100%;">
                            <br>
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>

                    <?php endif; ?>

                </div>
                <div class="form-group d-flex justify-content-center">
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                      <label class="form-check-label" for="remember">
                          <?php echo e(__('Remember Me')); ?>

                      </label>
                      <?php if(Route::has('password.request')): ?>
                          <a href="<?php echo e(route('password.request')); ?>" class="passfor mr-auto">Forgot password?</a>
                      <?php endif; ?>
                  </div>
                  <button type="submit" class="btn" >Login</button>
            </form>
        </div>
        <div class="col-sm-6">
            <h3 style="margin-top:10%">New To HolyShirt?</h3>
            <h4>Let's get you started with a HolyShirt.</h4>
            <a href="<?php echo e(route('register')); ?>" style="text-decoration:none">  <button type="button" class="btn">Get started</button></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>