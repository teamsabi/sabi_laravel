<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
  <body>
    <div class="wrapper">

      @include('layouts.sidebar')

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">

            @include('layouts.logo-header')

          </div>

          @include('layouts.navbar-header')

        </div>

        <div class="container">
          <div class="page-inner">

            @yield('content')

          </div>
        </div>

        <footer class="footer">

          @include('layouts.footer')

        </footer>
      </div>
    </div>

   @include('layouts.script')

  </body>
</html>
