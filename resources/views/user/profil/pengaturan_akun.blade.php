@extends('app_user')
@section('content')

<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 pe-4">
            <h4 class="mb-4" style="font-size: 20px; font-weight: bold;">Pengaturan</h4>
            <div class="list-group">
                <a href="{{ route('user.profil.index') }}" class="list-group-item list-group-item-action border-0 bg-transparent text-dark" style="padding-left: 0;">Profil Publik</a>
                <a href="#" class="list-group-item list-group-item-action border-0 bg-transparent text-primary fw-bold" style="padding-left: 0;">Pengaturan Akun</a>
            </div>
        </div>    

        <!-- Main Content -->
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
            <form id="formGantiEmail" method="POST" action="{{ route('user.update.email') }}">
                @csrf
                <div id="inputEmailBaru" style="display: none;" class="mt-3 mb-4">
                    <label for="emailBaru" class="form-label" style="font-size: 13px;">Email baru</label>
                    @error('emailBaru')
                        <div class="text-danger mb-2">{{ $message }}</div>
                    @enderror
                    <input type="email" id="emailBaru" name="emailBaru" class="form-control" placeholder="Masukkan email baru" style="height: 40px; font-size: 14px;" value="{{ old('emailBaru') }}">
                    <button type="button" id="btnGantiEmail" class="btn btn-primary mt-3 d-flex align-items-center" style="border-radius: 6px; font-size: 14px; padding: 12px 20px;">
                        <i class="fa fa-save me-2"></i> Ganti
                    </button>
                </div>
            </form>

            <hr>

            <!-- Form Ganti Password -->
            <form id="formGantiPassword" method="POST" action="{{ route('user.update.password') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" style="font-size: 14px; font-weight: bold;">Kata Sandi</label>
                    <p class="text-muted mb-2" style="font-size: 12px;">*Masukkan Kata Sandi anda saat ini untuk membuat kata sandi baru</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="currentPassword" class="form-label" style="font-size: 13px;">Kata sandi anda saat ini</label>
                            <div class="input-group">
                                <input type="password" id="currentPassword" class="form-control" placeholder="Masukkan kata sandi lama" name="currentPassword" style="height: 40px; font-size: 14px;">
                                <span class="input-group-text" onclick="togglePassword('currentPassword')" style="cursor: pointer;">
                                    <i class="fa fa-eye" id="iconCurrentPassword"></i>
                                </span>
                            </div>
                            @error('currentPassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="newPassword" class="form-label" style="font-size: 13px;">Kata sandi baru</label>
                            <div class="input-group">
                                <input type="password" id="newPassword" class="form-control" placeholder="Masukkan kata sandi baru" name="newPassword" style="height: 40px; font-size: 14px;">
                                <span class="input-group-text" onclick="togglePassword('newPassword')" style="cursor: pointer;">
                                    <i class="fa fa-eye" id="iconNewPassword"></i>
                                </span>
                            </div>
                            @error('newPassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="me-2" style="font-size: 14px;">Lupa kata sandi lama? <a href="#" class="text-primary" id="aturUlangPassword" style="font-size: 14px;">Atur ulang kata sandi</a></div>
                </div>
                <button type="submit" id="btnGantiPassword" class="btn btn-primary mt-3 d-flex align-items-center" style="border-radius: 6px; font-size: 14px; padding: 12px 20px;">
                    <i class="fa fa-save me-2"></i> Simpan Perubahan
                </button>
            </form>

            <hr class="my-4">

            <!-- Hapus Akun -->
            <div class="mb-3">
                <label class="form-label" style="font-size: 14px; font-weight: bold;">Hapus Akun</label>
                <p class="mb-1" style="font-size: 14px;">Apakah anda yakin ingin menghapus akun?</p>
                <p class="text-muted mb-2" style="font-size: 12px;">Jika anda menghapus akun, akun anda akan dihapus di data kami dan anda perlu registrasi kembali!!</p>
                <a href="#" id="btnHapusAkun" class="text-danger" style="font-size: 14px;">Hapus akun</a>
                <form id="formHapusAkun" action="{{ route('user.hapus-akun') }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
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
                    text: 'Silahkan cek email baru Anda untuk verifikasi.',
                    icon: 'info'
                }).then(() => {
                    document.getElementById('formGantiEmail').submit();
                });
            }
        });
    });

    document.getElementById('btnGantiPassword').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Password Anda akan diganti dengan password baru",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, ganti password!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Sedang memproses...',
                    text: 'Password anda sedang diperbarui.',
                    icon: 'info',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                document.getElementById('formGantiPassword').submit();
            }
        });
    });

    document.getElementById('btnHapusAkun').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus akun?',
            text: "Jika anda menghapus akun, akun anda akan dihapus secara permanen dan anda perlu registrasi kembali!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus akun!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Menghapus akun...',
                    text: 'Silahkan tunggu sebentar',
                    icon: 'info',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                setTimeout(() => {
                    document.getElementById('formHapusAkun').submit();
                }, 1500);
            }
        });
    });

    document.getElementById('aturUlangPassword').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan mengatur ulang kata sandi dan keluar dari akun.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, atur ulang!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ route('auth.logout') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(() => {
                    window.location.href = "{{ route('auth.lupa_password') }}";
                });
            }
        });
    });

    @if(session('success'))
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>

@endsection
