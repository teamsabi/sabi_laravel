@extends('app_user')
@section('content')

<div class="our-cases-area" style="padding-top: 50px; padding-bottom: 50px;">
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
            <div class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom: 50px;">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative; ">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case1.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">03 Maret 2025</p>
                        <h3 class="text-start mb-1" style="font-weight: bold;"><a href="#">Donasi Ramadhan Berkah</a></h3>
                        <p class="text-start text-muted" style="margin-top: -40px;">Mari bersedekah di bulan yang suci ini.</p>
                        <!-- Progress Bar -->
                        <div class="mt-50"></div>
                        <div class="single-skill mb-15">
                            <div class="bar-progress">
                                <div id="bar1" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="70"></span>
                                </div>
                            </div>
                        </div>
                        <!-- / progress -->
                        <div class="prices d-flex justify-content-between">
                            <p>Terkumpul:<span> Rp 130.000</span></p>
                            <p>Target:<span> Rp 500.000</span></p>
                        </div>
                    </div>
                </div>
            </div>      
            <div class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom: 50px;">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case2.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">11 Januari 2025</p>
                        <h3 class="text-start mb-1" style="font-weight: bold;"><a href="#">Berita Duka: Orangtua Asep Berpulang</a></h3>
                        <p class="text-start text-muted" style="margin-top: -40px;">Berita duka, telah meninggal dunia Ayahanda dari teman kita Asep pada tanggal 11-01-2025</p>
                        <!-- Progress Bar -->
                        <div class="mt-50"></div>
                        <div class="single-skill mb-15">
                            <div class="bar-progress">
                                <div id="bar2" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="50"></span>
                                </div>
                            </div>
                        </div>
                        <!-- / progress -->
                        <div class="prices d-flex justify-content-between">
                            <p>Terkumpul:<span> Rp 250.000</span></p>
                            <p>Target:<span> Rp 500.000</span></p>
                        </div>
                    </div>
                </div>
            </div>      
            <div class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom: 50px;">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case3.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">20 Februari 2025</p>
                        <h3 class="text-start mb-1" style="font-weight: bold;"><a href="#">Berita Duka: Orangtua Asup Berpulang</a></h3>
                        <p class="text-start text-muted" style="margin-top: -40px;">Berita duka, telah meninggal dunia Ayahanda dari teman kita Asup pada tanggal 20-02-2025</p>
                        <!-- Progress Bar -->
                        <div class="mt-50"></div>
                        <div class="single-skill mb-15">
                            <div class="bar-progress">
                                <div id="bar3" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="50"></span>
                                </div>
                            </div>
                        </div>
                        <!-- / progress -->
                        <div class="prices d-flex justify-content-between">
                            <p>Terkumpul:<span> Rp 250.000</span></p>
                            <p>Target:<span> Rp 500.000</span></p>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom: 50px;">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case1.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">03 Maret 2025</p>
                        <h3 class="text-start mb-1" style="font-weight: bold;"><a href="#">Donasi Ramadhan Berkah</a></h3>
                        <p class="text-start text-muted" style="margin-top: -40px;">Mari bersedekah di bulan yang suci ini.</p>
                        <!-- Progress Bar -->
                        <div class="mt-50"></div>
                        <div class="single-skill mb-15">
                            <div class="bar-progress">
                                <div id="bar4" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="70"></span>
                                </div>
                            </div>
                        </div>
                        <!-- / progress -->
                        <div class="prices d-flex justify-content-between">
                            <p>Terkumpul:<span> Rp 130.000</span></p>
                            <p>Target:<span> Rp 500.000</span></p>
                        </div>
                    </div>
                </div>
            </div>      
            <div class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom: 50px;">
                <div class="single-cases mb-40 p-3 border rounded shadow h-100 d-flex flex-column" style="background-color: #f8f9fa; min-height: 280px; position: relative;">
                    <div class="cases-img text-center mb-3">
                        <img src="{{ asset('template user/assets/img/gallery/case1.png') }}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="cases-caption">
                        <p class="date text-muted">03 Maret 2025</p>
                        <h3 class="text-start mb-1" style="font-weight: bold;"><a href="#">Donasi Ramadhan Berkah</a></h3>
                        <p class="text-start text-muted" style="margin-top: -40px;">Mari bersedekah di bulan yang suci ini.</p>
                        <!-- Progress Bar -->
                        <div class="mt-50"></div>
                        <div class="single-skill mb-15">
                            <div class="bar-progress">
                                <div id="bar5" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="70"></span>
                                </div>
                            </div>
                        </div>
                        <!-- / progress -->
                        <div class="prices d-flex justify-content-between">
                            <p>Terkumpul:<span> Rp 130.000</span></p>
                            <p>Target:<span> Rp 500.000</span></p>
                        </div>
                    </div>
                </div>
            </div>                               
        </div>
    </div>
</div>

@endsection