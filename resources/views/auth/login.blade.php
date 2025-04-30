<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - JTICare</title>

    <!-- Icon Di atas -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/assets/img/Favicon.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

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
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
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
            kground-color: #357ABD;
        }

        .forgot-password {
            text-align: right;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .login-card {
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
    <div class="login-card">
        <div class="left-section text-center">
            <div class="logo">
                <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="logo" width="150" />
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
            <h2>Login</h2>
            <p>Silahkan login menggunakan Email anda yang sudah terverifikasi.</p>

            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 7px 11px; border-radius: 6px; font-size: 12px; margin-bottom: 11px; width: fit-content; max-width: 100%;">
                    @foreach ($errors->all() as $item)
                        <div style="margin-bottom: 4px;">{{ $item }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}">
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <div class="position-relative">
                        <input type="password" class="form-control pe-5" id="password" name="password" placeholder="Masukkan Kata Sandi Anda">
                        <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword()" style="cursor: pointer;">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                    <div class="forgot-password">
                        <a href="{{ route('auth.lupa_password') }}">Lupa Kata Sandi?</a>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Masuk</button>
            </form>
            <div class="mt-3 text-center">Belum Punya Akun? 
                <a href="{{ route('auth.registrasi') }}">Daftar</a>
            </div>
        </div>
    </div>
</div>

    <script>
        function togglePassword() {
            let passwordInput = document.getElementById("password");
            let eyeIcon = document.getElementById("eyeIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('akun_dihapus'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('akun_dihapus') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Info',
            text: '{{ session('success') }}',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    </script>
@endif
</body>
</html>
