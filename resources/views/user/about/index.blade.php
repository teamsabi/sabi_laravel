@extends('app_user')
@section('content')

<!-- Apa itu JTICare? -->
<section class="about-low-area section-padding2" style="padding-top: 80px; padding-bottom: 80px">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10">
                <div class="about-caption mb-50">
                    <div class="section-tittle mb-35">
                        <h2>Apa itu JTICare?</h2>
                    </div>
                    <p style="text-align: justify;">JTICare adalah sebuah aplikasi yang dirancang untuk memfasilitasi penggalangan dana untuk berbagai keperluan sosial, seperti bantuan bagi keluarga yang berduka, bantuan medis, dan aksi sosial lainnya. Aplikasi ini hadir sebagai solusi yang memudahkan setiap orang untuk berkontribusi dalam situasi yang membutuhkan, dengan memastikan proses penggalangan dana yang mudah, cepat, dan terpercaya. Kami memahami bahwa saat-saat darurat atau membutuhkan bantuan sering datang tanpa peringatan, dan JTICare ingin menjadikan proses memberikan dukungan menjadi lebih sederhana dan efektif, tanpa hambatan teknis.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-img ">
                    <div class="about-font-img d-none d-lg-block">
                        <img src="{{ asset('template user/assets/img/gallery/Donasi3.png') }}" alt="">
                    </div>
                    <div class="about-back-img ">
                        <img src="{{ asset('template user/assets/img/gallery/Donasi4.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jumlah Donatur & Donasi -->
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
                                    <span class="counter color-green">{{ $jumlahDonatur ?? 0 }}</span>
                                </p>
                                <p class="mb-0">Orang Telah Berdonasi</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="single-counter text-center">
                                <i class="fas fa-credit-card fa-3x"></i>
                                <p class="fw-bold fs-2 mb-0">
                                    Rp <span class="counter color-green">{{ number_format($danaTerkumpul ?? 0, 0, ',', '.') }}</span>
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

<!-- Team -->
<div class="testimonial-area testimonial-padding" style="padding-top: 60px;">
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

@endsection