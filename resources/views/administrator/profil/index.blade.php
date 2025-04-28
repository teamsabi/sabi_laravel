@extends('app')
@section('content')

<div class="container py-5">
    <div class="row">
        <!-- Kiri -->
        <div class="col-md-3 border-end pe-4">
            <h5 class="fw-bold mb-4">Pengaturan</h5>
            <ul class="nav flex-column text-sm">
                <li class="nav-item mb-2">
                    <a href="{{ route('profil.index') }}" class="nav-link active text-secondary p-0">Profil Publik</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profil.pengaturan-akun') }}" class="nav-link text-dark p-0">Pengaturan Akun</a>
                </li>
            </ul>
        </div>

        <!-- Kanan -->
        <div class="col-md-9">
            <h5 class="fw-bold mb-4">Profil Saya</h5>
            <div class="d-flex align-items-center mb-4">
                <img id="previewFotoProfil" src="{{ Auth::user()->foto_profil_url }}" alt="Foto Profil"
                    class="rounded-circle border shadow-sm" style="width: 90px; height: 90px; object-fit: cover;">
                <div class="ms-4 d-flex flex-column">
                    <div class="ms-4 d-flex flex-column">
                        <label for="photo" class="btn btn-sm btn-primary mb-2" style="font-size: 12px; color: white !important;">Ganti Foto</label>
                        <input type="file" name="foto_profil" id="photo" class="d-none" accept="image/*" form="updateProfileForm">
                        <button class="btn btn-sm btn-danger" style="width: 100px; font-size: 12px;">Hapus Foto</button>
                    </div>                                                    
                </div>
            </div>
            <!-- Form -->
            <form id="updateProfileForm" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control"
                        value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control bg-light"
                        value="{{ old('email', Auth::user()->email) }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="no_whatsapp" class="form-label">Nomor WhatsApp</label>
                    <input type="text" name="no_whatsapp" class="form-control"
                        value="{{ old('no_whatsapp', Auth::user()->no_whatsapp) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

{{-- SweetAlert --}}
@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
        });
    });
</script>
@endif

{{-- Foto Preview --}}
<script>
    document.getElementById('photo').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewFotoProfil').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
