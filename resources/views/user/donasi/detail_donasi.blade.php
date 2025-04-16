@extends('app_user')
@section('content')

<div class="container mt-5">
    <div class="row">
        <!-- Bagian Donasi Utama -->
        <div class="col-lg-8">
            <div class="card border-0 mb-4">
                <img src="{{ asset('template user/assets/img/gallery/case1.png') }}" alt=""  class="card-img-top mb-3" style="width: 100%; max-height: 350px; object-fit: cover; border-radius: 20px;">
                <div class="card-body px-0">
                    <h5 class="card-title" style="font-size: 30px; font-weight: bold;">Ramadhan Berkah</h5>
                    <p class="mb-3 text-muted" style="font-size: 18px;">Mari bersedekah di bulan yang suci ini.</p>
                    <div class="d-flex justify-content-between align-items-center mb-3">
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
                    <a href="{{ route('donasi.form_donasi') }}" class="btn btn-primary w-100" style="font-size: 15px;">Donasi Sekarang</a>
                </div>
            </div>
        </div>
        
        <!-- Donasi Serupa -->
        <div class="col-lg-4">
            <h5 class="fw-bold mb-3" style="font-size: 30px; font-weight: bold; border-bottom: 4px solid #0b1c3957; padding-bottom: 10px;">Donasi Serupa</h5>
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('template user/assets/img/gallery/case2.png') }}" alt="Donasi Serupa" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px; margin-right: 16px;">
                <div>
                    <p class="text-start mb-1" style="font-weight: bold;">
                        <a href="#" style="color: #0b1c39; text-decoration: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">Berita Duka: Orangtua Asep Berpulang</a>
                    </p>                      
                    <small class="text-muted" style="font-size: 15px;">Terkumpul Rp 200.000</small>
                </div>
            </div>
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('template user/assets/img/gallery/case2.png') }}" alt="Donasi Serupa" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px; margin-right: 16px;">
                <div>
                    <p class="text-start mb-1" style="font-weight: bold;">
                        <a href="#" style="color: #0b1c39; text-decoration: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">Berita Duka: Orangtua Asep Berpulang</a>
                    </p>                      
                    <small class="text-muted" style="font-size: 15px;">Terkumpul Rp 200.000</small>
                </div>
            </div>
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('template user/assets/img/gallery/case2.png') }}" alt="Donasi Serupa" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px; margin-right: 16px;">
                <div>
                    <p class="text-start mb-1" style="font-weight: bold;">
                        <a href="#" style="color: #0b1c39; text-decoration: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">Berita Duka: Orangtua Asep Berpulang</a>
                    </p>                      
                    <small class="text-muted" style="font-size: 15px;">Terkumpul Rp 200.000</small>
                </div>
            </div>
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('template user/assets/img/gallery/case2.png') }}" alt="Donasi Serupa" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px; margin-right: 16px;">
                <div>
                    <p class="text-start mb-1" style="font-weight: bold;">
                        <a href="#" style="color: #0b1c39; text-decoration: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">Berita Duka: Orangtua Asep Berpulang</a>
                    </p>                      
                    <small class="text-muted" style="font-size: 15px;">Terkumpul Rp 200.000</small>
                </div>
            </div>
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('template user/assets/img/gallery/case2.png') }}" alt="Donasi Serupa" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px; margin-right: 16px;">
                <div>
                    <p class="text-start mb-1" style="font-weight: bold;">
                        <a href="#" style="color: #0b1c39; text-decoration: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">Berita Duka: Orangtua Asep Berpulang</a>
                    </p>                      
                    <small class="text-muted" style="font-size: 15px;">Terkumpul Rp 200.000</small>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
