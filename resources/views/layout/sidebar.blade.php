<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
      <img src="{{ asset('') }}assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('tags') || request()->is('tags/*') ? 'active' : '' }}" href="{{ route('tags.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-tags"></i>
          </div>
          <span class="nav-link-text ms-1">Tags</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1">Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('posts') || request()->is('posts/*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-newspaper"></i>
          </div>
          <span class="nav-link-text ms-1">Posts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('roles') || request()->is('roles/*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">Roles</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1">Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1">Sliders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1">trash</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1">Role</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
          <div class="icon-sm shadow border-radius-md bg-dark text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1">Permission</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mx-3 ">
    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
      <div class="full-background" style="background-image: url('{{ asset('') }}assets/img/curved-images/white-curved.jpeg')"></div>
      <div class="card-body text-start p-3 w-100">
        <div class="bg-dark text-white icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
          <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
        </div>
        <div class="docs-info">
          <h6 class="text-white up mb-0">Need help?</h6>
          <p class="text-xs font-weight-bold">Please check our docs</p>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
        </div>
      </div>
    </div>
    <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
  </div>
</aside>