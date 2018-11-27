<?php if(count($errors) > 0): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
      Materialize.toast("<?php echo e($error); ?>")
    </script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('success')): ?>
  <script>
    Materialize.toast("<?php echo e(@session('success')); ?>");
  </script>
<?php endif; ?>

<?php if(session('error')): ?>
  <script>
      Materialize.toast("<?php echo e(@session('error')); ?>");
  </script>
<?php endif; ?>
