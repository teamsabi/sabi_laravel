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
                <a href="{{ route('user.profil.notifikasi') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-primary fw-bold" style="padding-left: 0;">
                    Notifikasi
                </a>
                <a href="{{ route('user.profil.donasi-saya') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
                    Donasi Saya
                </a>
                <a href="{{ route('user.profil.pengaturan-akun') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
                    Pengaturan Akun
                </a>
            </div>
        </div>    

        <!-- Main Content -->
        <div class="col-md-9 ps-4" style="border-left: 1px solid #d1d5db;">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Notifikasi</h4>

            <!-- Notifikasi -->
            <div class="border rounded mb-3 p-3" style="max-width: 500px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-emoji-smile-fill"></i> Donasi
                    </div>
                    <div class="text-muted" style="font-size: 14px;">2 bulan yang lalu</div>
                </div>
                <div class="d-flex align-items-start" style="gap: 1rem;">
                    <img src="{{ asset('template/assets/img/Foto Team/Putra.png') }}" alt="Campaign Image" class="rounded" style="width: 50px; height: 50px; object-fit: cover; flex-shrink: 0;">
                    <div style="font-size: 14px; line-height: 1.5;">
                        <div class="mb-1">
                            Kamu berhasil berdonasi pada Kategori Donasi yang berjudul <strong>Ayah Asep Berpulang</strong> sebesar <strong>Rp. 1.000</strong>.
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded mb-3 p-3" style="max-width: 500px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-emoji-smile-fill"></i> Donasi
                    </div>
                    <div class="text-muted" style="font-size: 14px;">2 bulan yang lalu</div>
                </div>
                <div class="d-flex align-items-start" style="gap: 1rem;">
                    <img src="{{ asset('template/assets/img/Foto Team/Putra.png') }}" alt="Campaign Image" class="rounded" style="width: 50px; height: 50px; object-fit: cover; flex-shrink: 0;">
                    <div style="font-size: 14px; line-height: 1.5;">
                        <div class="mb-1">
                            Kamu berhasil berdonasi pada Kategori Donasi yang berjudul <strong>Ayah Asep Berpulang</strong> sebesar <strong>Rp. 1.000</strong>.
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded mb-3 p-3" style="max-width: 500px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-emoji-smile-fill"></i> Donasi
                    </div>
                    <div class="text-muted" style="font-size: 14px;">2 bulan yang lalu</div>
                </div>
                <div class="d-flex align-items-start" style="gap: 1rem;">
                    <img src="{{ asset('template/assets/img/Foto Team/Putra.png') }}" alt="Campaign Image" class="rounded" style="width: 50px; height: 50px; object-fit: cover; flex-shrink: 0;">
                    <div style="font-size: 14px; line-height: 1.5;">
                        <div class="mb-1">
                            Kamu berhasil berdonasi pada Kategori Donasi yang berjudul <strong>Ayah Asep Berpulang</strong> sebesar <strong>Rp. 1.000</strong>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection