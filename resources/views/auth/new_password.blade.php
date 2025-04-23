<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Kata Sandi Baru - JTICare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Icon Di atas -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/assets/img/Favicon.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

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

        .reset-card {
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
            background-color: #357ABD;
        }

        .custom-kembali {
            background-color: #adadad;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .custom-kembali:hover {
            background-color: #8c8c8c;
            color: white;
        }

        .position-relative .fa-eye {
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .reset-card {
                flex-direction: column;
            }

            .left-section, .right-section {
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
    <div class="reset-card">
        <div class="left-section text-center">
            <div class="logo">
                <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="logo" width="150" />
            </div>
            <dotlottie-player 
                src="https://lottie.host/d010b123-63d7-4eab-9300-2ebacc1ef4de/7lQCYVTTeX.lottie" 
                background="transparent" 
                speed="1" 
                style="width: 300px; height: 300px" 
                loop autoplay>
            </dotlottie-player>
        </div>
        <div class="right-section">
            <h2>Kata Sandi Baru</h2>
            <p>Masukkan kata sandi baru untuk mengganti yang lama</p>

            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 7px 11px; border-radius: 6px; font-size: 12px; margin-bottom: 11px; width: fit-content; max-width: 100%;">
                    @foreach ($errors->all() as $item)
                        <div style="margin-bottom: 4px;">{{ $item }}</div>
                    @endforeach
                </div>
            @endif

            @if (Session::get('success'))
                <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 7px 11px; border-radius: 6px; font-size: 12px; margin-bottom: 11px; width: fit-content; max-width: 100%;">
                    <div style="margin-bottom: 4px;">{{ Session::get('success') }}</div>
                </div>
            @endif

            <form action="{{ route('auth.lupa_password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3 text-start">
                    <label class="form-label" for="newPassword">Kata Sandi Baru</label>
                    <div class="position-relative">
                        <input class="form-control pe-5" id="newPassword" placeholder="Masukkan Kata Sandi Baru" name="password" type="password"/>
                        <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('newPassword', 'eyeIcon1')">
                            <i class="fas fa-eye" id="eyeIcon1"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label" for="repassword">Konfirmasi Kata Sandi</label>
                    <div class="position-relative">
                        <input class="form-control pe-5" id="repassword" placeholder="Konfirmasi Kata Sandi Baru" name="password_confirmation" type="password"/>
                        <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('repassword', 'eyeIcon2')">
                            <i class="fas fa-eye" id="eyeIcon2"></i>
                        </span>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Ubah Kata Sandi</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId, eyeIconId) {
            let passwordInput = document.getElementById(inputId);
            let eyeIcon = document.getElementById(eyeIconId);

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
</body>
</html>
