<!doctype html>
<html lang="en">

  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="/https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">    
    <div class="site-wrap" id="home-section">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-3 ">
              <div class="site-logo">
                <a href="/" class="font-weight-bold">
                  <img src="/images/logo.png" alt="Image" class="img-fluid">
                </a>
              </div>
            </div>

          <div class="col-9  text-right">
            <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                  <li><a href="{{ url('/')}}" class="nav-link">Articles</a></li>                  

                @if (Sentinel::check())
                  <li><b><a>Welcome {!! Sentinel::getUser()->first_name !!}</a></b></li>
                  <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                  <li><a href="{{ route('login') }}">Login</a></li>               
                @endif
                  <li><a href="{{ url('/signup')}}" class="nav-link">Signup</a></li>
                  
                  <li>
                      <form class="form-inline">
                        <div class="form-group">
                          <input class="search-text form-control" type="text" name="search" placeholder="Search" />
                        </div>
                      </form>
                  </li>
                </ul>
              </nav>
            </div>       
          </div>
        </div>
      </header>


@yield('container')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/main.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.slim.js"
    integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
    crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>
