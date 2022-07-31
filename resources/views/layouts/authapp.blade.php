<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Kenny Dorvilus') }} | Login </title>

  <link rel="icon" type="image/icon" href="{{ secure_asset('/img/logo2.png') }}">

  <link rel="icon" href="{{ secure_asset('assets/img/logo/logo.png') }}" type="image/icon type">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ secure_asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">
  <!-- Scripts -->
  <script src="{{ secure_asset('js/app.js') }}" defer></script>

  <style>
    .container {
      margin-top: 9%;
    }

    /* .center {
  margin: 0;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
} */
  </style>
</head>

<body>

  <div id="app" class="container">
    <div class="center">
      @yield('content')
    </div>
  </div>


  <!-- Vendor JS Files -->
  <script src="{{ secure_asset('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ secure_asset('assets/js/main.js') }}"></script>
</body>

</html>