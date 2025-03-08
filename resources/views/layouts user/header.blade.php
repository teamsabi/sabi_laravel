<div class="header-area">
    <div class="main-header ">
        <div class="header-top d-none d-lg-block">
            <div class="container-fluid">
                <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-left d-flex">
                            <ul>     
                                <li>Telepon: +62 858-0727-8580</li>
                                <li>Email: noreply@yourdomain.com</li>
                            </ul>
                        </div>
                        <div class="header-info-right d-flex align-items-center"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom  header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-12 col-lg-12 d-flex align-items-center">
                        <div class="logo mr-4" style="margin-top: 10px;">
                            <a href="{{ route('home.index') }}">
                                <img src="{{ asset('template user/assets/img/logo/JTICare blue.png') }}" alt="">
                            </a>
                        </div>
                        <div class="main-menu d-none d-lg-block flex-grow-1">
                            <nav>
                                <ul id="navigation" class="d-flex align-items-center justify-content-center">                                                                                          
                                    <li><a href="{{ route('home.index') }}" style="font-weight: bold;">Beranda</a></li>
                                    <li><a href="{{ route('donasi.index') }}" style="font-weight: bold;">Donasi</a></li>
                                    <li><a href="{{ route('download.index') }}" style="font-weight: bold;">Download</a></li>
                                    <li><a href="#" style="font-weight: bold;">Tentang Kami</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('about.index') }}" style="font-weight: bold;">Tentang Kami</a></li>
                                            <li><a href="#" style="font-weight: bold;">FAQ</a></li>
                                            <li><a href="#" style="font-weight: bold;">Hubungi Kami</a></li>
                                            <li>
                                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                  </form>
                                                  <a class="dropdown-item" href="#" onclick="confirmLogout(event)">
                                                    Logout
                                                  </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Search Button -->
                        <div class="header-right-btn d-none d-lg-block ml-3">
                            <div class="input-group" 
                                style="width: 200px; height: 60px; background-color: white; border-radius: 8px; display: flex; align-items: center; padding: 5px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" 
                                        style="background: transparent; border: none; color: #48ABF7; font-size: 25px; padding-left: 10px;">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" placeholder="Cari.." class="form-control" 
                                    style="background: transparent; border: none; font-size: 16px; padding-left: 5px; outline: none; box-shadow: none;">
                            </div>
                        </div>
                        <!-- Login Button -->
                        <div class="header-right-btn d-none d-lg-block ml-3" style="display: flex; align-items: center; padding: 5px;">
                            <a href="{{ route('auth.login') }}" class="btn btn-primary" style="border-radius: 10px;">Masuk</a>
                        </div>                            
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
</header>
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

