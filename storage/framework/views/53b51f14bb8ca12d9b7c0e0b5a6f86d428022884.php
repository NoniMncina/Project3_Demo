<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">folder</i> Upload Document
          <a href="/documents/create" class="btn waves-effect grey darken-10 right tooltipped" data-position="left" data-delay="50" data-tooltip="Upload New Document"><i class="material-icons">file_upload</i> New</a>
        </h3>
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col m8 s12">
          <?php echo Form::open(['action' => 'DocumentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'col s12']); ?>

            <?php echo e(csrf_field()); ?>

          <div class="card hoverable">
            <div class="card-content">
              <div class="input-field">
                <i class="material-icons prefix">folder</i>
                <?php echo e(Form::text('name','',['class' => 'validate', 'id' => 'name'])); ?>

                <label for="name">File Name</label>
                <?php if($errors->has('name')): ?>
                  <span class="red-text"><strong><?php echo e($errors->first('name')); ?></strong></span>
                <?php endif; ?>
              </div>
              <br>
              <div class="input-field">
                <i class="material-icons prefix">description</i>
                <?php echo e(Form::text('description','',['class' => 'validate', 'id' => 'description'])); ?>

                <label for="description">Description</label>
                <?php if($errors->has('description')): ?>
                  <span class="red-text"><strong><?php echo e($errors->first('description')); ?></strong></span>
                <?php endif; ?>
              </div>
              <br>
              <div class="input-field">
                <!-- <input type="checkbox" id="isExpire" name="isExpire" checked/> -->
                <?php echo e(Form::checkbox('isExpire',1,true,['id' => 'isExpire'])); ?>

                <label for="isExpire">Does Not Expire</label>
              </div>
              <br>
              <div class="input-field">
                <!-- <input type="text" class="datepicker" name="expires_at" id="expirePicker" disabled> -->
                <?php echo e(Form::text('expires_at', '',['class' => 'datepicker', 'id' => 'expirePicker', 'disabled'])); ?>

                <label for="expirePicker">Expires At</label>
              </div>
              <br>
              <div class="input-field">
                <i class="material-icons prefix">class</i>
                <?php echo e(Form::select('category_id[]',$categories,null,['multiple' => 'multiple', 'id' => 'category', 'placeholder' => 'Choose Category'])); ?>


                <label for="category">Category (Optional)</label>
                <?php if($errors->has('category')): ?>
                  <span class="red-text"><strong><?php echo e($errors->first('category')); ?></strong></span>
                <?php endif; ?>
              </div>
              <br>
              <div class="file-field input-field">
                <div class="btn white">
                  <span class="black-text">Choose File (Max: 50MB)</span>
                  <?php echo e(Form::file('file')); ?>

                  <?php if($errors->has('file')): ?>
                    <span class="red-text"><strong><?php echo e($errors->first('file')); ?></strong></span>
                  <?php endif; ?>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <br>
              <div class="input-field">
                <p class="center">
                  <?php echo e(Form::submit('Save',['class' => 'btn-large waves-effect grey darken-10'])); ?>

                </p>
              </div>
            </div>
          </div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>