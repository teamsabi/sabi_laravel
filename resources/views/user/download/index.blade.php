@extends('app_user')
@section('content')

<section class="about-low-area section-padding2" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-35">
                        <h2>Berdonasi Semakin Mudah Melalui Mobile APPS</h2>
                    </div>
                    <p>Saat ini tersedia untuk iPhone dan Android</p>
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
            <div class="col-lg-6 col-md-12">
                <!-- about-img -->
                <div class="row justify-content-center align-items-end" style="padding-top: 30px; padding-bottom: 30px;">
                    <div class="col-auto d-flex justify-content-center flex-nowrap">
                        <div style="transform: scale(1.2); margin-right: -50px;">
                            <img src="{{ asset('template user/assets/img/gallery/MockupHP3.png') }}" alt="JTICare App"
                                style="max-width: 330px; height: auto;">
                        </div>
                        <div style="transform: scale(1.2); margin-left: -50px;">
                            <img src="{{ asset('template user/assets/img/gallery/MockupHP3.png') }}" alt="JTICare App"
                                style="max-width: 330px; height: auto;">
                        </div>
                    </div>
                </div>                                                   
            </div>
        </div>
    </div>
</section>

@endsection