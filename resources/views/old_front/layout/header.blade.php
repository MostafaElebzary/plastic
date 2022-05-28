<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/slick.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/slick-theme.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/old_front/assets/css/rtl.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">

    <title>{{$Settings->title}}</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('public/uploads/posts') }}/{{$Settings->fav}}">
</head>
<body>

<div class="loader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
</div>


<div class="header-top" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-9 col-lg-9">
                <div class="header-top-item">
                    <div class="header-top-left">
                        <ul>
                            <li>
                                <a href="tel:{{$Settings->phone1}}">
                                    <i class="icofont-ui-call"></i>
                                    Call :{{$Settings->phone1}}
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{$Settings->email1}}">
                                    <i class="icofont-ui-message"></i>
                                    {{$Settings->email1}}
                                </a>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                {{$Settings->address}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="header-top-item">
                    <div class="header-top-right">
                        <ul>
                            <li>
                                <a href="{{$Settings->facebook}}">
                                    <i class="icofont-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->twitter}}">
                                    <i class="icofont-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$Settings->instagram}}">
                                    <i class="icofont-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="navbar-area sticky-top">

    <div class="mobile-nav">
        <a href="/" class="logo">
            <img src="{{ URL::asset('public/uploads/posts') }}/{{$Settings->logo2}}" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="{{ URL::asset('public/uploads/posts') }}/{{$Settings->logo2}}" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="@if(Request::segment(1) != ""){{url('/')}}@endif#home" class="nav-link ">الرئيسية</a>

                        </li>
                        <li class="nav-item">
                        <a href="@if(Request::segment(1) != ""){{url('/')}}@endif#about" class="nav-link">نبذة عنا</a>
                        </li>

                        <li class="nav-item">
                        <a href="@if(Request::segment(1) != ""){{url('/')}}@endif#Services" class="nav-link">الخدمات</a>

                        </li>

                        <li class="nav-item">
                        <a href="@if(Request::segment(1) != ""){{url('/')}}@endif#lab_devices" class="nav-link">اجهزة المعمل</a>

                        </li>

                        <li class="nav-item">
                        <a href="@if(Request::segment(1) != ""){{url('/')}}@endif#partner" class="nav-link">التعاقدات</a>

                        </li>
                        <li class="nav-item">
                        <a href="@if(Request::segment(1) != ""){{url('/')}}@endif#contactus" class="nav-link">تواصل معنا</a>
                        </li>
                        <li class="nav-item">
                            <a href="home-sample-collection-request" class="nav-link">طلب سحب عينه منزلى</a>
                        </li>

                        @if(!auth()->guard('subscribers')->check() && !auth()->guard('doctors')->check())
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">تسجيل الدخول</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{url('doctor-login')}}" class="nav-link">دخول كطبيب</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('client-login')}}" class="nav-link">دخول كعميل</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(auth()->guard('subscribers')->check() )
                            <li class="nav-item">
                                <a href="{{url('Client-Analysis')}}" class="nav-link">نتائج التحاليل</a>
                            </li>
                        @endif
                        @if(auth()->guard('doctors')->check() )
                            <li class="nav-item">
                                <a href="{{url('Doctor-Analysis')}}" class="nav-link">نتائج التحاليل</a>
                            </li>
                        @endif

                        @if(auth()->guard('subscribers')->check() )
                            <li class="nav-item">
                                <a href="{{url('client-logout')}}" class="nav-link">تسجيل خروج</a>
                            </li>
                        @endif

                        @if(auth()->guard('doctors')->check() )
                            <li class="nav-item">
                                <a href="{{url('doctor-logout')}}" class="nav-link">تسجيل خروج</a>
                            </li>
                        @endif

                    </ul>

                </div>
            </nav>
        </div>
    </div>
</div>
