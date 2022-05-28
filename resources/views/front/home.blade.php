@extends('front.layout.master')
@section('css')

    <style>
        .truncate {
            display: -webkit-box;
            max-width: 450px;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;

        }
    </style>
@endsection
@section('content')

    @foreach($sliders as $slider)
        <!-- Banner -->
        <div class="banner-area mySlides fade" style="background-image: url('{{$slider->getPhoto()}}');">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-content">
                            <h1>{{$slider->append_title1}} </h1>
                            <p>{{$slider->append_title2}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->
    @endforeach
    <!-- About -->
    <section class="about-area about-area-three ptb-100" id="about_us">
        <div class="container">
            <div class="row align-iems-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span class="sub-title">{{trans('lang.About Us')}}</span>
                        <h2>{{$about_us->append_title}}</h2>
                    </div>
                    <div class="about-content">
                        <p> {!! $about_us->append_content !!}</p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img-wrap">
                        <div class="about-img-slider owl-theme owl-carousel">
                            <div class="about-img-item">
                                <img src="{{url('public/uploads/'.$about->photo)}}" alt="About">
                            </div>
                            <div class="about-img-item">
                                <img src="{{url('public/uploads/'.$about->photo2)}}" alt="About">
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

    <!-- Service -->
    <section class="service-area-two pt-100 pb-70" id="services">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">{{trans('lang.Services')}}</span>
                <h2>{{trans('lang.Services We Offer You From Our Company')}}</h2>
            </div>
            <div class="row">
                <div class="offer-slider owl-theme owl-carousel">
                    @foreach($services as $service)
                        <div class="offer-item">
                            <div class="offer-top">
                                <img src="{{$service->getPhoto() }}" alt="Offer">
                                <br>
                            </div>
                            <div class="offer-bottom">
                                <h3>
                                    <a href="{{url('service/'.$service->id)}}"> {{$service->append_title}}</a>
                                </h3>

                                <div class="truncate">{!! $service->append_content !!}
                                </div>

                                <a class="offer-link"
                                   href="{{url('service/'.$service->id)}}">{{trans('lang.Read More')}}
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                            <div class="offer-shape">
                                <img src="{{ URL::asset('public/new_front/ar')}}/img/home-two/offer-shape.png"
                                     alt="Offer">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Service -->

    <!-- Blog -->
    <section class="blog-area blog-area-two pt-100 pb-70" id="products">
        <div class="container">
            <div class="section-title">
                <h2>{{trans('lang.Our Products')}}</h2>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item">
                            <a href="{{url('product/'.$product->id)}}">
                                <img src="{{ $product->getPhoto()  }}" alt="Blog">
                            </a>
                            <div class="blog-inner">
                                <h3>
                                    <a href="{{url('product/'.$product->id)}}">
                                        {{$product->append_title}} </a>
                                </h3>
                                <a class="blog-link" href="{{url('product/'.$product->id)}}">
                                    {{trans('lang.Read More')}}
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <!-- Social -->
    <div class="social-area social-area-two pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="social-img">
                        <img src="{{$about->getPhoto() }}" alt="Social">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="social-content">
                        <div class="section-title">
                            <h2>{{$about->append_title}}</h2>
                        </div>
                        <p>{!! $about->append_content !!}.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Social -->

    <!-- Logo -->
    <div class="logo-area logo-area-two pb-70" id="partners">
        <div class="container">
            <div class="row">
                @foreach($partners as $partner)
                <div class="col-lg-5">
                    <div class="logo-item">
                        <img src="{{ $partner->getPhoto()}}" alt="{{$partner->title}}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Logo -->


@endsection
