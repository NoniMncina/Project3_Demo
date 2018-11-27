<nav>
  <div class="nav-wrapper black darken-4">
    <a href="#" data-activates="mobile-demo" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>
    <!-- Mobile View -->
    <ul class="side-nav" id="mobile-demo">
      <?php if(Auth::guest()): ?>
        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
      <?php else: ?>
        <li><a href='pages/shared'>Shared</a></li>
        <li><a href='documents'>Documents</a></li>
        <li><a href="/mydocuments">My Documents</a></li>
        <li><a href='categories'>Categories</a></li>
        <?php if(auth()->check() && auth()->user()->hasAnyRole('Root|Admin')): ?>
        <li><a href='users'>Users</a></li>
        <li><a href='departments'>Departments</a></li>
        <li><a href='logs'>Logs</a></li>
        <?php if(auth()->check() && auth()->user()->hasRole('Root')): ?>
        <li><a href='pages/backup'>Backup</a></li>
        <?php endif; ?>
        <?php endif; ?>
        <li class="divider"></li>
        <li><a href='profile'>My Account</a></li>
        <li>
            <a href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>
 
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </li>
      <?php endif; ?>
    </ul>
    <!-- Desktop View -->
    <ul class="right hide-on-med-and-down">
      <!-- Authentication Links -->
      <?php if(Auth::guest()): ?>
        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
      <?php else: ?>
        <!-- Dropdown Trigger -->
        <li>
          <a href="" class="datepicker"><i class="material-icons">date_range</i></a>
        </li>
        <li>
          <?php if($trashfull > 0): ?>
          <a href='/trash'><i class="material-icons red-text">delete</i></a>
          <?php else: ?>
          <a href='/trash'><i class="material-icons">delete</i></a>
          <?php endif; ?>
        </li>
        <?php if(auth()->check() && auth()->user()->hasAnyRole('Root|Admin')): ?>
        <li>
          <a href='requests'>Requests<span class="new badge white-text"><?php echo e($requests); ?></span></a>
        </li>
        <?php endif; ?>
        <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo e(Auth::user()->name); ?>

            <i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href='profile'>My Account</a></li>
  <li><a href='documents/mydocuments'>My Documents</a></li>
  <li>
      <a href="<?php echo e(route('logout')); ?>"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
          Logout
      </a>

      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
          <?php echo e(csrf_field()); ?>

      </form>
  </li>
</ul>
