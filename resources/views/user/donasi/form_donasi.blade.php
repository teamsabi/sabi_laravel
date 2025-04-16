@extends('app_user')
@section('content')

<div class="our-cases-area" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-4">
                    <h2>Kamu Akan Berdonasi</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 text-center text-lg-start">
                <div class="about-img">
                    <img src="{{ asset('template user/assets/img/gallery/case1.png') }}" alt="" class="img-fluid" style="border-radius: 10px;">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <h5 class="card-title" style="font-size: 30px; font-weight: bold;">Ramadhan Berkah</h5>
                <p class="mb-3 text-muted" style="font-size: 18px;">Mari bersedekah di bulan yang suci ini.</p>
                <!-- Progress Bar -->
                <div style="width: 100%; margin-bottom: 10px;">
                    <div class="bar-progress">
                        <div id="bar1" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="70"></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div style="min-width: 130px;">
                        <h6 class="mb-1" style="font-size: 25px; font-weight: bold;">Rp 130.000</h6>
                        <small class="text-muted" style="font-size: 15px;">Dari target Rp 500.000</small>
                    </div>
                    <div class="text-end" style="min-width: 80px;">
                        <span class="fw-bold" style="font-size: 25px; font-weight: bold;">20</span><br>
                        <small class="text-muted" style="font-size: 15px;">Hari lagi</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
