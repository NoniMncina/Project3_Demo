<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Boxed</title>

    <link rel="stylesheet" href="<?php echo e(asset('iconfont/material-icons.css')); ?>">
    <!-- Materialize css -->
    <link rel="stylesheet" href="<?php echo e(asset('materialize-css/css/materialize.min.css')); ?>">
    <!-- datatables -->
    <link rel="stylesheet" href="<?php echo e(asset('DataTables/datatables.min.css')); ?>">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/storage/images/favicon.ico">
    <style>
      body {
        background:url(./images/background.jpg);
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        background-color: grey;
      }
      main {
        flex: 1 0 auto;
      }
      .preloader-background {
      	display: flex;
      	align-items: center;
      	justify-content: center;
      	background-color: #eee;

      	position: fixed;
      	z-index: 100;
      	top: 0;
      	left: 0;
      	right: 0;
      	bottom: 0;
      }
    </style>
</head>
<body>
  <?php echo $__env->make('inc.spinner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <main>
    <div id="app">
      <?php echo $__env->make('inc.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
      <!-- Floating Button -->
      <?php if(Auth::guest()): ?>
      <?php else: ?>
      <div class="fixed-action-btn">
        <a href="#" class="btn btn-floating btn-large grey darken-10 tooltipped" data-position="left" data-delay="50" data-tooltip="Quick Access">
          <i class="large material-icons">explore</i>
        </a>
        <ul>
          <li>
            <a href='documents/create' class="btn-floating btn-large grey darken-10 tooltipped" data-position="left" data-delay="50" data-tooltip="File Upload"><i class="large material-icons">file_upload</i></a>
          </li>
          <li class="hide-on-med-and-down">
            <a href="" class="btn-floating btn-large button-collapse grey darken-10 tooltipped" data-activates="slide-out" data-position="left" data-delay="50" data-tooltip="Menu"><i class="large material-icons">menu</i></a>
          </li>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </main>
  <?php echo $__env->make('inc.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- Scripts -->
  <?php echo $__env->make('inc.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- Right click context-menu -->
  <script src="<?php echo e(asset('js/context-menu.js')); ?>"></script>
  <!-- MESSAGES -->
  <?php echo $__env->make('inc.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
