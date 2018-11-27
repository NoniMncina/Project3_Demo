<style>
      body {
        background:url(./images/background.jpg);
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }
</style>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col m8 offset-m2 s12">
      <div class="card hoverable">
        <div class="card-content">
          <span class="card-title">Login</span>
          <div class="divider"></div>
          <div class="section">
            <form action="<?php echo e(route('login')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>


              <div class="input-field<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <i class="material-icons prefix">email</i>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                <label for="email" class="active">E-mail Address</label>
                <?php if($errors->has('email')): ?>
                  <span class="red-text"><strong><?php echo e($errors->first('email')); ?></strong></span>
                <?php endif; ?>
              </div>
              <div class="input-field<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" type="password" name="password" required>
                <label for="password" class="active">Password</label>
                <?php if($errors->has('password')): ?>
                  <span class="red-text"><strong><?php echo e($errors->first('password')); ?></strong></span>
                <?php endif; ?>
              </div>
              <div class="input-field">
                <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                <label for="remember">Remember Me</label>
              </div>
              <br>
              <div class="input-field">
                <button type="submit" name="login" class="btn waves-effect grey darken-10">Login</button>
                <a class="right" href='auth/password/reset'>
                    Forgot Your Password?
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>