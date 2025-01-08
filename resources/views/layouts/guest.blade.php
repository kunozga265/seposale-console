<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title}}</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;family=Teko:wght@300;400;500;600;700&amp;display=swap"
            rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
{{--        <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">--}}
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('css/owl.css')}}" rel="stylesheet">
        <link href="{{asset('css/flaticon.css')}}" rel="stylesheet">
        <link href="{{asset('css/linoor-icons-2.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
        <link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/hover.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/jarallax.css')}}">
        <link href="{{asset('css/custom-animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <!-- rtl css -->
        <link href="{{asset('css/rtl.css')}}" rel="stylesheet">
        <!-- Responsive File -->
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

        <!-- Color css -->
        <link rel="stylesheet" id="jssDefault" href="{{asset('css/colors/color-default.css')}}">

        <link rel="shortcut icon" href="images/favicon.png" id="fav-shortcut" type="image/x-icon">
        <link rel="icon" href="images/favicon.png" id="fav-icon" type="image/x-icon">

        <!-- Responsive Settings -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
        <!--[if lt IE 9]><script src="{{asset('js/respond.js')}}"></script><![endif]-->
        <!-- Scripts -->
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
        @livewireStyles
    </head>
    <body >

        <div class="page-wrapper">

            <!-- Preloader -->
            <div class="preloader">
                <div class="icon"></div>
            </div>

            <!-- Main Header -->
            <header class="main-header header-style-one">

                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="{{route('home')}}" title="Seposale Limited"><img
                                        src="{{asset('images/logo.png')}}" id="thm-logo" alt="Seposale Limited"
                                        title="Seposale Limited"></a></div>
                        </div>
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span
                                    class="txt">Menu</span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="{{request()->is('home') ? 'current' : '' }}">
                                            <a href="{{route('home')}}">Home</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="other-links clearfix">
                            <!--Search Btn-->
                            <div class="search-btn">
                                <button type="button" class="theme-btn search-toggler"><span
                                        class="flaticon-loupe"></span></button>
                            </div>
                            <div class="link-box">
                                <div class="call-us">
                                    <div class="link">
                                        <span class="icon"></span>
{{--                                        <span class="sub-text">Call Anytime</span>--}}
                                        <a href="tel:+265 992 478 408"><span class="number">+265 992 478 408</span></a>
                                        <a href="tel:+265 888 699 977"><span class="number">+265 888 699 977</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Header Upper-->

            </header>
            <!-- End Main Header -->

            <!--Mobile Menu-->
            <div class="side-menu__block">


                <div class="side-menu__block-overlay custom-cursor__overlay">
                    <div class="cursor"></div>
                    <div class="cursor-follower"></div>
                </div><!-- /.side-menu__block-overlay -->
                <div class="side-menu__block-inner ">
                    <div class="side-menu__top justify-content-end">

                        <a href="#" class="side-menu__toggler side-menu__close-btn"><img src="images/icons/close-1-1.png"
                                                                                         alt=""></a>
                    </div><!-- /.side-menu__top -->


                    <nav class="mobile-nav__container">
                        <!-- content is loading via js -->
                    </nav>
                    <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
                    <div class="side-menu__content">
{{--                        <p>Linoor is a premium Template for Digital Agencies, Start Ups, Small Business and a wide range of--}}
{{--                            other agencies.</p>--}}
                        <p><a href="mailto:needhelp@linoor.com">info@seposale.com</a> <br>
{{--                            <a href="tel:888-999-0000">888--}}
{{--                                999 0000</a>--}}
                            <a href="tel:+265 992 478 408"><span class="number">+265 992 478 408</span></a>
                            <a href="tel:+265 888 699 977"><span class="number">+265 888 699 977</span></a>
                        </p>
                        <div class="side-menu__social">
                            <a href="https://www.facebook.com/seposalecompany/"><i class="fab fa-facebook-square"></i></a>
                            <a href="https://x.com/seposalecompany/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/seposalecompany/"><i class="fab fa-instagram"></i></a>
{{--                            <a href="#"><i class="fab fa-pinterest-p"></i></a>--}}
                        </div>
                    </div><!-- /.side-menu__content -->
                </div><!-- /.side-menu__block-inner -->
            </div><!-- /.side-menu__block -->

            <!--Search Popup-->
            <div class="search-popup">
                <div class="search-popup__overlay custom-cursor__overlay">
                    <div class="cursor"></div>
                    <div class="cursor-follower"></div>
                </div><!-- /.search-popup__overlay -->
                <div class="search-popup__inner">
                    <form action="#" class="search-popup__form">
                        <input type="text" name="search" placeholder="Type here to Search....">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- /.search-popup__inner -->
            </div><!-- /.search-popup -->


            {{ $slot }}



        </div>
        <!--End pagewrapper-->

        <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>




        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/TweenMax.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/jquery.fancybox.js')}}"></script>
        <script src="{{asset('js/owl.js')}}"></script>
        <script src="{{asset('js/mixitup.js')}}"></script>
        <script src="{{asset('js/appear.js')}}"></script>
        <script src="{{asset('js/wow.js')}}"></script>
        <script src="{{asset('js/jQuery.style.switcher.min.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js">
        </script>
        <script src="{{asset('js/jquery.easing.min.js')}}"></script>
        <script src="{{asset('js/jarallax.min.js')}}"></script>
        <script src="{{asset('js/custom-script.js')}}"></script>

{{--        <script src="{{asset('js/lang.js')}}"></script>--}}
{{--        <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>--}}
        <script src="{{asset('js/color-switcher.js')}}"></script>

        @livewireScripts
        @stack("scripts")
    </body>
</html>
