
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('Meta_property')
    <!-- Favicon-->
    <link rel="shortcut icon" href="/images/icon/favicon.png" type="image/x-icon">

    <!-- Web Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto"; rel="stylesheet">

    <!-- Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/Site/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/animate/animated.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/owl.carousel.min/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/jquery.mmenu.all/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/direction/css/noJS.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/prettyphoto-master/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/slick-sider/slick.min.css">
    <link rel="stylesheet" type="text/css" href="/Site/libs/countdown-timer/css/demo.css">

    <!-- Template CSS-->
    <link rel="stylesheet" type="text/css" href="/Site/css/main.css">
    <link rel="stylesheet" type="text/css" href="/Site/css/home.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')

    -->
</head>
    @yield('body')



<div class="yolo-site">
    <header class="header yolo-header-style-10">

        <div class="mobile-menu">
            <div class="col-3 text-left"><a href="#primary-menu"><i class="fa fa-bars"></i></a></div>
            <div class="col-3 text-center">
                <div class="logo">
                    <h1><a href="{{ route('main') }}"><img src="/Site/images/logo/logo_pvb3.svg" alt="logo"/></a></h1>
                </div>
            </div>
            <div class="col-3 text-right">
                <div class="header-right">
                    <div class="search-button-wrapper header-customize-item style-default">
                        <div class="icon-search-menu"><i class="wicon fa fa-search"></i></div>
                        <div class="yolo-search-wrapper">
                            <form action="{{ route('search') }}" autocomplete="off">
                                <input id="search-ajax" placeholder="Enter keyword to search" type="search"  name="s"/>
                                <button class="submit search-button-custom"><i class="fa fa-search"></i></button>
                                <button class="close"><i class="pe-7s-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-logo">
            <h1><a href="{{ route('main') }}"><img src="/Site/images/logo/logo_pvb3.svg" alt="logo"/></a></h1>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="main-nav-wrapper">
                    <div class="header-left">
                       @include('layouts.menu')
                        <!-- .header-main-nav-->
                    </div>

                    <div class="header-right-search">
                       {{-- <div class="icon-search-menu"><i class="wicon fa fa-search"></i></div>--}}
                        <div class="search-button-wrapper header-customize-item style-default">
                            <form action="{{ route('search') }}" autocomplete="off">
                                <div class="{{ $errors->has('s') ? 'has-error' : '' }}">
                                    <input type="text"   name="s" placeholder="{{ $errors->has('s') ? 'поле обязательно' : 'найти' }}">
                                    <input type="submit" class="search" value="&#xf002;" />
                                </div>
                            </form>
                        </div>

                        <div class="header-customize-item canvas-menu-toggle-wrapper"></div>

                    </div>
                </div>

            </div>
        </div>
    </header>
    @yield('content')
</div>
<!-- .mv-site-->
<div class="div-box">
    <footer id="yolo-footer-wrapper">
        <div class="yolo-footer-wrapper footer-6">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-col footer-1-col-1">
                                <h2><a href="{{ route('main') }}" class="logo"><img src="/Site/images/logo/logo_pvb3.svg" alt="logo1" width="84" height="63" class="vc_single_image-img attachment-full"/></a></h2>
                                <p>Мы креативная команда специализируещиеся на создании гитар. Нам нравиться создавать их, для людей которые серьезно заботятся о своем звуке и сценическом образе.</p>
                                <ul id="social-footer">
                                    <li><a href="https://www.youtube.com/channel/UCwoQxi1q0ZCmPyn3UZ5uy0g?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="https://vk.com/pvbguitars"><i class="fa fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-md-offset-4">
                            <div class="footer-col footer-2-col-1">
                                <h3 class="mb-45">Контактная информация</h3>
                                <div class="icon-info">
                                    <p><strong>Адрес</strong><br/>Россия г. Самара</p><i class="fa fa-map-marker"></i>
                                </div>
                                <div class="icon-info">
                                    <p><strong>Телефон</strong><br/>8(909)365-44-40<br/></p><i class="fa fa-phone"></i>
                                </div>
                                <div class="icon-info">
                                    <p><strong>Email</strong><br/>pavebez@yandex.ru</p><i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<div class="popup-wrapper">
</div>
<!-- .popup-wrapper-->
<div class="click-back-top-body">
    <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
</div>

<!-- Vendor jQuery-->
<script type="text/javascript" src="/Site/libs/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/Site/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Site/libs/animate/wow.min.js"></script>
<script type="text/javascript" src="/Site/libs/jquery.mmenu.all/jquery.mmenu.all.min.js"></script>
<script type="text/javascript" src="/Site/libs/countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="/Site/libs/jquery-appear/jquery.appear.min.js"></script>
<script type="text/javascript" src="/Site/libs/jquery-countto/jquery.countTo.min.js"></script>
<script type="text/javascript" src="/Site/libs/direction/js/jquery.hoverdir.js"></script>
<script type="text/javascript" src="/Site/libs/direction/js/modernizr.custom.97074.js"></script>
<script type="text/javascript" src="/Site/libs/isotope/isotope.pkgd.min.js"></script>
{{--<script type="text/javascript" src="/Site/libs/isotope/fit-columns.js"></script>
<script type="text/javascript" src="/Site/libs/isotope/isotope-docs.min.js"></script>--}}
<script type="text/javascript" src="/Site/libs/mansory/mansory.js"></script>
<script type="text/javascript" src="/Site/libs/prettyphoto-master/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/Site/libs/slick-sider/slick.min.js"></script>
<script type="text/javascript" src="/Site/libs/countdown-timer/js/jquery.final-countdown.min.js"></script>
<script type="text/javascript" src="/Site/libs/countdown-timer/js/kinetic.js"></script>
<script type="text/javascript" src="/Site/libs/owl.carousel.min/owl.carousel.min.js"></script>

<script type="text/javascript" src="/Site/js/main.js"></script>


@yield('create-order')


</body>
</html>