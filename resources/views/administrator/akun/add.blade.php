@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tambah Akun</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form id="formAkun" action="{{ route('akun.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama_lengkap" value="{{ $user->nama_lengkap ?? '' }}" placeholder="Masukkan Nama Lengkap" required />
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email ?? '' }}" placeholder="Masukkan Email" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="no_whatsapp" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('no_whatsapp') is-invalid @enderror" id="no_whatsapp" name="no_whatsapp" value="{{ $user->no_whatsapp ?? '' }}" placeholder="Masukkan Nomor WhatsApp" required />
                                @error('no_whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="foto_profil" class="col-sm-2 col-form-label">Foto Profil</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil" accept="image/*" />
                                
                                <!-- Preview Foto -->
                                <img id="imgPreview" 
                                    src="{{ isset($user->foto_profil) ? asset('storage/' . $user->foto_profil) : '' }}" 
                                    alt="Preview Foto" 
                                    width="100" 
                                    class="mt-2 rounded-circle" 
                                    style="{{ isset($user->foto_profil) ? '' : 'display: none;' }}" />
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Kata Sandi</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi (Opsional)" />
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="role" name="role" required>
                                    <option disabled {{ !isset($user) ? 'selected' : '' }}>Pilih Role</option>
                                    <option value="admin" {{ (isset($user) && $user->role == 'admin') ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ (isset($user) && $user->role == 'user') ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="text-end">
                            <button type="button" class="btn btn-primary" id="btnSubmit">
                                <i class="fa fa-save me-1"></i>
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('akun.index') }}" class="btn btn-danger">
                                <i class="fa fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cropper -->
<div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 800px;">
      <div class="modal-content" style="width: 400px; height: 400px; margin: auto;">
        <div class="modal-header">
          <h5 class="modal-title" id="cropperModalLabel">Crop Foto Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body p-0">
          <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
            <img id="imageCropper" style="max-width: 100%; max-height: 100%;" />
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="cropButton">Crop & Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let cropper;
    const fotoInput = document.getElementById('foto_profil');
    const imgPreview = document.getElementById('imgPreview');
    const imageCropper = document.getElementById('imageCropper');

    fotoInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imageCropper.src = e.target.result;

                // Tampilkan modal setelah gambar di-load
                const modal = new bootstrap.Modal(document.getElementById('cropperModal'));
                modal.show();

                // Tunggu gambar render
                imageCropper.onload = function () {
                    // Hapus cropper sebelumnya jika ada
                    if (cropper) {
                        cropper.destroy();
                    }

                    cropper = new Cropper(imageCropper, {
                        aspectRatio: 1,
                        viewMode: 1,
                        minCropBoxWidth: 500,
                        minCropBoxHeight: 500
                    });
                };
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('cropButton').addEventListener('click', function () {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 500,
                height: 500
            });

            // Tampilkan hasil preview
            canvas.toBlob(function (blob) {
                const url = URL.createObjectURL(blob);
                imgPreview.src = url;
                imgPreview.style.display = 'block';

                // Ganti input file dengan blob hasil crop
                const fileInput = document.getElementById('foto_profil');
                const dataTransfer = new DataTransfer();
                const fileName = "cropped_" + Date.now() + ".png";
                const croppedFile = new File([blob], fileName, { type: 'image/png' });
                dataTransfer.items.add(croppedFile);
                fileInput.files = dataTransfer.files;

                // Tutup modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('cropperModal'));
                modal.hide();
            });
        }
    });
</script>


<script>
    document.getElementById('foto_profil').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgPreview = document.getElementById('imgPreview');
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ $errors->first() }}',
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

<script>
    document.getElementById('btnSubmit').addEventListener('click', function(event) {
        let isEdit = @json(isset($user));
        let confirmText = isEdit 
            ? 'Apakah Anda yakin ingin merubah data ini?' 
            : 'Apakah Anda yakin ingin menyimpan data ini?';

        Swal.fire({
            title: 'Konfirmasi',
            text: confirmText,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formAkun').submit(); // Gunakan ID form yang spesifik
            }
        });
    });
</script>

@endsection
