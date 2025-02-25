<div class="sidebar" data-background-color="light-blue">
    <div class="sidebar-logo">
      <div class="logo-header" data-background-color="light-blue">
        <a href="#" class="logo">
          <img
            src="{{asset('template/assets/img/JTICare.png')}}"
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
            <a href="{{ route('dashboard') }}">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('akun.index') }}">
              <i class="fas fa-users"></i>
              <p>Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kategori.index') }}">
              <i class="fas fa-list"></i>
              <p>Kategori Donasi</p>
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