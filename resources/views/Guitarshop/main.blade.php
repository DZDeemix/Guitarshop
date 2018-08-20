
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if($page)
    <title>{{ $page->title }}</title>
    <meta name="keywords" content="{{$page->meta_key}}">
    <meta name="description" content="{{$page->meta_description}}">
    @endif
    <!-- Favicon-->
    <link rel="shortcut icon" href="images/icon/favicon.png" type="image/x-icon">

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
<body class="home planter-agency-home">

<div class="yolo-site">
    <header class="header yolo-header-style-8">

        <div class="mobile-menu">
            <div class="col-3 text-left"><a href="#primary-menu"><i class="fa fa-bars"></i></a></div>
            <div class="col-3 text-center">
                <div class="logo">
                    <h1><a href="{{ route ('main') }}"><img src="/Site/images/logo/logo_pvb3.svg" alt="logo"/></a></h1>
                </div>
            </div>
            <div class="col-3 text-right">
                <div class="header-right">
                    <div class="search-button-wrapper header-customize-item style-default">
                        <div class="icon-search-menu"><i class="wicon fa fa-search"></i></div>
                        <div class="yolo-search-wrapper">
                            <form action="{{ route('search') }}" autocomplete="off">
                                <input id="search-ajax" placeholder="Enter keyword to search" type="search"  name="s"/>
                                <button class="submit"><i class="fa fa-search"></i></button>
                                <button class="close"><i class="pe-7s-close"></i></button>
                            </form>>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="header-bottom menu_style">

            <div class="main-nav-wrapper ">
                <div class="header-logo Absolute-Center">
                    <h1><a href="{{ route('main') }}"><img src="/Site/images/logo/logo_pvb3.svg" alt="logo"/></a></h1>
                </div>

                <div class="header-left ">
                    @include('layouts.menu')
                </div>


            </div>

        </div>

    </header>

    <div id="example-wrapper">
        <div class="div-box mb">
            <div class="slider-home slider-home-8">
                <div data-number="1" data-margin="100" data-loop="yes" data-navcontrol="yes" data-autoplay="yes" class="begreen-owl-carousel">
                    @foreach( $slidergallery as $item)
                        <div class="slider-1">
                            <div class="slider-content slider-1-content">
                                <div class="slider-content-center">
                                    <figure><img src="/images/main_slider/{{ $item->src_path }}" alt="polygon-slider-8"/></figure>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="div-box mb">
            <div class="home-8-our-products">
                <div class="container">
                    <h2 class="title-style title-style-1 text-center mb-45"><span class="title-left"> Наши </span><span class="title-right">Гитары</span></h2>
                    <div class="grid shortcode-product-wrap product-begreen columns-3">
                        <ul class="grid shortcode-product-wrap columns-3">
                            @include('Guitarshop.include.poduct')
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="div-box mb">
            <div class="home-2-recent-news recent-news-home_4">
                <div class="container">
                    <h2 class="title-style title-style-1 text-center mb" style="padding: 10px"><span class="title-left"></span><span class="title-right">Новости</span></h2>
                    <div data-number="2" data-margin="15" data-loop="yes" data-navcontrol="yes" class="begreen-owl-carousel">
                        @foreach($posts as $item)
                            <div class="recent-news-container">
                                <article class="recent_news_item">
                                    <div class="post-meta">
                                        <div class="post-meta-inner">
                                            <span class="post-day">{{ date("d", strtotime ($item->created_at)) }} </span>
                                            <span class="post-month">{{ config('GS.month')[(date("n", strtotime ($item->created_at))-1)] }} </span>
                                        </div>
                                    </div>
                                    <div class="post-thumbnail">
                                        <a href="{{ route('post_show',['alias' => $item->alias]) }}">
                                            <div class="absolute-center absolute-center-posts-main" style="background-image: url( '{{ '/images/coves_posts/' . $item->cover }}' );">

                                            </div>
                                        </a>
                                        <div class="post-content">
                                            <div class="post-main-content">
                                                <h4 class="entry-title">
                                                    <a href="{{ route('post_show',['alias' => $item->alias]) }}">{{$item->title}}</a>
                                                </h4>

                                                <p class="post-excerpt">{!! substr(strip_tags($item->content),0,100) . "..." !!}</p>
                                                <a href="{{ route('post_show',['alias' => $item->alias]) }}" class="btn-readmore">
                                                    <span class="span-text">Читать</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        <div class="div-box">
            <footer id="yolo-footer-wrapper">
                <div class="yolo-footer-wrapper footer-6">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="footer-col footer-1-col-1">
                                        <h2><a href="{{ route('main') }}" class="logo"><img src="/Site/images/logo/logo_pvb3.svg" alt="logo1" width="84" height="63" class="vc_single_image-img attachment-full"/></a></h2>
                                        <p>We are a creative company that specializes in strategy & design. We like to create things with like – minded people who are serious about their passions.</p>
                                        <ul id="social-footer">
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-md-offset-4">
                                    <div class="footer-col footer-2-col-1">
                                        <h3 class="mb-45">Contact Info</h3>
                                        <div class="icon-info">
                                            <p><strong>Address</strong><br/>69 North Cleveland Street, Memphis,USA.</p><i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="icon-info">
                                            <p><strong>Call Us</strong><br/>(123) 8111 9210 (Or)<br/>(012) 1111 6868</p><i class="fa fa-phone"></i>
                                        </div>
                                        <div class="icon-info">
                                            <p><strong>Email Us</strong><br/>Yolo@support.com</p><i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
            </footer>
        </div>

    </div>

</div>
<!-- .mv-site-->



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
<script type="text/javascript" src="/Site/libs/isotope/fit-columns.js"></script>
<script type="text/javascript" src="/Site/libs/isotope/isotope-docs.min.js"></script>
<script type="text/javascript" src="/Site/libs/mansory/mansory.js"></script>
<script type="text/javascript" src="/Site/libs/prettyphoto-master/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/Site/libs/slick-sider/slick.min.js"></script>
<script type="text/javascript" src="/Site/libs/countdown-timer/js/jquery.final-countdown.min.js"></script>
<script type="text/javascript" src="/Site/libs/countdown-timer/js/kinetic.js"></script>
<script type="text/javascript" src="/Site/libs/owl.carousel.min/owl.carousel.min.js"></script>
<script type="text/javascript" src="/Site/js/main.js"></script>
</body>
</html>