<html>
<head>
    <title>Kata Sandi Baru - JTICare</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #4A90E2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .new-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        .new-container h2 {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 1.4rem;
        }
        .form-control {
            margin-bottom: 2px;
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
        .forgot-password {
            text-align: right;
            display: block;
            margin-bottom: 15px;
            font-size: 1rem;
        }
        .logo {
            margin-top: 20px;
        }
        .logo img {
            width: 150px;
            height: auto;
        }
        .input-group-text {
            cursor: pointer;
            font-size: 16px;
        }

        @media (max-width: 576px) {
            .new-container {
                padding: 20px;
                width: 90%;
            }
            .new-container h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="new-container">
        <h2 style="text-align: left;">Kata Sandi Baru</h2>
        <p style="text-align: left;  color: gray;">Masukan Kata Sandi baru</p>

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

        <!-- Form untuk mengubah password -->
        <form action="{{ route('auth.lupa_password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3 text-start">
                <label class="form-label" for="newPassword">Kata Sandi Baru</label>
                <div class="position-relative">
                    <input class="form-control pe-5" id="newPassword" placeholder="Masukkan Kata Sandi Baru" name="password" type="password"/>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword('newPassword', 'eyeIcon1')">
                        <i class="fas fa-eye" id="eyeIcon1"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label" for="repassword">Konfirmasi Kata Sandi</label>
                <div class="position-relative">
                    <input class="form-control pe-5" id="repassword" placeholder="Konfirmasi Kata Sandi Baru" name="password_confirmation" type="password"/>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword('repassword', 'eyeIcon2')">
                        <i class="fas fa-eye" id="eyeIcon2"></i>
                    </span>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Ubah Kata Sandi</button>
        </form>

        <div class="logo">
            <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="logo"/>
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