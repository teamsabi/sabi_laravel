@extends('app_user')
@section('content')

<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 pe-4">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Pengaturan</h4>
            <div class="list-group">
                <a href="{{ route('user.profil.index') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
                    Profil Publik
                </a>
                <a href="{{ route('user.profil.notifikasi') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
                    Notifikasi
                </a>
                <a href="{{ route('user.profil.donasi-saya') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-primary fw-bold" style="padding-left: 0;">
                    Donasi Saya
                </a>
                <a href="{{ route('user.profil.pengaturan-akun') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
                    Pengaturan Akun
                </a>
            </div>
        </div>      

        <!-- Main Content -->
        <div class="col-md-9 ps-4" style="border-left: 1px solid #d1d5db;">
            <h4 class="mb-3" style="font-size: 20px; font-weight: bold;">Donasi Saya</h4>
            <p class="mb-3">Kamu sudah berdonasi sebanyak 1x dengan total <strong>Rp 1.000</strong></p>

            <!-- Notifikasi -->
            <div class="border rounded mb-3 p-3 position-relative" style="max-width: 500px; min-height: 100px;">
                <div class="d-flex align-items-start" style="gap: 1rem;">
                    <img src="{{ asset('template/assets/img/Foto Team/Putra.png') }}" alt="Campaign Image" class="rounded" style="width: 80px; height: 80px; object-fit: cover; flex-shrink: 0;">
                    <div style="font-size: 14px; line-height: 1.5;">
                        <div class="text-success fw-semibold">Berhasil</div>
                        <div class="mb-1">
                            <strong>Ayah Asep Berpulang</strong>
                            <div class="text-muted" style="font-size: 13px;">01 April</div>
                            <div class="fw-bold mt-1">Rp 1.000</div>
                        </div>
                    </div>
                </div>
                <!-- Btn untuk desktop -->
                <a href="#" class="genric-btn info btn-sm position-absolute d-none d-sm-block" style="bottom: 10px; right: 10px;">
                    Lagi
                </a>

                <!-- Btn untuk mobile -->
                <div class="d-block d-sm-none mt-3 text-end">
                    <a href="#" class="genric-btn info btn-sm">
                        Lagi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection