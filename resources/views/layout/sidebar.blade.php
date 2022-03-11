<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
      <img src="{{ asset('') }}assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Main Menu</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      @can('manage_tags')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}" href="{{ route('tags.index') }}">
            <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-solid fa-tags"></i>
            </div>
            <span class="nav-link-text ms-1">Tags</span>
          </a>
        </li>
      @endcan
      @can('manage_categories')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
            <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-solid fa-folder"></i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
      @endcan
      @can('manage_categories')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
            <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-solid fa-newspaper"></i>
            </div>
            <span class="nav-link-text ms-1">Posts</span>
          </a>
        </li>
      @endcan
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Setting</h6>
      </li>
      @can('manage_menu')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/menu') || request()->is('admin/menu/*') ? 'active' : '' }}" href="{{ route('menu.index') }}">
            <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-solid fa-bars"></i>
            </div>
            <span class="nav-link-text ms-1">Menu</span>
          </a>
        </li>
      @endcan
      @can('manage_sliders')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : '' }}" href="{{ route('sliders.index') }}">
            <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-solid fa-tv"></i>
            </div>
            <span class="nav-link-text ms-1">Sliders</span>
          </a>
        </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-trash"></i>
          </div>
          <span class="nav-link-text ms-1">trash</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li>
      @can('manage_users')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-solid fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">Roles</span>
        </a>
      </li>
      @can('manage_permissions')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">
            <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-solid fa-key"></i>
            </div>
            <span class="nav-link-text ms-1">Permission</span>
          </a>
        </li>
      @endcan
    </ul>
  </div>
  <div class="sidenav-footer mx-3 ">
    <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
  </div>
</aside>