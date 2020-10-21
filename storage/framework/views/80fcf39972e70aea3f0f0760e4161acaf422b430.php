<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"><?php echo e(Auth::user()->name); ?></p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item <?php echo e(Route::is('home')? 'active':''); ?>" href="<?php echo e(route('home')); ?>"
            ><i class="app-menu__icon fa fa-th"></i
            ><span class="app-menu__label">Dashboard</span></a
          >
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-cart-plus"></i
            ><span class="app-menu__label">Catalogue</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item <?php echo e(Route::is('products.index')? 'active':''); ?>" href="<?php echo e(route('products.index')); ?>"
                ><i class="icon fa fa-arrow-right"></i> Products</a
              >
            </li>
            <li>
              <a class="treeview-item <?php echo e(Route::is('categories.index')? 'active':''); ?>" href="<?php echo e(route('categories.index')); ?>"
                ><i class="icon fa fa-arrow-right"></i> Categories</a
              >
            </li>
            <li>
              <a class="treeview-item " href="<?php echo e(route('attributes.index')); ?>"
                ><i class="icon fa fa-arrow-right"></i> Attributes</a
              >
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-tags"></i
            ><span class="app-menu__label">Orders</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href=""
                ><i class="icon fa fa-arrow-right"></i> List</a
              >
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-ship"></i
            ><span class="app-menu__label">Localisation</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo e(route('shipping.index')); ?>"
                ><i class="icon fa fa-arrow-right"></i> Shipping</a
              >
            </li>
            <li>
              <a class="treeview-item " href="<?php echo e(route('regions.index')); ?>"
                ><i class="icon fa fa-arrow-right"></i> Region</a
              >
            </li>
            <li>
              <a class="treeview-item " href=""
                ><i class="icon fa fa-arrow-right"></i> Districts</a
              >
            </li>
            <li>
              <a class="treeview-item " href="<?php echo e(route('pickupstation.list')); ?>"
                ><i class="icon fa fa-arrow-right"></i> Pickup Stations</a
              >
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-cogs"></i
            ><span class="app-menu__label">Site Setting</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo e(route('banners.index')); ?>"
                ><i class="icon fa fa-arrow-right"></i> Banners</a
              >
            </li>
          </ul>
        </li>
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
        <hr class="bg-light">
        <li class="text-light">
            <span class="mr-2 ml-2 app-menu__label">Administrator</span>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-users"></i
            ><span class="app-menu__label">User Management</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="<?php echo e(Route::is('users.index')||Route::is('users.create')||Route::is('users.edit')? 'class=active':''); ?> treeview-item" href="<?php echo e(route('users.index')); ?>"
                ><i class="icon fa fa-users"></i> Users</a
              >
            </li>
            <li>
              <a class="<?php echo e(Route::is('roles.index')||Route::is('roles.create')||Route::is('roles.edit')? 'active':''); ?> treeview-item" href="<?php echo e(route('roles.index')); ?>"
                ><i class="icon fa fa-tasks"></i> User Roles</a
              >
            </li>
            <li>
              <a class="<?php echo e(Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? 'active':''); ?> treeview-item" href="<?php echo e(route('permissions.index')); ?>"
                ><i class="icon fa fa-key"></i> User Permissions</a
              >
            </li>
          </ul>
        </li>
        <li>
          <a class="app-menu__item active" href="#"
            ><i class="app-menu__icon fa fa-cog"></i
            ><span class="app-menu__label">System Setting</span></a
          >
        </li>
        <li>
          <a class="app-menu__item active" href="#"
            ><i class="app-menu__icon fa fa-refresh"></i
            ><span class="app-menu__label">Backup</span></a
          >
        </li>
        <?php endif; ?>
      </ul>
    </aside><?php /**PATH C:\xampp\htdocs\mianzi\resources\views/layouts/partials/admin/sidebar.blade.php ENDPATH**/ ?>