@extends('app_user')

@section('content')
<div class="container py-5" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 pe-4">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Pengaturan</h4>
            <div class="list-group">
                <a href="{{ route('user.profil.index') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-primary fw-bold" style="padding-left: 0;">
                    Profil Publik
                </a>
                <a href="{{ route('user.profil.notifikasi') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
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
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Profil Saya</h4>
            {{-- Foto Profil dan Upload --}}
            <div class="d-flex align-items-center mb-4">
                <img id="preview-foto" 
                    src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('template/assets/img/default.png') }}" 
                    alt="Foto Profil" 
                    class="rounded-circle" width="150" height="150" 
                    style="object-fit: cover; margin-right: 20px;">
                <div class="ms-8 d-flex flex-column" style="gap: 5px;">
                    <label for="file-upload" class="genric-btn info" style="border-radius: 10px; cursor: pointer;">Ganti Foto</label>
                    <input id="file-upload" type="file" name="foto_profil" form="form-profile" accept="image/*" style="display: none;" onchange="previewFoto(event)">
                    <button type="button" class="genric-btn danger" style="border-radius: 10px;">Hapus Foto</button>
                </div>
            </div>

            {{-- Form Profil --}}
            <form id="form-profile" action="{{ route('user.profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="namaLengkap" class="form-label" style="font-size: 12px;">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="namaLengkap"
                        value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}"
                        style="height: 40px; font-size: 14px; padding: 10px 14px;">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label" style="font-size: 12px;">Email</label>
                    <input type="email" name="email" class="form-control" id="email"
                        value="{{ old('email', Auth::user()->email) }}" readonly
                        style="height: 40px; font-size: 14px; padding: 10px 14px;">
                </div>

                <div class="mb-4">
                    <label for="nomorWhatsapp" class="form-label" style="font-size: 12px;">Nomor WhatsApp</label>
                    <input type="tel" name="no_whatsapp" class="form-control" id="nomorWhatsapp"
                        value="{{ old('no_whatsapp', Auth::user()->no_whatsapp) }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        style="height: 40px; font-size: 14px; padding: 10px 14px;">
                </div>

                <button type="submit" class="genric-btn info d-flex align-items-center" style="border-radius: 10px; font-size: 14px; padding: 3px 18px;">
                    <i class="fa fa-save me-10" style="margin-right: 8px;"></i> Simpan Perubahan
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

<script>
    function previewFoto(event) {
        const input = event.target;
        const preview = document.getElementById('preview-foto');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    // Fungsi untuk hapus foto
    document.querySelector('.genric-btn.danger').addEventListener('click', function () {
        Swal.fire({
            title: 'Hapus Foto Profil?',
            text: 'Foto profil kamu akan dihapus dan diganti dengan default.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ route('user.profil.hapus-foto') }}", {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('preview-foto').src = '{{ asset('template/assets/img/default.png') }}';
                        Swal.fire('Berhasil!', 'Foto profil berhasil dihapus.', 'success');
                    } else {
                        Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus foto.', 'error');
                    }
                })
                .catch(() => {
                    Swal.fire('Error', 'Gagal menghubungi server.', 'error');
                });
            }
        });
    });
</script>

@endsection
