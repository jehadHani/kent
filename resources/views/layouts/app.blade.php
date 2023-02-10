<!DOCTYPE html>

<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GOMRA ONLINE">
    <meta name="author" content="GOMRA ONLINE">


    <title>GOMRA ONLINE</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('gomra/assets/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="shortcut icon" href="{{asset('gomra/assets/ico/favicon.ico')}}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Global -->
    <link href="{{asset('gomra/assets/plugins/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('gomra/assets/plugins/bootstrap-rtl-master/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('gomra/assets/plugins/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('gomra/assets/plugins/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('gomra/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('gomra/assets/plugins/font-elegant/elegant.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('gomra/assets/plugins/ionicons-2.0.1/css/ionicons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('gomra/assets/plugins/rs-plugin/css/settings.css')}}"  rel="stylesheet" media="screen" />

    <!-- Custom Style -->
    <link href="{{asset('gomra/assets/css/style-electronic.css')}}" rel="stylesheet" type="text/css">



</head>
<body id="home" class="wide">

<!-- PRELOADER -->
<div id="loading">
    <div class="loader"></div>
</div>
<!-- /PRELOADER -->

<!-- WRAPPER -->
<div id="full-site-wrapper">
    <main class="wrapper">
        <!-- Header -->
        <header>
            <section class="main-header">
                <div class="header-wrap upper-text">
                    <div class="container theme-container">
                        <div class="top-bar">
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <div class="logo  navbar-brand">
                                        <h2 class="logo-title  font-2"> <a href=""> <span class="theme-color">Gomra </span>Online</a> </h2>
                                        <span class="nav-trigger toggle-hover visible-xs">
                                                <a class="toggle-icon icon-cube size-24" href="#"> </a>
                                            </span>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 navigation font-2">
                                    <nav>
                                        <div class="navbar-collapse no-padding" id="primary-navigation">
                                            <ul class="nav navbar-nav primary-navbar">
                                                <li class="dropdown active">
                                                    <a href="/" class=""  >الرئيسية</a></li>
                                                <li class="dropdown mega-dropdown">
                                                    <a href="#" class=""  > المنتجات </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="" >الأقسام</a>

                                                <li><a href="">توصل معنا</a></li>
                                                <li class="">
                                                    <a href="#" class="" >من نحن</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <!-- /Header -->
        <!-- CONTENT AREA -->

        @yield('content')

        <!-- FOOTER -->
        <footer class="footer">
            <section class="footer-bg">
                <div class="space-50 footer-widget">
                    <div class="container theme-container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 clr">
                                <h2 class="logo-title font-2"> <a href=""> <span class="theme-color">GOMRA</span> ONLINE </a> </h2>
                                <p class="text-widget"> اكبر موقع إلكتروني للأجهزة الإلكترونية من أشهر الماركات العالمية.</p>
                                <div class="get-touch">
                                    <p> <i class="icon_pin"></i> <span> 123 New Design Str, ABC Building, Melbourne, Australia.  </span> </p>
                                    <p> <i class="icon_mail_alt"></i> <span> <a href=""> omraonline@info.com </a> </span> </p>
                                    <p> <i class="icon_phone "></i> <span> <a href=""> (0044) 8647 1234 587</a> </span> </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 clr">
                                <h2 class="widget-title"> كافة الأقسام </h2>
                                <div class="tag-cloud">
                                    @php
                                    $categories = \App\Models\Category::all();
                                        @endphp
                                    @foreach($categories as $category)
                                    <a href=""> {{$category->name}} </a>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 clr">
                                <h2 class="widget-title"> اشترك في النشرة البريدية </h2>
                                <form class="widget-subform">
                                <p>أدخل إيميلك لتصلك أخر العروض</p>
                                    <div class="form-group subscribe-widget">
                                        <input type="text" class="form-control text" placeholder="أدخل الايميل هنا">
                                        <button class="title-2 submit-btn white-arrow"> <i class="arrow_left  size-18 white-arrow"></i></button>
                                    </div>
                                </form>
                                <ul class="list-items social-icon">
                                    <li> <a href="#" class="social_twitter"></a> </li>
                                    <li> <a href="#" class="social_googleplus"></a> </li>
                                    <li> <a href="#" class="social_pinterest"></a> </li>
                                    <li> <a href="#" class="social_rss"></a> </li>
                                    <li> <a href="#" class="social_facebook"></a> </li>
                                    <li> <a href="#" class="social_dribbble"></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="space-30 copy-rights-bg">
                <div class="container theme-container">
                    <div class="row">
                        <div class="col-md-6 col-sm-4">
                            <p class="copy-rights font-2"> جميع حقوق الطبع محفوظة &copy; 2022 <a href="#" class="white-color">  </a> </p>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <ul class="list-items payment-optn">
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-1.png')}}"> </a> </li>
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-2.png')}}"> </a> </li>
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-3.png')}}"> </a> </li>
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-4.png')}}"> </a> </li>
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-5.png')}}"> </a> </li>
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-6.png')}}"> </a> </li>
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-7.png')}}"> </a> </li>
                                <li> <a href="#"> <img alt="" src="{{asset('gomra/assets/img/electronic/payment/img-8.png')}}"> </a> </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
        <!-- /FOOTER -->

        <div id="to-top" class="to-top"> <i class="arrow_carrot-up"></i> </div>

    </main>
    <!-- /WRAPPER -->

</div> <!-- Full Site Wrapper -->


<!-- JS Global -->
<script src="{{asset('gomra/assets/plugins/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('gomra/assets/plugins/js/bootstrap.min.js')}}"></script>
<script src="{{asset('gomra/assets/plugins/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('gomra/assets/plugins/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('gomra/assets/plugins/js/jquery.subscribe-better.min.js')}}"></script>
<script src="{{asset('gomra/assets/plugins/js/jquery.plugin.min.js')}}"></script>
<script src="{{asset('gomra/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('gomra/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>


<!-- Custom JS -->
<script src="{{asset('gomra/assets/js/theme-electronic.js')}}"></script>

<!--[if (gte IE 9)|!(IE)]><!-->
<!--        <script src="assets/js/jquery.cookie.js"></script>
        <script src="assets/plugins/style-switcher/style.switcher.js"></script>-->
<!--<![endif]-->

<script type="text/javascript">

    (function(){
        var myDiv = document.getElementsByClassName("loader"),

            show = function(){
                myDiv.style.display = "block";
                setTimeout(hide, 10000); // 5 seconds
            },

            hide = function(){
                myDiv.style.display = "none";
            };

        show();
    })();

</script>

</body>
</html>
