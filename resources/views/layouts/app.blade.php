<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Kenny Dorvilus') }}</title>

    <link rel="icon" type="image/icon" href="{{ asset('/img/logo2.png') }}">

    <link rel="icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/icon type">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

 <div id="app">
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <router-link class="logo"  class-active="active" :to="{ name: 'index'}"><img src="assets/img/logo/logo.png" alt="logo" class="img-fluid"></router-link>

      <nav id="navbar" class="navbar">
        <ul>
        <li><router-link class="nav-link scrollto" class-active="active" :to="{ name: 'index'}"> Home </router-link></li>
        <li><router-link class="nav-link scrollto" class-active="active" :to="{ name: 'about'}"> A propos </router-link></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><router-link class="nav-link scrollto" class-active="active" :to="{ name: 'contact'}"> Contact </router-link></li>
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
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
  </footer><!-- End Footer -->

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>