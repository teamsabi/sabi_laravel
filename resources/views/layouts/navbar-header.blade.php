<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" data-background-color="light-blue">
  <div class="container-fluid">
    <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
      <div class="input-group">
        <div class="input-group-prepend">
          <button type="submit" class="btn btn-search pe-1">
            <i class="fa fa-search search-icon"></i>
          </button>
        </div>
        <input type="text" placeholder="Cari.." class="form-control" />
      </div>
    </nav>

    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
      <li class="nav-item topbar-user dropdown hidden-caret">
        <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
          <div class="avatar-sm">
            <img src="{{ Auth::user()->foto_profil_url }}" alt="..." class="avatar-img rounded-circle" />
          </div>
          <span class="profile-username">
            <span class="op-7">Hi,</span>
            <span class="fw-bold">{{ Auth::user()->nama_lengkap }}</span>
          </span>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
          <div class="dropdown-user-scroll scrollbar-outer">
            <li>
              <div class="user-box">
                <div class="avatar-lg">
                  <img src="{{ Auth::user()->foto_profil_url }}" alt="image profile" class="avatar-img rounded" />
                </div>
                <div class="u-text">
                  <h4>{{ Auth::user()->nama_lengkap }}</h4>
                  <p class="text-muted">{{ Auth::user()->email }}</p>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('profil.index') }}">Profil</a>
              <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="dropdown-item" href="#" onclick="confirmLogout(event)">
                Logout
              </a>
            </li>
          </div>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmLogout(event) {
    event.preventDefault();

    Swal.fire({
      title: 'Apakah Anda yakin ingin logout?',
      text: "Anda harus login kembali untuk mengakses akun.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Logout!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
      }
    });
  }
</script>
