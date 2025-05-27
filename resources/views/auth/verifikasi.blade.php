<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Verifikasi Email - JTICare</title>

    <!-- Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/assets/img/Favicon.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

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
            text-align: center;
            padding: 20px;
        }

        .verification-container {
            max-width: 600px;
            width: 100%;
        }

        .verification-text {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 30px;
            color: #333;
        }

        .lottie-animation {
            width: 300px;
            height: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="verification-text">
            Verifikasi email berhasil!<br>Silakan buka kembali aplikasi 
            <img src="{{ asset('template/assets/img/JTICare blue.png') }}" alt="JTICare" style="height: 50px; vertical-align: middle;">
        </div>
        <dotlottie-player 
            src="https://lottie.host/11fea6ea-fae8-44eb-b695-8a89f59717b8/CQlJsyh15X.lottie" 
            background="transparent" 
            speed="1" 
            class="lottie-animation"
            loop autoplay>
        </dotlottie-player>
    </div>
</body>
</html>
