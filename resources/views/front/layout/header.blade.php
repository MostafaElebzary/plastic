<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@if(session('lang') == 'ar')
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/bootstrap.rtl.min.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/meanmenu.css">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/boxicons.min.css">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/fonts/flaticon.css">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/owl.theme.default.min.css">
        <!-- Odometer CSS-->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/odometer.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/magnific-popup.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/responsive.css">
        <link rel="stylesheet" href="{{ URL::asset('public/new_front/ar')}}/css/rtl.css">


@else
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/bootstrap.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/meanmenu.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/boxicons.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/fonts/flaticon.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/owl.theme.default.min.css">
    <!-- Odometer CSS-->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/odometer.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/magnific-popup.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/new_front/en')}}/css/responsive.css">

    @endif
    <title>Paris Plastic Factory</title>

    <link rel="icon" type="image/png" href="{{url('public/uploads/posts/'.$Settings->fav)}}">

    <style>
        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 2s;
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
        }
    </style>
</head>
<body>
<!-- Pre Loader -->
<div class="loader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="spinner"></div>
        </div>
    </div>
</div>
<!-- End Pre Loader -->

<!-- Header top -->
<div class="header-top-area header-top-area-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-top-item">
                    <div class="header-left">
                        <ul>
                            <li>
                                <i class="flaticon-mail"></i>
                                <a  href="mailto:{{$Settings->email1}}">
                                    <span class="__cf_email__">{{$Settings->email1}}</span>
                                </a>
                            </li>
                            <li>
                                <i class="flaticon-phone"></i>
                                <a href="tel:{{$Settings->phone1}}">
                                    {{$Settings->phone1}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="header-top-item">
                    <div class="header-right">
                        <ul>
                            <li>
                                <a href="{{$Settings->facebook}}" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->twitter}}" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->instagram}}" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->linkedin}}" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header top -->

<!-- Header Contact -->
<div class="header-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{url('public/uploads/posts/'.$Settings->logo1)}}" alt="{{$Settings->append_title}}">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-item">
                    <ul>
                        <li>
                            <i class='bx bx-phone-call'></i>
                            <h4>
                                <a href="tel:{{$Settings->phone1}}">{{$Settings->phone1}}</a>
                            </h4>
                            <span>{{trans('lang.Need help? Make a Call')}}</span>
                        </li>
                        <li>
                            <i class='bx bx-location-plus'></i>
                            <h4>{{trans('lang.Address')}}</h4>
                            <span>{{$Settings->append_address}}</span>
                        </li>
                        <li>
                            <i class='bx bx-mail-send'></i>
                            <h4>
                                <a  href="mailto:{{$Settings->email1}}"><span class="__cf_email__">{{$Settings->email1}}</span></a>
                            </h4>
                            <span>{{trans('lang.Send us Email')}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Contact -->

<!-- Start Navbar Area -->
<div class="navbar-area nav-area-two sticky-top">
    <!-- Mobile Device -->
    <div class="mobile-nav">
        <a href="{{url('/')}}" class="logo">
            <img src="{{url('public/uploads/posts/'.$Settings->logo2)}}" alt="Logo">
        </a>
    </div>

    <!-- Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == "") active @endif"
                               href="@if(Request::segment(1) != ""){{url('/')}}@endif#Home">{{trans('lang.home')}}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link "
                                                href="@if(Request::segment(1) != ""){{url('/')}}@endif#about_us">{{trans('lang.about_us')}} </a>
                        </li>
                        <li class="nav-item"><a class="nav-link @if(Request::segment(1) == "service") active @endif"
                                                href="@if(Request::segment(1) != ""){{url('/')}}@endif#services">{{trans('lang.services')}} </a>
                        </li>
                        <li class="nav-item"><a class="nav-link @if(Request::segment(1) == "product") active @endif"
                                                href="@if(Request::segment(1) != ""){{url('/')}}@endif#products">{{trans('lang.products')}} </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="@if(Request::segment(1) != ""){{url('/')}}@endif#partners">{{trans('lang.partners')}} </a>
                        </li>

                        <li class="nav-item"><a class="nav-link @if(Request::segment(1) == "contact-us") active @endif" href="{{url('contact-us')}}">{{trans('lang.Contact_us')}}</a>
                        </li>
                    </ul>
                    <div class="side-nav-two">
                        <button type="button" class="btn modal-btn" data-bs-toggle="modal" data-bs-target="#myModalRight">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Sidebar Modal -->
<div id="myModalRight" class="modal fade modal-right" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{url('public/uploads/posts/'.$Settings->logo2)}}" alt="Logo">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>{{$about_us->append_title}}</h2>
                <p>{!! $about_us->append_content !!}</p>
                <div class="social-area">
                    <h3>{{trans('lang.Our Social Contact')}}</h3>
                    <ul>
                        <li>
                            <a href="{{$Settings->facebook}}" target="_blank">
                                <i class='bx bxl-facebook' ></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$Settings->twitter}}" target="_blank">
                                <i class='bx bxl-twitter' ></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$Settings->linkedin}}" target="_blank">
                                <i class='bx bxl-linkedin' ></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$Settings->instagram}}" target="_blank">
                                <i class='bx bxl-instagram' ></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Modal -->
