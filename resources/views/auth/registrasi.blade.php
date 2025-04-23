<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registrasi - JTICare</title>

    <!-- Icon Di atas -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/assets/img/Favicon.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Lottie Player -->
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

    <style>
        body {
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .register-card {
            width: 100%;
            max-width: 900px;
            display: flex;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left-section, .right-section {
            flex: 1;
            padding: 40px;
            position: relative;
        }

        .left-section {
            background-color: #f9f9ff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-section .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .left-section img {
            width: 100px;
        }

        .right-section h2 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #4A90E2;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
        }

        .login-link a {
            color: #4A90E2;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .register-card {
                flex-direction: column;
            }

            .left-section {
                padding: 30px 20px;
            }

            .right-section {
                padding: 30px 20px;
            }

            .left-section .logo {
                top: 10px;
                left: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="register-card">
        <div class="left-section text-center">
        <div class="logo">
            <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="logo" style="width: 150px; height: auto;"/>
        </div>
        <dotlottie-player 
            src="https://lottie.host/b4b6185d-9744-46a8-877a-3330d0e8b503/Me7dSX3vFn.lottie" 
            background="transparent" 
            speed="1" 
            style="width: 300px; height: 300px;" 
            loop autoplay>
        </dotlottie-player>
    </div>
    <div class="right-section">
        <h2>Registrasi</h2>
        <p>Silakan isi data berikut untuk membuat akun JTICare.</p>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 7px 11px; border-radius: 6px; font-size: 12px; margin-bottom: 11px; width: fit-content; max-width: 100%;">
                @foreach ($errors->all() as $item)
                    <div style="margin-bottom: 2px;">{{ $item }}</div>
                @endforeach
            </div>
        @endif

        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissable fade show">
                <ul>
                    <li>{{ Session::get('success') }}</li>
                </ul>
            </div>
        @endif

        <form id="registerForm" action="{{ route('auth.registrasi') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                <input class="form-control" id="namaLengkap" name="nama_lengkap" type="text" placeholder="Masukkan Nama Lengkap Anda" value="{{ old('nama_lengkap') }}"/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}"/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="nomorWA">Nomor WhatsApp</label>
                <input class="form-control" id="nomorWA" name="no_whatsapp" type="tel" placeholder="Masukkan Nomor WhatsApp Anda" value="{{ old('no_whatsapp') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
            </div>            
            <div class="mb-3 text-start">
            <label class="form-label" for="password">Kata Sandi</label>
                <div class="position-relative">
                    <input class="form-control pe-5" id="password" name="password" type="password" placeholder="Masukkan Kata Sandi" value="{{ old('password') }}"/>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('password', 'eyeIcon1')" style="cursor: pointer;">
                        <i class="fas fa-eye" id="eyeIcon1"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3 text-start">
            <label class="form-label" for="rePassword">Konfirmasi Kata Sandi</label>
                <div class="position-relative">
                        <input class="form-control pe-5" id="rePassword" name="confirm" type="password" placeholder="Masukkan Ulang Kata Sandi"/>
                        <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('rePassword', 'eyeIcon2')" style="cursor: pointer;">
                            <i class="fas fa-eye" id="eyeIcon2"></i>
                    </span>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Daftar</button>
        </form>
        <div class="login-link">Sudah punya akun? 
            <a href="{{ route('auth.login') }}">Masuk</a>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, iconId) {
        let input = document.getElementById(inputId);
        let icon = document.getElementById(iconId);
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

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Apakah Anda yakin data sudah benar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Daftar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        });
    });
</script>
</body>
</html>
