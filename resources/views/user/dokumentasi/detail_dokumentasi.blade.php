@extends('app_user')
@section('content')

<div class="our-cases-area py-5" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-10">
                <div class="section-title text-start mb-4">
                    <p class="text-muted mb-1" style="font-size: 14px;">13 April 2025</p>
                    <h2 class="mb-4" style="font-size: 32px; font-weight: bold;">Penyerahan Donasi untuk Keluarga Asep</h2>
                    <p class="text-muted mb-3" style="font-size: 16px;">
                        <strong>Penerima Donasi: </strong> Keluarga Asep
                    </p>
                    <div class="card border-0 shadow-sm mb-4">
                        <img src="{{ asset('template/assets/img/Foto Team/Syaiful.png') }}" alt="Dokumentasi Penyerahan" class="img-fluid rounded" style="object-fit: cover; width: 100%; max-height: 450px;">
                    </div>
                    <p class="lead" style="font-size: 16px; line-height: 1.8;">
                        Pada tanggal 13 April 2025, penyerahan bantuan untuk keluarga Bapak Asep telah dilakukan sebagai bentuk kepedulian dari keluarga besar Jurusan Teknologi Informasi. 
                        Bantuan ini berhasil terkumpul melalui aplikasi JTI CARE, yang dirancang untuk mendukung penggalangan dana sosial secara transparan dan real-time. 
                        Kami berharap bantuan ini dapat sedikit meringankan beban keluarga dan menjadi motivasi untuk terus menumbuhkan solidaritas sosial di lingkungan kampus.
                    </p>
                    <div class="my-5">
                        <h4 class="mb-4" style="font-size: 20px; font-weight: bold; border-top: 2px solid #0b1c3957; padding-top: 15px;">
                            Dokumentasi Donasi Lainnya
                        </h4>
                        <div class="d-flex align-items-start mb-3">
                            <img src="{{ asset('template/assets/img/Foto Team/Putra.png') }}" alt="Dokumentasi Lainnya" class="me-4 rounded" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                            <div style="padding-left: 20px;">
                                <a href="#" class="text-decoration-none fw-bold" style="color: #0b1c39; font-weight: bold;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='#0b1c39'">
                                    Penyerahan Donasi untuk Keluarga Asup
                                </a>
                                <p class="mb-0 text-muted" style="font-size: 14px; line-height: 1.6;">
                                    Pada tanggal 13 April 2025, penyerahan bantuan untuk keluarga Bapak Asup telah dilakukan...
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <img src="{{ asset('template/assets/img/Foto Team/Ardy.png') }}" alt="Dokumentasi Lainnya" class="me-4 rounded" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                            <div style="padding-left: 20px;">
                                <a href="#" class="text-decoration-none fw-bold" style="color: #0b1c39; font-weight: bold;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='#0b1c39'">
                                    Penyerahan Donasi untuk Keluarga Asup
                                </a>
                                <p class="mb-0 text-muted" style="font-size: 14px; line-height: 1.6;">
                                    Pada tanggal 13 April 2025, penyerahan bantuan untuk keluarga Bapak Asup telah dilakukan...
                                </p>
                            </div>
                        </div>
                        <footer class="text-muted mt-5 text-center" style="font-size: 14px;">
                            Dokumentasi ini dibuat oleh Tim JTI CARE – Politeknik Negeri Jember
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
