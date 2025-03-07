<html>
<head>
    <title>Registrasi - JTICare</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            background-color: #4A90E2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 15px;
        }
        .registrasi-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .registrasi-container h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #4A90E2;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #357ABD;
        }
        .login-link a {
            color: #4A90E2;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .logo {
            margin-top: 20px;
        }
        .logo img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }
        .input-group-text {
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="registrasi-container">
        <h2>Registrasi</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>    
        @endif

        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissable fade show">
                <ul>
                    <li>{{ Session::get('success') }}</li>
                </ul>
            </div>    
        @endif

        <form action="{{ route('auth.registrasi') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                <input class="form-control" id="namaLengkap" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" type="text"/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" placeholder="Masukkan Email anda" name="email" type="email"/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="nomorWA">Nomor WhatsApp</label>
                <input class="form-control" id="nomorWA" placeholder="Masukkan Nomor WhatsApp" name="no_whatsapp" type="number"/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="password">Kata Sandi</label>
                <div class="position-relative">
                    <input class="form-control pe-5" id="password" placeholder="Masukkan Kata Sandi" name="password" type="password"/>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword('password', 'eyeIcon1')">
                        <i class="fas fa-eye" id="eyeIcon1"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="rePassword">Konfirmasi Kata Sandi</label>
                <div class="position-relative">
                    <input class="form-control pe-5" id="rePassword" placeholder="Masukkan Kata Sandi" name="confirm" type="password"/>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword('rePassword', 'eyeIcon2')">
                        <i class="fas fa-eye" id="eyeIcon2"></i>
                    </span>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Daftar</button>
        </form>
        
        <div class="register-link">Sudah Punya Akun?
            <a href="{{ route('auth.login') }}">Masuk</a>
        </div>
        <div class="logo">
            <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="logo"/>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            let passwordInput = document.getElementById(inputId);
            let eyeIcon = document.getElementById(iconId);
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
