<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('JTICare- Wujudkan kepedulian melalui donasi!')</title>
    <link rel="stylesheet" href="{{ asset('template user/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    @include('layouts user.header')

    <main>
        @yield('content')
    </main>

    @include('layouts user.footer')

    <script src="{{ asset('template user/assets/js/script.js') }}"></script>
</body>
</html>
