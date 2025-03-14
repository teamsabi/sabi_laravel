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
                    <form action="{{ isset($user) ? route('akun.update', $user->id) : route('akun.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($user))
                            @method('PUT')
                        @endif
                    
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
                                    <option value="Admin" {{ (isset($user) && $user->role == 'Admin') ? 'selected' : '' }}>Admin</option>
                                    <option value="User" {{ (isset($user) && $user->role == 'User') ? 'selected' : '' }}>User</option>
                                    <option value="" {{ empty($user->role) ? 'selected' : '' }}>Pilih Role</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" onclick="confirmUpdate()">
                                <i class="fa fa-save me-1"></i>
                                {{ isset($user) ? 'Simpan Perubahan' : 'Simpan' }}
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmUpdate() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin mengubah data?',
            text: "Perubahan ini akan disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('form').submit();
            }
        });
    }

    function confirmUpdate(event) {
    event.preventDefault(); // Hentikan submit form langsung
    Swal.fire({
        title: 'Apakah Anda yakin ingin menyimpan data?',
        text: "Perubahan ini akan disimpan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit(); // Submit form setelah konfirmasi
        }
    });
}
</script>

<script>
    // Fungsi untuk menampilkan preview foto setelah dipilih
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

@endsection
