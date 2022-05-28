@extends('front.layout.master')
@section('content')

    <!--page title start-->

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h1 class="text-theme">@if(session('lang') == 'ar') {{$data->title}} @else {{$data->title_en}} @endif <span class="text-black"></span></h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                            class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">@if(session('lang') == 'ar') {{$data->title}} @else {{$data->title_en}} @endif</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--page title end-->


    <!--body content start-->

    <!-- About -->
    <section class="about-area about-area-three ptb-100" id="about_us">
        <div class="container">
            <div class="row align-iems-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span class="sub-title">{{trans('lang.About Us')}}</span>
                        <h2>{{$data->append_title}}</h2>
                    </div>
                    <div class="about-content">
                        <p> {!! $data->append_content !!}</p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img-wrap">
                        <div class="about-img-slider owl-theme owl-carousel">
                            <div class="about-img-item">
                                <img src="{{url('public/uploads/'.$data->photo)}}" alt="About">
                            </div>
                            <div class="about-img-item">
                                <img src="{{url('public/uploads/'.$data->photo2)}}" alt="About">
                            </div>

                        </div>
                        <div class="about-shape">
                            <img src="{{ URL::asset('public/new_front/ar')}}/img/home-one/about2.png" alt="About">
                            <img src="{{ URL::asset('public/new_front/ar')}}/img/home-one/about4.png" alt="About">
                            <img src="{{ URL::asset('public/new_front/ar')}}/img/home-one/about5.png" alt="About">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About -->




@endsection
