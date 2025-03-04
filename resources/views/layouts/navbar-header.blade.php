<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" data-background-color="light-blue">
  <div class="container-fluid">
    <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
      <div class="input-group">
        <div class="input-group-prepend">
          <button type="submit" class="btn btn-search pe-1">
            <i class="fa fa-search search-icon"></i>
          </button>
        </div>
        <input
          type="text"
          placeholder="Cari.."
          class="form-control"
        />
      </div>
    </nav>

    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
      <li
        class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
      >
        <a
          class="nav-link dropdown-toggle"
          data-bs-toggle="dropdown"
          href="#"
          role="button"
          aria-expanded="false"
          aria-haspopup="true"
        >
          <i class="fa fa-search"></i>
        </a>
        <ul class="dropdown-menu dropdown-search animated fadeIn">
          <form class="navbar-left navbar-form nav-search">
            <div class="input-group">
              <input
                type="text"
                placeholder="Cari.."
                class="form-control"
              />
            </div>
          </form>
        </ul>
      </li>
      <li class="nav-item topbar-icon dropdown hidden-caret">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="notifDropdown"
          role="button"
          data-bs-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <i class="fa fa-bell"></i>
          <span class="notification">4</span>
        </a>
        <ul
          class="dropdown-menu notif-box animated fadeIn"
          aria-labelledby="notifDropdown"
        >
          <li>
            <div class="dropdown-title">
              4 Notifikasi Baru !
            </div>
          </li>
          <li>
            <div class="notif-scroll scrollbar-outer">
              <div class="notif-center">
                <a href="#">
                  <div class="notif-icon notif-success">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div class="notif-content">
                    <span class="block"> Ipul ngirim donasi Rp 1.000 </span>
                    <span class="time">9 abad yang lalu</span>
                  </div>
                </a>
                <a href="#">
                  <div class="notif-icon notif-success">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="notif-content">
                    <span class="block">
                      Putra login ndek kost
                    </span>
                    <span class="time">9 abad yang lalu</span>
                  </div>
                </a>
                <a href="#">
                  <div class="notif-img">
                    <img
                      src="{{asset('template/assets/img/profile2.jpg')}}"
                      alt="Img Profile"
                    />
                  </div>
                  <div class="notif-content">
                    <span class="block">
                      Ardy suka gay
                    </span>
                    <span class="time">20 abad yang lalu</span>
                  </div>
                </a>
                <a href="#">
                  <div class="notif-icon notif-danger">
                    <i class="fa fa-heart"></i>
                  </div>
                  <div class="notif-content">
                    <span class="block"> karin molor desain </span>
                    <span class="time">kesuwen</span>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li>
            <a class="see-all" href="javascript:void(0);"
              >delok en notif sg liyo<i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item topbar-user dropdown hidden-caret">
        <a
          class="dropdown-toggle profile-pic"
          data-bs-toggle="dropdown"
          href="#"
          aria-expanded="false"
        >
          <div class="avatar-sm">
            <img
              src="{{asset('template/assets/img/profile.jpg')}}"
              alt="..."
              class="avatar-img rounded-circle"
            />
          </div>
          <span class="profile-username">
            <span class="op-7">Hi,</span>
            <span class="fw-bold">Tiar Ganteng</span>
          </span>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
          <div class="dropdown-user-scroll scrollbar-outer">
            <li>
              <div class="user-box">
                <div class="avatar-lg">
                  <img
                    src="{{asset('template/assets/img/profile.jpg')}}"
                    alt="image profile"
                    class="avatar-img rounded"
                  />
                </div>
                <div class="u-text">
                  <h4>Tiar Ganteng</h4>
                  <p class="text-muted">tiar@gmail.com</p>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('profil.index') }}">Profil</a>
              <a class="dropdown-item" href="#">Pengaturan Akun</a>
              <a class="dropdown-item" href="#">Logout</a>
            </li>
          </div>
        </ul>
      </li>
    </ul>
  </div>
</nav>