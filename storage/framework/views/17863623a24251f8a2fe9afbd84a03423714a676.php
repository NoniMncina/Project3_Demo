<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="col m11">
    <?php echo Form::open(['action' => ['ProfileController@update', $acc->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']); ?>

      <?php echo e(csrf_field()); ?>

      <div class="card hoverable">
        <div class="card-content">
          <div class="row">
            <div class="col m9">
              <div class="card-title">Current Credentials</div>
              <div class="divider"></div>
              <div class="section">
                <div class="col m8 s12">
                  
                    <br>
                    <div class="input-field">
                      <i class="material-icons prefix">account_circle</i>
                      <?php echo e(Form::text('name',$acc->name,['id' => 'Name'])); ?>

                      <label for="Name" class="active">Name</label>
                    </div>
                    <br>
                    <div class="input-field">
                      <i class="material-icons prefix">email</i>
                      <?php echo e(Form::email('email',$acc->email,['id' => 'Email'])); ?>

                      <label for="Email" class="active">Email</label>
                    </div>
                    <br>
                    <div class="input-field">
                      <?php echo e(Form::submit('Save Changes',['class' => 'waves-effect grey darker-10  btn'])); ?>

                      <a href="#modal1" class="modal-trigger right">Change Password ?</a>
                    </div>
                  
                </div>
                <div class="col m4 hide-on-small-only">
                  <img src="/storage/images/user.jpg" class="responsive-img" alt="User Profile">
                </div>
              </div>
            </div>
            <div class="col m3">
              <div class="card-panel grey darker-10 hide-on-med-and-down">
                <h4>Roles &amp; Permissions</h4>
                Your current role is 
                <?php if(auth()->check() && auth()->user()->hasRole('Root')): ?>  Root. <br>So, you have all of the privileges relating to documents, users, departments, and etc. Moreover, you can assign roles and permssions and can see users' activities. <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>  Admin. <br>So, you can manage users in your department, upload documents and edit/share/remove them. You can see your activity log but cannot clear them. <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('User')): ?>  User. <br>So, you can upload documents and edit/share/remove them. You can see your activity log but cannot clear them. <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
  <?php echo Form::open(['action' => 'ProfileController@changePassword','method' => 'PATCH']); ?>

    <?php echo e(csrf_field()); ?>

  <div class="modal-content">
    <h4>Change Password</h4>
    <br>
    <div class="row">
        <div class="input-field col m4">
          <i class="material-icons prefix">vpn_key</i>
          <?php echo e(Form::password('current_password',['id' => 'current_password'])); ?>

          <label for="current_password">Current Password</label>
          <?php if($errors->has('current_password')): ?>
            <span class="red-text"><strong><?php echo e($errors->first('current_password')); ?></strong></span>
          <?php endif; ?>
        </div>
        <div class="input-field col m4">
          <i class="material-icons prefix">vpn_key</i>
          <?php echo e(Form::password('new_password',['id' => 'new_password'])); ?>

          <label for="new_password">New Password</label>
          <?php if($errors->has('new_password')): ?>
            <span class="red-text"><strong><?php echo e($errors->first('new_password')); ?></strong></span>
          <?php endif; ?>
        </div>
        <div class="input-field col m4">
          <i class="material-icons prefix">vpn_key</i>
          <?php echo e(Form::password('new_password_confirmation',['id' => 'new_password_confirmation'])); ?>

          <label for="new_password_confirmation">Confirm Password</label>
          <?php if($errors->has('new_password_confirmation')): ?>
            <span class="red-text"><strong><?php echo e($errors->first('new_password_confirmation')); ?></strong></span>
          <?php endif; ?>
        </div>

    </div>
  </div>
  <div class="modal-footer">
    <?php echo e(Form::submit('Save Changes',['class' => 'modal-action modal-close waves-effect grey darker-10  btn'])); ?>

  </div>
  <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>