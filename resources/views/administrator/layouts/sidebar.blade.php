    <div class="sidebar" data-background-color="light-blue">
        <div class="sidebar-logo">
          <div class="logo-header" data-background-color="light-blue">
            <a href="index.html" class="logo">
              <img
                src="{{ asset('administrator/img/kaiadmin/logo_light.svg')}}"
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
            <ul class="nav nav-info">
              <li class="nav-item active">
                <a href="index.html">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">MENU</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#akun">
                  <i class="fas fa-user"></i>
                  <p>Akun</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="akun">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#admin">
                        <span class="sub-item">Admin</span>
                      </a>
                    </li>
                    <li>
                      <a href="#user">
                        <span class="sub-item">User</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="#donasi">
                  <i class="fas fa-dollar-sign"></i>
                  <p>Donasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#donatur">
                  <i class="fas fa-users"></i>
                  <p>Donatur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#laporan">
                  <i class="fas fa-file"></i>
                  <p>Laporan</p>
                </a>
              </li>
          </div>
        </div>
      </div>