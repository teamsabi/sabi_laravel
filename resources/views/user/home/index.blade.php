@extends('app_user')
@section('content')

<!-- slider Area Start-->
<div class="slider-area">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInUp" data-delay=".6s">Wujudkan kepedulian<br> melalui donasi</h1>
                            <P data-animation="fadeInUp" data-delay=".8s" >Aplikasi donasi yang memudahkan mahasiswa dan alumni berkontribusi bagi kemajuan Jurusan Teknologi Informasi.</P>
                            <!-- Hero-btn -->
                            <div class="hero__btn">
                                <a href="#" class="btn hero-btn mb-10"  data-animation="fadeInLeft" data-delay=".8s" style="border-radius: 10px;">Donasi Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- slider Katalog Donasi Start-->
<div class="our-cases-area section-padding30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-80">
                    <h2>Mari Berbagi kebaikan </h2>
                    <p style="font-size: 18px; font-weight: bold;">Sedikit kebaikan dari kita adalah harapan besar bagi mereka yang membutuhkan. Ayo berdonasi sekarang!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case1.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">03 Maret 2025</p>
                        <h3 class="text-center;" style="font-weight: bold;">Donasi Ramadhan Berkah</h3>
                        <p class="text-start text-muted">Mari bersedekah di bulan yang suci ini.</p>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm mt-auto" style="position: absolute; top: 10px; right: 10px;">Baca Selengkapnya</a>
                </div>
            </div>      
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case2.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">11 Januari 2025</p>
                        <h3 class="text-center;" style="font-weight: bold;">Berita Duka: Orangtua Asep Berpulang</h3>
                        <p class="text-start text-muted">Berita duka, telah meninggal dunia Ayahanda dari teman kita Asep pada tanggal 11-01-2025.</p>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm mt-auto" style="position: absolute; top: 10px; right: 10px;">Baca Selengkapnya</a>
                </div>               
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case3.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">20 Februari 2025</p>
                        <h3 class="text-center;" style="font-weight: bold;">Berita Duka: Orangtua Asup Berpulang</h3>
                        <p class="text-start text-muted">Berita duka, telah meninggal dunia Ayahanda dari teman kita Asup pada tanggal 20-02-2025.</p>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm mt-auto" style="position: absolute; top: 10px; right: 10px;">Baca Selengkapnya</a>
                </div>               
            </div>
            <!-- Lihat Semua Button -->
            <div class="header-center-btn" style="display: flex; justify-content: center; align-items: center; width: 100%; padding: 40px;">
                <a href="#" class="btn btn-primary" style="border-radius: 10px;">Lihat Semua</a>
            </div>                                
        </div>
    </div>
</div>

@endsection