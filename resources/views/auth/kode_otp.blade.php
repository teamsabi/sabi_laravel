<html>
<head>
    <title>Lupa Password - JTICare</title>
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
        .lupaPw-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        .lupaPw-container h2 {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.4rem;
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
        .otp-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border: 2px solid #d3d3d3;
            border-radius: 5px;
            outline: none;
        }
        .otp-input:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }
        .forgot-password {
            text-align: right;
            display: block;
            margin-bottom: 15px;
            font-size: 1rem;
        }
        .resend-link {
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 1rem;
        }
        .resend-link a {
            color: #4A90E2;
            text-decoration: none;
        }
        .resend-link a:hover {
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
            .lupaPw-container {
                padding: 20px;
                width: 90%;
            }
            .lupaPw-container h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="lupaPw-container">
        <h2 style="text-align: left;">Kode OTP</h2>
        <p style="text-align: left;  color: gray;">Masukan 5 digit kode OTP yang sudah kami kirim ke email anda!</p>

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

        <form action="#" method="POST">
            @csrf
            <div class="otp-container">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 1)" onkeydown="moveToPrev(event, this, 0)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 2)" onkeydown="moveToPrev(event, this, 1)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 3)" onkeydown="moveToPrev(event, this, 2)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 4)" onkeydown="moveToPrev(event, this, 3)">
                <input type="text" class="otp-input" maxlength="1" oninput="moveToNext(this, 5)" onkeydown="moveToPrev(event, this, 4)">
            </div>
            <div class="resend-link">Belum menerima kode OTP?
                <a href="#">Kirim Ulang</a>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('auth.login') }}" class="btn btn-primary" type="button" style="background-color: rgb(173, 173, 173); border: none;">Kembali</a>
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </form>
        <div class="logo">
            <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="logo"/>
        </div>
    </div>
    
    <script>
        function moveToNext(current, nextIndex) {
            current.value = current.value.replace(/[^0-9]/g, ''); // Hanya angka
            if (current.value && nextIndex < 5) {
                document.getElementsByClassName('otp-input')[nextIndex].focus();
            }
        }
    
        function moveToPrev(event, current, prevIndex) {
            if (event.key === "Backspace" && !current.value && prevIndex >= 0) {
                document.getElementsByClassName('otp-input')[prevIndex].focus();
            }
        }
    </script>

</body>
</html>
