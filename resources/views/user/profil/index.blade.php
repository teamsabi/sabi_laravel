@extends('app_user')
@section('content')

<div class="container py-5" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="row">
        <!-- Kiri -->
        <div class="col-md-3 pe-4">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Pengaturan</h4>
            <div class="list-group">
                <a href="{{ route('user.profil.index') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-primary fw-bold" style="padding-left: 0;">
                    Profil Publik
                </a>
                <a href="{{ route('user.profil.pengaturan-akun') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
                    Pengaturan Akun
                </a>
            </div>
        </div>    

        <!-- Kanan -->
        <div class="col-md-9 ps-4" style="border-left: 1px solid #d1d5db;">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Profil Saya</h4>
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('template/assets/img/Foto Team/Syaiful.png') }}" alt="Foto Profil" class="rounded-circle" width="150" height="150" style="object-fit: cover; margin-right: 20px;">
                <div class="ms-8 d-flex flex-column" style="gap: 5px;">
                    <label for="file-upload" class="genric-btn info" style="border-radius: 10px; cursor: pointer;">Ganti Foto</label>
                    <input id="file-upload" type="file" style="display: none;" onchange="handleFileChange(event)">
                    <button class="genric-btn danger" style="border-radius: 10px;">Hapus Foto</button>
                </div>
            </div>
            <!-- Form -->
            <form>
                <div class="mb-3">
                    <label for="namaLengkap" class="form-label" style="font-size: 12px;">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}" style="height: 40px; font-size: 14px; padding: 10px 14px;">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label" style="font-size: 12px;">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ old('email', Auth::user()->email) }}" readonly style="height: 40px; font-size: 14px; padding: 10px 14px;">
                </div>

                <div class="mb-4">
                    <label for="nomorWhatsapp" class="form-label" style="font-size: 12px;">Nomor WhatsApp</label>
                    <input type="tel" class="form-control" id="nomorWhatsapp" value="{{ old('no_whatsapp', Auth::user()->no_whatsapp) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" style="height: 40px; font-size: 14px; padding: 10px 14px;">
                </div>
                <button type="submit" class="genric-btn info d-flex align-items-center" style="border-radius: 10px; font-size: 14px; padding: 3px 18px;">
                    <i class="fa fa-save me-10" style="margin-right: 8px;"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
