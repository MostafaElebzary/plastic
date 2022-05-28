@extends('old_front.layout.master')
@section('content')

    <div class="home-slider owl-theme owl-carousel">
        @foreach($sliders as $row)
            <div class="slider-item slider-item-img" style="background-color:transparent;!important;">
                <img src="{{ URL::asset('public/uploads/') }}/{{$row->photo}}" alt="Shape">


            </div>
        @endforeach
    </div>


    <div class="counter-area">
        <div class="container">
            <div class="row counter-bg">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="counter-item">
                        <i class="icofont-people"></i>
                        <h3 dir="ltr">
                            <span class="odometer" data-count="{{$Settings->happy_clients}}">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>عملاؤنا</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="counter-item">
                        <i class="icofont-doctor-alt"></i>
                        <h3 dir="ltr">
                            <span class="odometer" data-count="{{$Settings->experts_doctors}}">00</span>
                        </h3>
                        <p>الاطباء</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="counter-item">
                        <i class="icofont-badge"></i>
                        <h3 dir="ltr">
                            <span class="odometer" data-count="{{$Settings->award_winners}}">00</span>
                        </h3>
                        <p>الجوائز</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="about-area pt-100 pb-70" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-left">
                            <img src="{{ URL::asset('public/uploads') }}/{{$about->photo}}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-item about-right">
                        {{--                        <img src="{{ URL::asset('public/uploads') }}/{{$about->photo2}}" alt="About">--}}
                        <h2>{{$about->title}}</h2>
                        <p> {!! $about->content !!} </p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="services-area pb-70" id="Services">
        <div class="container">
            <div class="section-title">
                <h2>الخدمات</h2>
            </div>
            <div class="row">
                @foreach($posts as $key=>$post)
                    <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".{{$key+3}}s">
                        <div class="service-item">
                            <div class="service-front">
                                <img src="{{ URL::asset('public/uploads/posts') }}/{{$post->photo}}" alt="">
                                <h3>{{$post->title}}</h3>
                                <p></p>
                            </div>
                            <div class="service-end">
                                <img src="{{ URL::asset('public/uploads/posts') }}/{{$post->photo}}" alt="">
                                <h3>{{$post->title}}</h3>

                                <a href="{{url('service/'.$post->id)}}">المزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="services-area pb-70" id="lab_devices">
        <div class="container">
            <div class="section-title">
                <h2>اجهزة المعمل</h2>
            </div>
            <div class="row">
                @foreach($lab_devices as $key=>$post)
                    <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".{{$key+3}}s">
                        <div class="service-item">
                            <div class="service-front">
                                <img src="{{ URL::asset('public/uploads/posts') }}/{{$post->photo}}" alt="">
                                <h3>{{$post->title}}</h3>
                                <p></p>
                            </div>
                            <div class="service-end">
                                <img src="{{ URL::asset('public/uploads/posts') }}/{{$post->photo}}" alt="">
                                <h3>{{$post->title}}</h3>

                                <a href="{{url('lab-equipments/'.$post->id)}}">المزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="testimonial-area ptb-100" id="partner">
        <div class="container">
            <div class="testimonial-wrap">
                <h2>التعاقدات</h2>
                <div class="testimonial-slider owl-theme owl-carousel">
                    @foreach($partners as $key=>$partner)
                        <div class="testimonial-item">
                            <img src="{{ URL::asset('public/uploads') }}/{{$partner->photo}}" alt="Testimonial">
                            <h3>{{$partner->title}}</h3>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>



@endsection
