<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item {{Route::is('home')? 'active':''}}" href="{{ route('home') }}"
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
              <a class="treeview-item {{Route::is('products.index')? 'active':''}}" href="{{ route('products.index') }}"
                ><i class="icon fa fa-arrow-right"></i> Products</a
              >
            </li>
            <li>
              <a class="treeview-item {{Route::is('categories.index')? 'active':''}}" href="{{ route('categories.index') }}"
                ><i class="icon fa fa-arrow-right"></i> Categories</a
              >
            </li>
            <li>
              <a class="treeview-item {{-- {{Route::is('gallery.index')||Route::is('gallery.create')||Route::is('gallery.edit')? 'class=active':''}} --}}" href="{{ route('attributes.index') }}"
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
              <a class="treeview-item" href="{{-- {{ route('sermons.index') }} --}}"
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
              <a class="treeview-item" href="{{ route('shipping.index') }}"
                ><i class="icon fa fa-arrow-right"></i> Shipping</a
              >
            </li>
            <li>
              <a class="treeview-item {{-- {{Route::is('events.index')||Route::is('events.create')||Route::is('events.edit')? 'class=active':''}} --}}" href="{{ route('regions.index') }}"
                ><i class="icon fa fa-arrow-right"></i> Region</a
              >
            </li>
            <li>
              <a class="treeview-item {{-- {{Route::is('gallery.index')||Route::is('gallery.create')||Route::is('gallery.edit')? 'class=active':''}} --}}" href="{{-- {{ route('gallery.index') }} --}}"
                ><i class="icon fa fa-arrow-right"></i> Districts</a
              >
            </li>
            <li>
              <a class="treeview-item {{-- {{Route::is('news.index')||Route::is('news.create')||Route::is('news.edit')? 'class=active':''}} --}}" href="{{ route('pickupstation.list') }}"
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
              <a class="treeview-item" href="{{ route('banners.index') }}"
                ><i class="icon fa fa-arrow-right"></i> Banners</a
              >
            </li>
          </ul>
        </li>
        @role('admin')
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
              <a class="{{Route::is('users.index')||Route::is('users.create')||Route::is('users.edit')? 'class=active':''}} treeview-item" href="{{route('users.index')}}"
                ><i class="icon fa fa-users"></i> Users</a
              >
            </li>
            <li>
              <a class="{{Route::is('roles.index')||Route::is('roles.create')||Route::is('roles.edit')? 'active':''}} treeview-item" href="{{route('roles.index')}}"
                ><i class="icon fa fa-tasks"></i> User Roles</a
              >
            </li>
            <li>
              <a class="{{Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? 'active':''}} treeview-item" href="{{route('permissions.index')}}"
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
        @endrole
      </ul>
    </aside>