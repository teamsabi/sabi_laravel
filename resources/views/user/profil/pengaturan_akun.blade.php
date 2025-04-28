@extends('app_user')
@section('content')

<div class="container py-5" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="row">
        <!-- Kiri -->
        <div class="col-md-3 pe-4">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Pengaturan</h4>
            <div class="list-group">
                <a href="{{ route('user.profil.index') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">
                    Profil Publik
                </a>
                <a href="#" class="list-group-item list-group-item-action border-0 bg-transparent text-primary fw-bold" style="padding-left: 0;">
                    Pengaturan Akun
                </a>
            </div>
        </div>    

        <!-- Kanan -->
        <div class="col-md-9 ps-4" style="border-left: 1px solid #d1d5db;">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Pengaturan Akun</h4>
            <!-- Email -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <small class="text-muted" style="font-size: 14px; font-weight: bold;">Email</small><br>
                    <span style="font-size: 16px;">Akun email anda <strong>{{ Auth::user()->email }}</strong></span>
                </div>
                <a href="#" id="gantiEmailBtn" class="text-primary" style="font-size: 14px; font-weight: 600;">Ganti Email</a>
            </div>

            <!-- Form Ganti Email -->
            <form id="formGantiEmail" method="POST" action="{{ route('update.email') }}">
                @csrf
                <div id="inputEmailBaru" style="display: none;" class="mt-3 mb-4">
                    <label for="emailBaru" class="form-label" style="font-size: 13px;">Email baru</label>

                    <!-- Menampilkan pesan error di atas input email -->
                    @error('emailBaru')
                        <div class="text-danger mb-2">{{ $message }}</div>
                    @enderror
                    
                    <input type="email" id="emailBaru" name="emailBaru" class="form-control" placeholder="Masukkan email baru" style="height: 40px; font-size: 14px;" value="{{ old('emailBaru') }}">

                    <button type="button" id="btnGantiEmail" class="btn btn-primary mt-3 d-flex align-items-center" style="border-radius: 6px; font-size: 14px; padding: 12px 20px;">
                        <i class="fa fa-save" style="margin-right: 6px;"></i> Ganti
                    </button>
                </div>
            </form>

            <hr>

            <!-- Kata Sandi -->
            <form>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 14px; font-weight: bold;">Kata Sandi</label>
                    <p class="text-muted mb-2" style="font-size: 12px;">*Masukkan Kata Sandi anda saat ini untuk membuat kata sandi baru</p>
                    <div class="row">
                        <!-- Kata sandi saat ini -->
                        <div class="col-md-6 mb-3">
                            <label for="currentPassword" class="form-label" style="font-size: 13px;">Kata sandi anda saat ini</label>
                            <div class="input-group">
                                <input type="password" id="currentPassword" class="form-control" placeholder="Masukkan kata sandi lama" style="height: 40px; font-size: 14px;">
                                <span class="input-group-text" onclick="togglePassword('currentPassword')" style="cursor: pointer;">
                                    <i class="fa fa-eye" id="iconCurrentPassword" style="font-size: 15px;"></i>
                                </span>
                            </div>
                        </div>
            
                        <!-- Kata sandi baru -->
                        <div class="col-md-6 mb-3">
                            <label for="newPassword" class="form-label" style="font-size: 13px;">Kata sandi baru</label>
                            <div class="input-group">
                                <input type="password" id="newPassword" class="form-control" placeholder="Masukkan kata sandi baru" style="height: 40px; font-size: 14px;">
                                <span class="input-group-text" onclick="togglePassword('newPassword')" style="cursor: pointer;">
                                    <i class="fa fa-eye" id="iconNewPassword" style="font-size: 15px;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="me-2" style="font-size: 14px;">Lupa kata sandi lama?
                        <a href="#" class="text-primary" style="font-size: 14px;">Atur ulang kata sandi</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 d-flex align-items-center" style="border-radius: 6px; font-size: 14px; padding: 12px 20px;">
                    <i class="fa fa-save" style="margin-right: 6px;"></i> Simpan Perubahan
                </button>
            </form>

            <hr class="my-4">

            <!-- Hapus Akun -->
            <div class="mb-3">
                <label class="form-label" style="font-size: 14px; font-weight: bold;">Hapus Akun</label>
                <p class="mb-1" style="font-size: 14px;">Apakah anda yakin ingin menghapus akun?</p>
                <p class="text-muted mb-2" style="font-size: 12px;">Jika anda menghapus akun, akun anda akan dihapus di data kami dan anda perlu registrasi kembali!!</p>
                <a href="#" class="text-danger" style="font-size: 14px;`">Saya ingin menghapus akun</a>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        const icon = document.getElementById('icon' + id.charAt(0).toUpperCase() + id.slice(1));
        
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

    // Fungsi untuk mengganti email
    document.getElementById('gantiEmailBtn').addEventListener('click', function(event) {
        event.preventDefault();
        const inputEmail = document.getElementById('inputEmailBaru');
        inputEmail.style.display = inputEmail.style.display === 'none' ? 'block' : 'none';
    });

    document.getElementById('btnGantiEmail').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan mengganti akun email ini dengan yang baru",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, ganti email!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Sedang memproses...',
                    text: 'Akun email anda sedang dibuild kembali menjadi email yang baru. Silahkan cek di gmail akun anda yang baru untuk verifikasi email.',
                    icon: 'info'
                }).then(() => {
                    document.getElementById('formGantiEmail').submit();
                });
            }
        });
    });
</script>

@endsection
