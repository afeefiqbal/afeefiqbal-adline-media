<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="title" content="{!! isset($meta_data) ? $meta_data->meta_title : '' !!}">
    <meta name="description" content="{!! isset($meta_data) ? $meta_data->meta_description : '' !!}">
    <meta name="keywords" content="{!! isset($meta_data) ? $meta_data->meta_keyword : '' !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}@if(isset($meta_data) && $meta_data->meta_title) - {!! $meta_data->meta_title !!}@endif</title>
    @if(isset($siteInformation) && $siteInformation->favicon)
    <link rel="icon" type="image/x-icon" href="{{ asset($siteInformation->favicon) }}">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Marcellus&display=swap" rel="stylesheet">
    <link href="{{ asset('web/cssN/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('web/cssN/slicknav.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web/cssN/swiper-bundle.min.css') }}">
    <link href="{{ asset('web/cssN/all.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('web/cssN/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web/cssN/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web/cssN/mousecursor.css') }}">
    <link rel="stylesheet" href="{{ asset('web/cssN/twentytwenty.css') }}">
    <link href="{{ asset('web/cssN/custom.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('web/css/sweetalert.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/css/sweetalert-overrides.css') }}" rel="stylesheet">
    {!! isset($meta_data) ? $meta_data->other_meta_tag : '' !!}
    {!! isset($extra_meta_data) ? $extra_meta_data->header_tag : '' !!}
    @yield('styles')
    
    
    <style>
        .main-header {
                position: sticky !important;
                top: 0px;
        }
        
        
        @media (max-width:1199.98px){
            .main-menu ul li a{
                font-size: 15px;       
            }        
        }
        
        @media (max-width:1099.98px){
            .main-menu ul li a{
                font-size: 14px;     
                padding: 14px 10px !important;
            }        
        }
        
        @media (min-width:992px){
            .btnMobile{
                display: none !important;
            }
        }
        
        .btnBoxSp{
            display: flex;
            grid-gap: 10px;
            align-items: center;
        }
        
        .btnBoxSp .btn-default{
            font-size: 15px;
        }
        
        @media (max-width:991.98px){
            .submenu .nav-link svg{
                display: none;
            }
            
            .submenu-list .nav-link{
                padding: 8px 20px 8px 20px;
            }
            
            .btnMobile{
                display: flex !important;
            }
        }
        
        @media (max-width:766.98px){
            .btnBoxSp .btn-default{
                font-size: 14px;
            }
        
        }
        
        @media (max-width:575px){
            
            
            .navbar-brand{
                max-width: 135px;
            }
            
            .btnBoxSp .btn-default{
                padding: 13px 10px;
                font-size: 12px;
            }
            
            .btnBoxSp .btn-default::before{
                display: none;
            }
        
        }
        
        @media (max-width:329.98px){
            .navbar-brand{
                max-width: 125px;
            }
        }
        
        .hero-section.hero-bg-image.hero-slider-layout .hero-slide.hero-slide-video::after{
            opacity: 0;
        } 
        
        .contact-info .about-us-image{
               padding: 0 0px 58px 0;
        }
        
        .about-us-image.position-sticky{
               top: 140px; 
        }
    
    
    </style>
    
</head>
<body class="active-sticky-header">
    

    {!! isset($extra_meta_data) ? $extra_meta_data->body_tag : '' !!}
    @include('web.includes.menu')
    @yield('content')
    @include('web.includes.footer')

    <script src="{{ asset('web/jsN/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('web/jsN/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/jsN/validator.min.js') }}"></script>
    <script src="{{ asset('web/jsN/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('web/jsN/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('web/jsN/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('web/jsN/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('web/jsN/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web/jsN/SmoothScroll.js') }}"></script>
    <script src="{{ asset('web/jsN/parallaxie.js') }}"></script>
    <script src="{{ asset('web/jsN/jquery.event.move.js') }}"></script>
    <script src="{{ asset('web/jsN/jquery.twentytwenty.js') }}"></script>
    <script src="{{ asset('web/jsN/gsap.min.js') }}"></script>
    <script src="{{ asset('web/jsN/SplitText.js') }}"></script>
    <script src="{{ asset('web/jsN/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('web/jsN/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('web/jsN/wow.min.js') }}"></script>
    <script src="{{ asset('web/jsN/function.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/sweetalert-init.js') }}"></script>
    <script src="{{ asset('web/js/theme-custom.js') }}"></script>
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
    @yield('scripts')
</body>
</html>
