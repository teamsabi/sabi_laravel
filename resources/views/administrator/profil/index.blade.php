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

<!-- Modal Cropper -->
<div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4" style="width: 600px; height: 600px;">
            <div class="modal-header">
                <h5 class="modal-title" id="cropperModalLabel">Crop Foto Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <div style="width: 100%; height: 100%;">
                    <img id="cropperImage" style="max-width: 100%; max-height: 100%;" />
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnCrop">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    let cropper;
    const cropperModal = new bootstrap.Modal(document.getElementById('cropperModal'));

    document.getElementById('photo').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file && /^image\/\w+/.test(file.type)) {
            const reader = new FileReader();
            reader.onload = () => {
                const img = document.getElementById('cropperImage');
                img.src = reader.result;

                cropperModal.show();

                if (cropper) {
                    cropper.destroy();
                }

                cropper = new Cropper(img, {
                    aspectRatio: 1,
                    viewMode: 1,
                    autoCropArea: 1,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('btnCrop').addEventListener('click', () => {
        if (cropper) {
            cropper.getCroppedCanvas({
                width: 500,
                height: 500,
            }).toBlob(blob => {
                const fileInput = document.getElementById('photo');
                const file = new File([blob], "cropped.jpg", { type: "image/jpeg" });

                // Buat objek DataTransfer untuk set ulang input file
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;

                // Preview ke halaman
                const url = URL.createObjectURL(blob);
                document.getElementById('previewFotoProfil').src = url;

                cropperModal.hide();
            }, 'image/jpeg');
        }
    });
</script>

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
