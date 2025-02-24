<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>TICare - Admin</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="{{ asset('administrator/img/kaiadmin/favicon.ico')}}" type="image/x-icon"/>
    <script src="{{ asset('administrator/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('administrator/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <link rel="stylesheet" href="{{ asset('administrator/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('administrator/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('administrator/css/kaiadmin.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('administrator/css/demo.css')}}" />
  </head>
  <body>
    <div class="wrapper">

        @include('administrator.layouts.sidebar')

        <div class="main-panel">
          <div class="main-header">
            <div class="main-header-logo">

          @include('administrator.layouts.navbar')

            <div class="container">

                @yield('content')
                
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                      <nav class="pull-left">
                        <ul class="nav">
                        </ul>
                      </nav>
                      <div class="copyright">
                        2025, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="#">Super</a>
                      </div>
                    </div>
                  </footer>
                </div>
              </div>
            <script src="{{ asset('administrator/js/core/jquery-3.7.1.min.js')}}"></script>
            <script src="{{ asset('administrator/js/core/popper.min.js')}}"></script>
            <script src="{{ asset('administrator/js/core/bootstrap.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/chart.js/chart.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/chart-circle/circles.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/datatables/datatables.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/jsvectormap/world.js')}}"></script>
            <script src="{{ asset('administrator/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
            <script src="{{ asset('administrator/js/kaiadmin.min.js')}}"></script>
            <script src="{{ asset('administrator/js/setting-demo.js')}}"></script>
            <script src="{{ asset('administrator/js/demo.js')}}"></script>
            <script>
              var myBarChart = new Chart(barChart, {
                type: "bar",
                data: {
                  labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                  ],
                  datasets: [
                    {
                      label: "Sales",
                      backgroundColor: "rgb(23, 125, 255)",
                      borderColor: "rgb(23, 125, 255)",
                      data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
                    },
                  ],
                },
                options: {
                  responsive: true,
                  maintainAspectRatio: false,
                  scales: {
                    yAxes: [
                      {
                        ticks: {
                          beginAtZero: true,
                        },
                      },
                    ],
                  },
                },
              });

              $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
                type: "line",
                height: "70",
                width: "100%",
                lineWidth: "2",
                lineColor: "#177dff",
                fillColor: "rgba(23, 125, 255, 0.14)",
              });

              $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
                type: "line",
                height: "70",
                width: "100%",
                lineWidth: "2",
                lineColor: "#f3545d",
                fillColor: "rgba(243, 84, 93, .14)",
              });

              $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
                type: "line",
                height: "70",
                width: "100%",
                lineWidth: "2",
                lineColor: "#ffa534",
                fillColor: "rgba(255, 165, 52, .14)",
              });
            </script>
          </body>
        </html>
