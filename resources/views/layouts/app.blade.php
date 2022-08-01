<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Kenny Dorvilus') }}</title>

  <!-- <link rel="icon" type="image/icon" href="{{ secure_asset('img/logo2.png') }}"> -->

  <link rel="icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/icon type">

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
  <!-- <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> -->

  <!-- Main CSS File -->
  <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> -->
  <!-- Scripts -->
  <!-- <script src="{{ secure_asset('js/app.js') }}" defer></script> -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

  <div id="app">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-between">
        <!-- <router-link class="logo" class-active="active" :to="{ name: 'index'}"><img src="{{ secure_asset('assets/img/logo/logo.png') }}" alt="logo" class="img-fluid"></router-link> -->
        <router-link class="logo" class-active="active" :to="{ name: 'index'}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="logo" class="img-fluid"></router-link>

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <router-link class="nav-link scrollto" class-active="active" :to="{ name: 'index'}"> Accueil </router-link>
            </li>
            <li>
              <router-link class="nav-link scrollto" class-active="active" :to="{ name: 'books'}"> Livres </router-link>
            </li>
            <li>
              <router-link class="nav-link scrollto" class-active="active" :to="{ name: 'dkfondation'}"> DK fondation </router-link>
            </li>
            <li>
              <router-link class="nav-link scrollto" class-active="active" :to="{ name: 'about'}"> A propos </router-link>
            </li>
            <li>
              <router-link class="nav-link scrollto" class-active="active" :to="{ name: 'contact'}"> Contact </router-link>
            </li>
            <!-- Authentication Links -->
            @if (Auth::guest())
            <!-- <li><a href="{{ url('/login') }}">Login</a></li> -->
            <li><a class="scrollto text-right" href="{{ url('/login') }}" style="font-size: 10px; margin-left:70px; color:beige">Login</a></li>
            <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
            @endif
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

      </div>
    </header>
    <!-- End Header -->

    <div>
      @yield('content')
    </div>
  </div>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{ config('app.name', 'Kenny Dorvilus') }}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://instagram.com/TephGab" target="_blank">Teph Gab</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ secure_asset('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <!-- <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> -->

  <!-- Template Main JS File -->
  <script src="{{ secure_asset('assets/js/main.js') }}"></script>
  <!-- <script src="{{ asset('assets/js/main.js') }}"></script> -->
</body>

</html>