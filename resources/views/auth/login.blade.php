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
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
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
        .forgot-password {
            text-align: right;
            display: block;
            margin-bottom: 15px;
        }
        .register-link {
            margin-top: 15px;
        }
        .register-link a {
            color: #4A90E2;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .logo {
            margin-top: 20px;
        }
        .logo img {
            width: 150px; /* Ukuran diperbesar */
            height: auto; /* Menjaga rasio agar tidak blur */
        }
        .input-group-text {
            cursor: pointer;
            font-size: 14px; /* Ukuran icon diperkecil */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form>
            <div class="mb-3 text-start">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" placeholder="Masukkan Email anda" type="email"/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="password">Kata Sandi</label>
                <div class="position-relative">
                    <input class="form-control pe-5" id="password" placeholder="Masukkan Kata Sandi" type="password"/>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword()">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
                <a class="forgot-password" href="#">Lupa Kata Sandi ?</a>
            </div>
            <button class="btn btn-primary" type="submit">Masuk</button>
        </form>
        <div class="register-link">Belum Punya Akun?
            <a href="#">Daftar</a>
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
