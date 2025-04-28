@extends('app_user')
@section('content')

@if (Session::has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ Session::get('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

<!-- Beranda Start-->
<div class="slider-area">
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInUp" data-delay=".6s">Wujudkan kepedulian<br> melalui donasi</h1>
                            <P data-animation="fadeInUp" data-delay=".8s" >Aplikasi donasi yang memudahkan mahasiswa dan alumni berkontribusi bagi kemajuan Jurusan Teknologi Informasi.</P>
                            <div class="hero__btn">
                                <a href="{{ route('auth.login') }}" class="btn hero-btn mb-10"  data-animation="fadeInLeft" data-delay=".8s" style="border-radius: 10px;">Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Beranda End-->

<!-- Katalog Donasi Start-->
<div class="our-cases-area" style="padding-bottom: 20px; padding-top: 30px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-80">
                    <h2>Mari Berbagi kebaikan </h2>
                    <p style="font-size: 18px; font-weight: bold;">Sedikit kebaikan dari kita adalah harapan besar bagi mereka yang membutuhkan. Ayo berdonasi sekarang!</p>
                </div>
            </div>
        </div>
        <!-- Menampilkan 3 kategori donasi terbaru -->
        <div class="row">
            @if(isset($kategoriDonasi) && $kategoriDonasi->isNotEmpty())
                @foreach($kategoriDonasi as $kategori)
                    @php
                        $persen = $kategori->target_dana > 0 
                            ? round(($kategori->terkumpul / $kategori->target_dana) * 100) 
                            : 0;
                        $persen = min($persen, 100);
                    @endphp
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4 d-flex">
                        <div class="single-cases p-3 border rounded shadow w-100 d-flex flex-column" style="background-color: #f8f9fa;">
                            <div class="cases-img text-center mb-3">
                                <img src="{{ asset('storage/' . $kategori->gambar) }}" alt="Gambar Donasi" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
                            </div>
                            <div class="cases-caption flex-grow-1">
                                <p class="date text-muted">{{ \Carbon\Carbon::parse($kategori->tanggal_buat)->format('d M Y') }}</p>
                                <h3 class="text-start mb-1 fw-bold">
                                    @if(Auth::check())
                                        <a href="{{ route('donasi.detail', $kategori->id) }}">{{ $kategori->judul_donasi }}</a>
                                    @else
                                        <a href="{{ route('auth.login') }}" 
                                           onclick="event.preventDefault(); 
                                                    Swal.fire({
                                                        title: 'Silakan login terlebih dahulu',
                                                        text: 'Untuk melihat detail donasi.',
                                                        icon: 'warning',
                                                        confirmButtonText: 'OK'
                                                    }).then(() => {
                                                        window.location.href = '{{ route('auth.login') }}';
                                                    })">
                                           {{ $kategori->judul_donasi }}
                                        </a>
                                    @endif
                                </h3>
                                <p class="text-start text-muted" style="margin-top: -40px;">
                                    {{ Str::limit($kategori->deskripsi, 100) }}
                                </p>
        
                                <!-- Progress Bar -->
                                <div class="mt-3"></div>
                                <div class="single-skill mb-2">
                                    <div class="bar-progress">
                                        <div class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip">{{ $persen }}%</span>
                                            </div>
                                            <span class="fill" data-percentage="{{ $persen }}" style="width: {{ $persen }}%; background: #1d8cf8;"></span>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="prices d-flex justify-content-between">
                                    <p>Terkumpul :<span> Rp {{ number_format($kategori->terkumpul, 0, ',', '.') }}</span></p>
                                    <p>Target :<span> Rp {{ number_format($kategori->target_dana, 0, ',', '.') }}</span></p>
                                </div>
                                <div style="border-top: 1px solid #e0e0e0; margin-top: -5px; padding-top: 5px;">
                                    <p><strong>Jumlah Donatur :</strong> <span>{{ $kategori->jumlah_donatur }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">Tidak ada kategori donasi yang tersedia.</p>
                </div>
            @endif
        </div>        
        <!-- Lihat Semua Button -->
        <div class="header-center-btn" style="display: flex; justify-content: center; align-items: center; width: 100%; padding: 40px;">
            <a href="{{ route('donasi.index') }}" class="btn btn-primary" style="border-radius: 10px;">Lihat Semua</a>
        </div>                                 
    </div>
</div>
<!-- Katalog Donasi End-->

<!-- Jumlah Donatur & Donasi Start -->
<div class="count-down-area section-bg" style="background-image: url('{{ asset('template user/assets/img/gallery/Cover About.png') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center align-items-center ">
            <div class="col-lg-12 col-md-12">
                <div class="count-down-wrapper">
                    <div class="row justify-content-center text-white">
                        <div class="col-md-6 col-sm-12">
                            <div class="single-counter text-center">
                                <i class="fas fa-users fa-3x"></i>
                                <p class="fw-bold fs-2 mb-0">
                                    <span class="counter color-green">180</span>
                                </p>
                                <p class="mb-0">Orang Telah Berdonasi</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="single-counter text-center">
                                <i class="fas fa-credit-card fa-3x"></i>
                                <p class="fw-bold fs-2 mb-0">
                                    Rp <span class="counter color-green">3,200,000</span>
                                </p>
                                <p class="mb-0">Dana Terkumpul</p>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
<!--? Jumlah Donatur & Donasi End-->

<!--? Tentang Kami Start-->
<section class="about-low-area section-padding2" style="padding-top: 120px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-35">
                        <h2>Apa itu JTICare?</h2>
                    </div>
                    <p style="text-align: justify;">JTICARE adalah sebuah aplikasi yang memfasilitasi penggalangan dana untuk berbagai keperluan sosial, seperti bantuan bagi keluarga yang berduka, bantuan medis, dan aksi sosial lainnya. Dengan fitur yang transparan dan mudah digunakan, JTICare memungkinkan anggota komunitas untuk berkontribusi secara cepat dan tepat sasaran.</p>
                </div>
                <a href="{{ route('about.index') }}" class="btn" style="border-radius: 10px;">Tentang Kami</a>
            </div>
            <div class="col-lg-6 col-md-12">
                <!-- about-img -->
                <div class="about-img">
                    <div class="about-font-img d-none d-lg-block">
                        <img src="{{ asset('template user/assets/img/gallery/about2.png') }}" alt="">
                    </div>
                    <div class="about-back-img ">
                        <img src="{{ asset('template user/assets/img/gallery/about1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tentang Kami End-->

<!-- Download Mobile Start -->
<section class="wantToWork-area">
    <div class="container">
        <div class="wants-wrapper w-padding2 section-bg" style="background-image: url('{{ asset('template user/assets/img/gallery/Cover Download.png') }}'); 
                    background-size: cover; background-position: center; padding: 30px; border-radius: 10px;">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="wantToWork-caption wantToWork-caption2">
                        <h2 style="color: white; font-size: 28px; font-weight: bold;">Download Aplikasi JTICare</h2>
                    </div>
                    <div class="mt-3" style="display: flex; gap: 15px;">
                        <a href="#" style="display: inline-block;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" style="height: 50px;">
                        </a>
                        <a href="#" style="display: inline-block;">
                            <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" style="height: 50px;">
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-flex justify-content-end">
                    <div style="transform: scale(1.5); transform-origin: right;">
                        <img src="{{ asset('template user/assets/img/gallery/MockupHP3.png') }}" alt="JTICare App"
                            style="max-width: 90px; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Download Mobile End-->

<!-- Team Start -->
<div class="testimonial-area testimonial-padding" style="padding-top: 20px;">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10">
                <div class="section-tittle text-center mb-10">
                    <h2>Team Kami </h2>
                    <p style="font-size: 18px;">Berkenalan dengan tim hebat di balik JTICare!</p>
                </div>
                <div class="h1-testimonial-active dot-style">
                    <!-- Syaiful Amin -->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-caption">
                            <div class="testimonial-founder">
                                <div class="founder-img mb-1">
                                    <img src="{{ asset('template/assets/img/Foto Team/Syaiful.png') }}" 
                                         class="rounded-circle img-fluid" width="150" height="150" alt="">
                                    <span>Syaiful Amin</span>
                                    <p>Project Manager</p>
                                    <span><a href="https://www.instagram.com/saipul05___/" style="display: block; color: #002a57; text-decoration: none; font-size: 14px;">@saipul05__</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dwi Rasyari -->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-caption">
                            <div class="testimonial-founder">
                                <div class="founder-img mb-40">
                                    <img src="{{ asset('template/assets/img/Foto Team/Putra.png') }}" 
                                         class="rounded-circle img-fluid" width="150" height="150" alt="">
                                    <span>Dwi Rasyari Putra</span>
                                    <p>Developer Mobile</p>
                                    <span><a href="https://www.instagram.com/putrawithyou/" style="display: block; color: #002a57; text-decoration: none; font-size: 14px;">@putrawithyou</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Kariena Adelia -->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-caption">
                            <div class="testimonial-founder">
                                <div class="founder-img mb-40">
                                    <img src="{{ asset('template/assets/img/Foto Team/Karin.png') }}" 
                                         class="rounded-circle img-fluid" width="150" height="150" alt="">
                                    <span>Kariena Adelia Maharani</span>
                                    <p>UI/UX Designer</p>
                                    <span><a href="https://www.instagram.com/karinieww/" style="display: block; color: #002a57; text-decoration: none; font-size: 14px;">@karinieww</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Nadhifatus Aulia -->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-caption">
                            <div class="testimonial-founder">
                                <div class="founder-img mb-40">
                                    <img src="{{ asset('template/assets/img/Foto Team/Enggar.png') }}" 
                                         class="rounded-circle img-fluid" width="150" height="150" alt="">
                                    <span>Nadhifatus Aulia Enggarsya</span>
                                    <p>Developer Web</p>
                                    <span><a href="https://www.instagram.com/ersyaulia_/" style="display: block; color: #002a57; text-decoration: none; font-size: 14px;">@ersyaulia_</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Achmad Sofyan Raditya -->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-caption">
                            <div class="testimonial-founder">
                                <div class="founder-img mb-40">
                                    <img src="{{ asset('template/assets/img/Foto Team/Ardy.png') }}" 
                                         class="rounded-circle img-fluid" width="150" height="150" alt="">
                                    <span>Achmad Sofyan Raditya Cahyadi</span>
                                    <p>Developer Mobile</p>
                                    <span><a href="https://www.instagram.com/ardysofyaan/" style="display: block; color: #002a57; text-decoration: none; font-size: 14px;">@ardysofyaan</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@endsection