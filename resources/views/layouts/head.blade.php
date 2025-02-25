<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>JTICare - Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
<link rel="icon" href="{{ asset('template/assets/img/Favicon.png') }}" type="image/x-icon" />
<script src="{{ asset('template/assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
  WebFont.load({
    google: { families: ['Public Sans:300,400,500,600,700'] },
    custom: {
      families: [
        'Font Awesome 5 Solid',
        'Font Awesome 5 Regular',
        'Font Awesome 5 Brands',
        'simple-line-icons'
      ],
      urls: ['{{ asset("template/assets/css/fonts.min.css") }}']
    },
    active: function() {
      sessionStorage.fonts = true;
    }
  });
</script>
<link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/assets/css/plugins.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/assets/css/kaiadmin.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/assets/css/demo.css') }}" />
