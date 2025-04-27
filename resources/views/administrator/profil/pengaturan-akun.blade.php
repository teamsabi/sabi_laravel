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
                    <a href="#" id="gantiEmailBtn" class="text-primary text-decoration-none">Ganti Email</a>
                </div>
            </div>

            <hr>

            <!-- Form Ganti Email -->
            <form id="formGantiEmail" method="POST" action="{{ route('update.email') }}">
                @csrf
                <div id="inputEmailBaru" style="display: none;" class="mt-3 mb-4">
                    <label for="emailBaru" class="form-label">Email baru</label>

                    <!-- Menampilkan pesan error di atas input email -->
                    @error('emailBaru')
                        <div class="text-danger mb-2">{{ $message }}</div>
                    @enderror
                    
                    <input type="email" id="emailBaru" name="emailBaru" class="form-control mb-3" placeholder="Masukkan email baru" value="{{ old('emailBaru') }}">

                    <button type="button" id="btnGantiEmail" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Ganti
                    </button>
                </div>
            </form>

            <!-- Form Ganti Password -->
            <div class="mb-5">
                <label class="form-label fw-bold">Kata sandi</label>
                <p class="text-muted small">*Masukkan Kata Sandi anda saat ini untuk membuat kata sandi baru</p>

                <form id="formGantiPassword" method="POST" action="{{ route('update.password') }}">
                    @csrf
                    <div class="row">
                        <!-- Kata Sandi Saat Ini -->
                        <div class="col-md-6 mb-3">
                            <label for="currentPassword" class="form-label">Kata sandi anda saat ini</label>
                            <div class="input-group">
                                <input type="password" id="currentPassword" class="form-control" placeholder="Masukkan kata sandi lama" sname="currentPassword">
                                <span class="input-group-text bg-white">
                                    <button type="button" class="btn p-0 border-0 text-muted" onclick="togglePassword('currentPassword', this)">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </span>
                            </div>
                            @error('currentPassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kata Sandi Baru -->
                        <div class="col-md-6 mb-3">
                            <label for="newPassword" class="form-label">Kata sandi baru</label>
                            <div class="input-group">
                                <input type="password" id="newPassword" class="form-control" placeholder="Masukkan kata sandi baru" name="newPassword">
                                <span class="input-group-text bg-white">
                                    <button type="button" class="btn p-0 border-0 text-muted" onclick="togglePassword('newPassword', this)">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </span>
                            </div>
                            @error('newPassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-start align-items-center mb-3">
                        <div class="me-2">Lupa kata sandi lama?</div>
                        <a href="#" class="text-primary text-decoration-none">Atur ulang kata sandi</a>
                    </div>

                    <button type="submit" id="btnGantiPassword" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Simpan Perubahan
                    </button>
                </form>
            </div>

            <hr>

            <!-- Hapus Akun -->
            <div class="mb-1">
                <label class="form-label fw-bold">Hapus akun</label>
                <p class="mb-1">Apakah anda yakin ingin menghapus akun?</p>
                <p class="text-muted small mb-1">jika anda menghapus akun, akun anda akan di hapus di data kami dan anda perlu registrasi kembali!!</p>
                <a href="#" class="text-danger text-decoration-none">Saya ingin menghapus akun</a>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    // Fungsi untuk mengganti password
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
                        Swal.showLoading(); // Tampilkan loading
                    }
                });

                // Setelah SweetAlert selesai loading, kirim form
                document.getElementById('formGantiPassword').submit(); // Kirim form setelah SweetAlert selesai
            }
        });
    });

    // Menampilkan SweetAlert ketika password berhasil diperbarui
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
