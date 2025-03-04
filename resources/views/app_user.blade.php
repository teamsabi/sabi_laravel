<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts user.head')
</head>
<body>

    @include('layouts user.header')

    <main>
        @yield('content')
    </main>

    @include('layouts user.footer')

    @include('layouts user.script')

</body>
</html>
