@extends('app_user')
@section('content')

<div class="our-cases-area" style="padding-bottom: 30px; padding-top: 50px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center mb-80">
                    <h2 style="font-size: 35px;">Dokumentasi Penyerahan Donasi</h2>
                    <p style="font-size: 18px; font-weight: bold;">Dokumentasi ini menunjukkan betapa besar dampak dari setiap donasi yang Anda berikan. Mari terus berbagi kebaikan!</p>
                </div>
            </div>
        </div>
        <!-- Menampilkan 3 kategori donasi terbaru -->
        <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4 d-flex">
            <div class="single-cases p-3 border rounded shadow w-100 d-flex flex-column" style="background-color: #f8f9fa;">
                <div class="cases-img text-center mb-3">
                    <img src="{{ asset('template/assets/img/Foto Team/Syaiful.png') }}" alt="Gambar Dokumentasi" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
                </div>
                <div class="cases-caption flex-grow-1">
                    <p class="date text-muted">13 Apr 2025</p>
                    <h3 class="text-start mb-1 fw-bold">
                        <a href="{{ route('user.dokumentasi.detail') }}">Bantuan untuk Keluarga Asep</a>
                    </h3>
                    <p class="text-start text-muted" style="margin-top: -30px;">
                        Trims.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection