<div class="sidebar" data-background-color="light-blue">
    <div class="sidebar-logo">
      <div class="logo-header" data-background-color="light-blue">
        <a href="#" class="logo">
          <img
            src="{{asset('template/assets/img/kaiadmin/logo_light.svg')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Menu</h4>
          </li>
          <li class="nav-item">
            <a href="#">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
              <i class="fas fa-users"></i>
              <p>Akun</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
              <ul class="nav nav-collapse">
                <li>
                  <a href="#">
                    <span class="sub-item">Data Admin</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sub-item">Data User</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="#">
              <i class="fas fa-list"></i>
              <p>Katalog Donasi</p>
              <span class="badge badge-success">9</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#">
              <i class="fas fa-receipt"></i>
              <p>Data Donatur</p>
              <span class="badge badge-success">4</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#">
              <i class="fas fa-print"></i>
              <p>Laporan</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>