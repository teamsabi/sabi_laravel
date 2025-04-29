<div class="header-area">
    <div class="main-header ">
        <div class="header-top d-none d-lg-block">
            <div class="container-fluid">
                <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-left d-flex">
                            <ul>     
                                <li>Telepon: +62 858-0727-8580</li>
                                <li>Email: sabiteam23@gmail.com</li>
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
                                    <!-- Ini hanya muncul di MOBILE -->
                                    @auth
                                    <li class="d-block d-lg-none">
                                        <a href="#" style="font-weight: bold; display: flex; align-items: center;">
                                            <img src="{{ asset('template/assets/img/Foto Team/Syaiful.png') }}" alt="Profile" width="30" height="30" class="rounded-circle mr-2">
                                            <span>{{ Auth::user()->nama_lengkap }}</span>
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('user.profil.index') }}">Profil</a></li>
                                            <li>
                                                <a href="#" onclick="confirmLogout(event)">Logout</a>
                                                <form id="logout-form-mobile" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endauth
                                
                                    <!-- Menu lainnya-->
                                    <li><a href="{{ route('beranda.login') }}" style="font-weight: bold;">Beranda</a></li>
                                    <li><a href="{{ route('donasi.index') }}" style="font-weight: bold;">Donasi</a></li>
                                    <li><a href="{{ route('download.index') }}" style="font-weight: bold;">Download</a></li>
                                    <li><a href="#" style="font-weight: bold;">Tentang Kami</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('about.index') }}" style="font-weight: bold;">Tentang Kami</a></li>
                                            <li><a href="{{ route('FAQ.index') }}" style="font-weight: bold;">FAQ</a></li>
                                            <li><a href="{{ route('hubungi kami.index') }}" style="font-weight: bold;">Hubungi Kami</a></li>
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
                        <!-- Login Button dan User Profil -->
                        <div class="header-right-btn d-none d-lg-block ml-3">
                            @auth
                            <!-- Ini hanya muncul di DESKTOP -->
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('template/assets/img/default.png') }}" alt="Profile" width="40" height="40" class="rounded-circle">
                                    <span class="ml-2" style="color: black; font-size: 16px;">Hi, <strong>{{ Auth::user()->nama_lengkap }}</strong></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown" style="min-width: 260px; padding: 0;">
                                    <div class="p-3 d-flex align-items-center" style="border-bottom: 1px solid #e0e0e0;">
                                        <img src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('template/assets/img/default.png') }}" alt="Profile" width="50" height="50" class="rounded-circle mr-3">
                                        <div>
                                            <strong style="font-size: 15px;">{{ Auth::user()->nama_lengkap }}</strong><br>
                                            <span style="font-size: 12px; color: #6c757d;">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('user.profil.index') }}" style="font-size: 13px; padding: 8px 20px 4px;">Profil</a>
                                    <form id="logout-form-desktop" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#" onclick="confirmLogout(event)" style="font-size: 13px; padding: 4px 20px 10px;">Logout</a>
                                </div>
                            </div>
                            @endauth
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
                if (document.getElementById('logout-form-desktop')) {
                    document.getElementById('logout-form-desktop').submit();
                } else if (document.getElementById('logout-form-mobile')) {
                    document.getElementById('logout-form-mobile').submit();
                }
            }
        });
    }
</script>
