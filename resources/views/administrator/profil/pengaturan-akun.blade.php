@extends('app')
@section('content')

<div class="container py-5">
    <div class="row">
        <!-- Kiri -->
        <div class="col-md-3 border-end pe-4">
            <h5 class="fw-bold mb-4">Pengaturan</h5>
            <ul class="nav flex-column text-sm">
                <li class="nav-item mb-2">
                    <a href="{{ route('profil.index') }}" class="nav-link text-dark p-0">Profil publik</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profil.pengaturan-akun') }}" class="nav-link active text-secondary p-0">Pengaturan akun</a>
                </li>
            </ul>
        </div>

        <!-- Kanan -->
        <div class="col-md-9">
            <h5 class="fw-bold mb-4">Pengaturan Akun</h5>
            <div class="mb-4">
                <label class="form-label fw-bold">Email</label>
                <div class="d-flex justify-content-between">
                    <div>
                        Akun email anda <strong>{{ old('email', Auth::user()->email) }}</strong>
                    </div>
                    <a href="#" class="text-primary text-decoration-none">Ganti</a>
                </div>
            </div>

            <hr>

            <!-- Kata Sandi -->
            <div class="mb-4">
                <label class="form-label fw-bold">Kata sandi</label>
                <p class="text-muted small">*Masukkan Kata Sandi anda saat ini untuk membuat kata sandi baru</p>

                <div class="row">
                    <!-- Kata Sandi Baru -->
                    <div class="col-md-6 mb-3">
                        <label for="newPassword" class="form-label">Kata sandi baru</label>
                        <div class="input-group">
                            <input type="password" id="newPassword" class="form-control">
                            <span class="input-group-text bg-white">
                                <button type="button" class="btn p-0 border-0 text-muted" onclick="togglePassword('newPassword', this)">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="currentPassword" class="form-label">Kata sandi saat ini</label>
                        <div class="input-group">
                            <input type="password" id="currentPassword" class="form-control">
                            <span class="input-group-text bg-white">
                                <button type="button" class="btn p-0 border-0 text-muted" onclick="togglePassword('currentPassword', this)">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>                
                <div class="d-flex justify-content-start align-items-center mb-3">
                    <div class="me-2">Lupa kata sandi lama?</div>
                    <a href="#" class="text-primary text-decoration-none">Atur ulang kata sandi</a>
                </div>                
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan Perubahan
                </button>
            <hr>

            <!-- Hapus Akun -->
            <div class="mb-3">
                <label class="form-label fw-bold">Hapus akun</label>
                <p>Apakah anda yakin ingin menghapus akun?</p>
                <a href="#" class="text-danger text-decoration-none">Saya ingin menghapus akun</a>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

@endsection
