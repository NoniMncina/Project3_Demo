<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col m8 offset-m2 s12">
      <div class="card hoverable">
        <div class="card-content">
          <span class="card-title">Register</span>
          <div class="divider"></div>
          <div class="section">
            <form action="<?php echo e(route('register')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>


              <div class="input-field<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" autofocus>
                <label for="name" class="active">Name</label>
                <?php if($errors->has('name')): ?>
                  <span class="red-text">
                      <strong><?php echo e($errors->first('name')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
              <div class="input-field<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>">
                <label for="email" class="active">E-Mail Address</label>
                <?php if($errors->has('email')): ?>
                  <span class="red-text">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
              <div class="input-field<?php echo e($errors->has('department') ? ' has-error' : ''); ?>">
                <i class="material-icons prefix">group</i>
                 <select name="department_id" id="department_id">
                  <option value="" disabled selected>Choose Department</option>
                  <?php if(count($depts) > 0): ?>
                    <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($dept->id); ?>"><?php echo e($dept->dptName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
                <label for="department_id">Departments</label>
                <?php if($errors->has('department')): ?>
                  <span class="red-text">
                    <strong><?php echo e($errors->first('department')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
              <div class="input-field<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <i class="material-icons prefix">vpn_key</i>
                <input type="password" name="password" id="password">
                <label for="password" class="active">Password</label>
                <?php if($errors->has('password')): ?>
                  <span class="red-text">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">vpn_key</i>
                <input type="password" name="password_confirmation" id="password-confirm" required>
                <label for="password-confirm" class="active">Confirm Password</label>
              </div>
              <div class="input-field">
                <button type="submit" name="register" class="btn waves-effect grey darken-10">Register</button>
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