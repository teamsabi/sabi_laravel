<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts user.head')
    </head>
    <body>  
        <div class="wrapper">

            @include('layouts user.header')

            <div class="main-panel">
                <div class="main-header">
                    <div class="main-header-logo">
                        @include('layouts user.preloader')
                    </div>

                    @include('layouts user.script')
                </div>

                <div class="container">
                    <div class="page-inner">
                        @yield('content') 
                    </div>
                </div>

                <footer class="footer">
                    @include('layouts user.footer')
                </footer>
            </div>
        </div>

    </body>
</html>
