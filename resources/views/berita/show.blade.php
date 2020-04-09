<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>SATGAS SIAGA COVID-19</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
        
    <!--====== Animate CSS ======-->
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        a:hover {
            text-decoration: none
        }
    </style>

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css') }}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style CSS ======-->
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->    
   
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area "  style="background-image: url({{ asset('assets/images/banner-bg.svg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll font-weight-bold text-dark" style="font-family: 'Poppins', sans-serif;" href="{{ route('frontend.home.landing') }}">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll font-weight-bold text-dark" style="font-family: 'Poppins', sans-serif;" href="{{ route('frontend.berita.index') }}">BERITA COVID-19</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
    </header>
    <!--====== HEADER PART ENDS ======-->

    <section id="blog" class="blog-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-title pb-35">
                        <div class="line"></div>
                        <h3 class="title"><span>{{ $berita->title }}</span></h3>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-8">
                    <div class="content">
                        <div class="blog-image">
                            <img src="{{ asset('content/uploads/' . $berita->image) }}" alt="{{ $berita->title }}" class="img img-thumbnail" style="height: auto;margin: 0 auto;display: block">
                        </div><br>
                        {!! $berita->content !!}
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
    
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe-content mt-45">
                            <h2 class="subscribe-title">Ikuti Terus Perkembangan Covid-19 di<span>covid19.tulungagung.go.id</span></h2>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- subscribe area -->
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="logo" href="#">
                                <img src="assets/images/logo.png" alt="logo">
                            </a>
                            <p class="text">&#169; 2020 - Dinas Kominfo Kabupaten Tulungagung</p>
                            <ul class="social">
                                <li><a href="https://www.instagram.com/kominfo_tulungagung/"><i class="lni-instagram-filled"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
            </div> <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">Dibuat dengan sepenuh <i class="fas fa-heart text-danger"></i> oleh para relawan; <a href="https://instagram.com/alfanjauhari_">Alfan Jauhari</a>, <a href="https://instagram.com/surya_maulana70">Muhammad Surya</a> & <a href="https://instagram.com/defrindr">Defri Indra M.</a></p>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2"></div>
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->   
    
    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr-3.7.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <script src="{{ asset('assets/js/ajax-contact.js') }}"></script>

    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>

    <script src="{{ asset('assets/js/wow.min.js') }}"></script>

    <script src="{{ asset('assets/js/particles.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</html>
