<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>SATGAS SIAGA COVID-19</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" name="viewport">
    <title>SATGAS SIAGA COVID-19 TULUNGAGUNG</title>
    <meta name="description" content="Live Data & Statistik Penyebaran CoronaVirus (COVID-19) di Kabupaten Tulungagung">
    <meta name="author" content="Peduli Corona">

    <meta property="og:image" content="{{ asset('/assets/images/thumbnail.png') }}">
    <meta property="og:title" content="SATGAS SIAGA COVID-19 TULUNGAGUNG" />
    <meta property="og:description" content="Live Data & Statistik Penyebaran CoronaVirus (COVID-19) di Kabupaten Tulungagung" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://covid19.tulungagung.go.id/" />
    <link rel="canonical" href="https://covid19.tulungagung.go.id/">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

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
   

    <link rel="stylesheet" href="{{ asset('assets/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/qgis2web.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

    <!-- dependcies map js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <!-- end dependcies map js -->


</head>

<body>

    <!-- PRELOADER START -->
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
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#table">PETA COVID-19</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#cegah">PENCEGAHAN COVID-19</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">GEJALA COVID-19</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#berita">BERITA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">KONTAK</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->


                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover"
            style="background-image: url({{ asset('assets/images/banner-bg.svg') }})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                Call Center Siaga Covid-19</h3>
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">(0355)
                                320119 - PSC</br>(0355) 321924 - DINKES</br>(0355) 7625000 - DINKES</h2>
                            <!-- <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                            <a href="#" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">Get Started</a>
                            -->
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s"
                            data-wow-delay="1.4s">
                            <img src="{{ asset('assets/images/cs.png') }}" alt="hero">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->


    <!-- table -->
    <section id="table" class="pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Peta & Data Sebaran Covid-19</h3>
                        <p class="text-center">Data berikut bersifat sementara dan dapat berubah sewaktu-waktu.
                            </br><strong>*(update terakhir {{ \Carbon\Carbon::parse(\DB::table('data_covid_tulungagung')->latest()->pluck('updated_at')->first())->format('d M Y H:i:s') }})</strong></p>
                    </div> <!-- section title -->
                </div>


    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-30">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <p class="text-white mb-0">TOTAL ODP</p>
                        <h2 class="mb-0 text-white">{{ $data->sum('jumlah_odp') }}</h2>
                        <p class="text-white mb-0">ORANG</p>
                    </div>
                    <div class="ml-auto">
                        <img src="https://pedulicorona.com/images/icons/mood-neutral-outline.svg" alt="Positif" width="50" height="50" style="opacity: 0.4;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-30">
        <div class="card bg-warning img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <p class="text-white mb-0">TOTAL PDP</p>
                        <h2 class="mb-0 number-font text-white">{{ $data->sum('jumlah_pdp') }}</h2>
                        <p class="text-white mb-0">ORANG</p>
                    </div>
                    <div class="ml-auto">
                        <img src="https://pedulicorona.com/images/icons/mood-neutral-outline.svg" alt="Positif" width="50" height="50" style="opacity: 0.4;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-30">
        <div class="card bg-danger img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <p class="text-white mb-0">TOTAL POSITIF</p>
                        <h2 class="mb-0 number-font text-white">{{ $data->sum('jumlah_positif') }}</h2>
                        <p class="text-white mb-0">ORANG</p>
                    </div>
                    <div class="ml-auto">
                        <img src="https://pedulicorona.com/images/icons/mood-sad-outline.svg" alt="Positif" width="50" height="50" style="opacity: 0.4;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-30">
        <div class="card bg-success img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h4 class="text-white mb-0">TULUNGAGUNG</h>
                        <p class="text-white mb-3">{{ $data->sum('jumlah_positif') }} Positif, {{ $data->sum('jumlah_sembuh') }} Sembuh, {{ $data->sum('jumlah_meninggal') }} Meninggal</p>
                    </div>
                    <div class="ml-auto">
                        <img src="{{ asset('assets/images/favicon.png') }}" alt="Positif" width="60" height="50" style="opacity: 0.7;">
                    </div>
                </div>
            </div>
        </div>
    </div>


                <div class="table-responsive-md">
                    {{ $html->table(['class' => 'table table-striped table-bordered']) }}
                </div>
            </div> <!-- row -->
        </div>
    </section>
    <!-- end table -->

    <!-- peta -->
    
    <div class="py-3 container">
        <div class="row">
            <div class="my-5 py-3 col-md-12">
                <div id="mapid"></div>
            </div>
        </div>
    </div>


    <!-- end peta -->

    <!--====== cegah PART START ======-->
    
    <section id="cegah" class="team-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Pencegahan, <span> Covid-19</span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="icon">
                            <img class="shape" src="assets/images/cuci tangan pakai sabun.png" alt="shape">
                            
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Cuci Tangan</a></h4>
                            <p class="text">Cuci tangan dengan sabun selama 20 detik pada air mengalir.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="icon">
                            <img class="shape" src="assets/images/pakai masker jika batuk pilek.png" alt="shape">
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Pakai Masker</a></h4>
                            <p class="text">Gunakanlah masker jika batuk atau pilek. </p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="icon">
                            <img class="shape" src="assets/images/makan gizi seimbang.png" alt="shape">
                            
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Makanan Bergizi</a></h4>
                            <p class="text">Konsumsi makanan sehat dan bergizi, seperti sayur dan buah buahan.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="icon">
                            <img class="shape" src="assets/images/etika batuk.png" alt="shape">
                            
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Terapan Etika Batuk</a></h4>
                            <p class="text">Tutup mulut dan hidung menggunakan tisu atau lengan baju anda bila batuk atau bersin.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="icon">
                            <img class="shape" src="assets/images/sosial distancing.png" alt="shape">
                            
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Social Distancing</a></h4>
                            <p class="text">Jaga jarak pada saat dikerumunan dengan menjaga jarak 1 meter lebih.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="icon">
                            <img class="shape" src="assets/images/ke fasilitas kesehatan jika sakit.png" alt="shape">
                            
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Jika Sakit Berobat</a></h4>
                            <p class="text">Apabila sakit segera berobat ke fasilitas kesehatan.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== cegah PART ENDS ======-->



    <!--====== SERVICES PART START ======-->

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Tanda dan Gejala, <span> Covid-19</span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/images/demam.png') }}" alt="shape">
                            <img class="shape-1" src="{{ asset('assets/images/demam.png') }}" alt="shape">

                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Demam Tinggi</a></h4>
                            <p class="text">Demam menunjukkan gejala awal COVID-19, demam biasanya mencapai suhu 38
                                derajat celcius keatas</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/images/batuk%20kering.png') }}" alt="shape">
                            <img class="shape-1" src="{{ asset('assets/images/batuk%20kering.png') }}" alt="shape">

                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Batuk Kering</a></h4>
                            <p class="text">Batuk Kering tidak beriak dan berulang ulang merupakan tanda infeksi aktif
                                di paru-paru, yang mungkin bisa disebabkan karena COVID-19.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/images/sakit%20tenggorokan.png') }}" alt="shape">
                            <img class="shape-1" src="{{ asset('assets/images/sakit%20tenggorokan.png') }}" alt="shape">

                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Sakit Tenggorokan</a></h4>
                            <p class="text">Infeksi COVID-19 akan melalui jalur pernafasan sehingga dapat mengakibatkan
                                radang pada tenggorokan dan rasa nyeri.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/images/sakit%20kepala.png') }}" alt="shape">
                            <img class="shape-1" src="{{ asset('assets/images/sakit%20kepala.png') }}" alt="shape">

                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Sakit Kepala</a></h4>
                            <p class="text">Dengan adanya demam yang tinggi, COVID-19 seringkali diikuti dengan gejala
                                sakit kepala.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/images/lemas.png') }}" alt="shape">
                            <img class="shape-1" src="{{ asset('assets/images/lemas.png') }}" alt="shape">

                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Lemas</a></h4>
                            <p class="text">Infeksi COVID-19 yang telah menyebar ke seluruh tubuh akan menghabiskan
                                energi yang banyak sehingga seringkali dapat mengakibatkan lemas.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{ asset('assets/images/sesak%20nafas.png') }}" alt="shape">
                            <img class="shape-1" src="{{ asset('assets/images/sesak%20nafas.png') }}" alt="shape">

                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Sesak Nafas</a></h4>
                            <p class="text">Apabila COVID-19 berkembang dengan cepat dan besar di paru-paru, fungsi paru
                                akan menurun sehingga terjadi sesak nafas.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="berita" class="blog-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-35">
                        <div class="line"></div>
                        <h3 class="title"><span>Berita Terbaru</span> COVID-19</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                @foreach(\App\Berita::latest()->published()->limit(6)->get() as $berita)
                <div class="col-lg-4 col-md-7">
                    <div class="single-blog mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="blog-image">
                            <img src="{{ asset('content/uploads/'. $berita->image) }}" alt="blog">
                        </div>
                        <div class="blog-content">
                            <ul class="meta">
                                <li>Posted By: <a href="#">{{ $berita->author->name }}</a></li>
                                <li>{{ $berita->published_at }}</li>
                            </ul>
                            <a href="{{ route('frontend.berita.show', $berita->slug) }}"><p class="text">{{ $berita->title }}</p></a>
                            <a class="more" href="{{ route('frontend.berita.show', $berita->slug) }}">Learn More <i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single blog -->
                </div>
                @endforeach
            </div> <!-- row -->
            <div class="m-auto text-center">
                <a href="{{ route('frontend.berita.index') }}" class="btn btn-primary btn-lg font-weight-bold">Selengkapnya</a>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->
    <!--====== TEAM PART START ======-->

    <section id="contact" class="team-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-30">
                        <div class="line m-auto"></div>
                        <h3 class="title"><span>Call Center </span>Siaga Covid-19</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card service">
                        <div class="card-body">
                            <div class="media"><img src="assets/images/profile.svg" alt="Alfan Jauhari"
                                    style="width: 100px; height: 100px; border-radius: 100%;">
                                <div class="media-body ml-4">
                                    <h3 class="mt-0 mb-0 font-weight-bold">Public Safety Centre (PSC)</h3>
                                    <h5 class=""><a data-v-93cc92b4="" href="tel:0215210411"
                                            class="font-weight-bold">(0355) 320119</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card service">
                        <div class="card-body">
                            <div class="media"><img src="assets/images/profile.svg" alt="Muhammad Surya Maulana"
                                    style="width: 100px; height: 100px; border-radius: 100%;">
                                <div class="media-body ml-4">
                                    <h3 class="mt-0 mb-0 font-weight-bold">DINAS KESEHATAN</h3>
                                    <h5 class=""><a href="tel:0215210411" class="font-weight-bold">(0355) 321924</a></h5>

                                    <div class="social mt-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM PART ENDS ======-->
    
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
                                <p class="text">Dibuat dengan penuh cinta <i class="fas fa-heart text-danger"></i> oleh para relawan; <a href="https://instagram.com/alfanjauhari_">Alfan Jauhari</a>, <a href="https://instagram.com/surya_maulana70">Muhammad Surya</a> & <a href="https://instagram.com/defrindr">Defri Indra M.</a></p>
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

    <!-- map js assets -->
    <script src="{{ asset('js/map.js') }}"></script>
    <!-- end map js assets -->

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/',
            columns: [
                {
                    data: 'nama_kecamatan',
                    name: 'nama_kecamatan'
                },
                {
                    data: 'jumlah_positif',
                    name: 'jumlah_positif'
                },
                {
                    data: 'jumlah_meninggal',
                    name: 'jumlah_meninggal'
                },
                {
                    data: 'jumlah_sembuh',
                    name: 'jumlah_sembuh'
                },
                {
                    data: 'jumlah_odp',
                    name: 'jumlah_odp'
                },
                {
                    data: 'jumlah_pdp',
                    name: 'jumlah_pdp'
                }
            ]
        })
    </script>
</body>

</html>