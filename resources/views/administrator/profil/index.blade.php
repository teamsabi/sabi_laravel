@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Profil Saya</h4>
                <h6 class="op-7 mb-2">Isilah data profil dengan benar!</h6>
            </div>
            <div class="card-body">
                {{-- Preview Foto Profil --}}
                <div class="text-center mb-3">
                    <img id="previewFotoProfil" src="{{ Auth::user()->foto_profil_url }}" 
                        alt="Foto Profil" 
                        class="img-thumbnail rounded-circle"
                        style="width: 180px; height: 180px; object-fit: cover; border-radius: 50%;">
                </div>
                
                {{-- Input Ganti Foto --}}
                <div class="text-center mb-3">
                    <label for="photo" class="text-primary" style="cursor: pointer; font-weight: bold; text-decoration: underline;">Ganti Foto</label>
                    <input type="file" name="foto_profil" id="photo" class="d-none" accept="image/*" form="updateProfileForm">
                </div>

                {{-- Form Update Profil --}}
                <form id="updateProfileForm" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Lengkap --}}
                    <div class="form-group mb-3">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" 
                               value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}" required>
                    </div>

                    {{-- Email --}}
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" 
                               value="{{ old('email', Auth::user()->email) }}" required>
                    </div>

                    {{-- No WhatsApp --}}
                    <div class="form-group mb-3">
                        <label for="no_whatsapp">No WhatsApp</label>
                        <input type="text" name="no_whatsapp" class="form-control" 
                               value="{{ old('no_whatsapp', Auth::user()->no_whatsapp) }}">
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Notifikasi SweetAlert --}}
@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
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

{{-- Preview Foto Saat Dipilih --}}
<script>
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewFotoProfil').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
