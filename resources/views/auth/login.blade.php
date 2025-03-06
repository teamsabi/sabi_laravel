<html>
<head>
    <title>Login - JTICare</title>
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
            padding: 20px;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        .login-container h2 {
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1.8rem;
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
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #357ABD;
        }
        .forgot-password {
            text-align: right;
            display: block;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        .register-link {
            margin-top: 15px;
            font-size: 0.9rem;
        }
        .register-link a {
            color: #4A90E2;
            text-decoration: none;
            font-weight: bold;
        }
        .register-link a:hover {
            text-decoration: underline;
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
            .login-container {
                padding: 20px;
                width: 90%;
            }
            .login-container h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        @extends('pesan.alert')

        <form action="{{ route('auth.login') }}" method="POST">
            <div class="mb-3 text-start">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" type="email"/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="password">Kata Sandi</label>
                <div class="position-relative">
                    <input class="form-control pe-5" id="password" placeholder="Masukkan Kata Sandi" name="password" value="{{ old('password') }}" type="password"/>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword()">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
                <a class="forgot-password" href="#">Lupa Kata Sandi ?</a>
            </div>
            <button class="btn btn-primary" type="submit">Masuk</button>
        </form>
        <div class="register-link">Belum Punya Akun?
            <a href="{{ route('auth.registrasi') }}">Daftar</a>
        </div>
        <div class="logo">
            <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="logo"/>
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
</body>
</html>
