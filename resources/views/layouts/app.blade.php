<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Seposale') }} - {{$title}}</title>

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
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
{{--        <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
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

    </head>
    <body class="">

      <div class="container">
          <div class="">
              {{ $slot }}
          </div>

      </div>


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

        @stack("scripts")
    </body>
</html>
