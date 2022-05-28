@extends('front.layout.master')
@section('content')


    <!--page title start-->

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h1 class="text-theme">{{trans('lang.gallery')}} <span class="text-black"></span></h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{trans('lang.gallery')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--page title end-->


    <div class="page-content">

        <!--project start-->

        <section>
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <div class="section-title">
{{--                            <h2 class="title">We've Done A Lot's, Let's Check Some<br>Our Latest Research</h2>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="owl-carousel no-pb popup-gallery" data-dots="false" data-items="5" data-md-items="3" data-sm-items="2" data-xs-items="1" data-margin="10">
                           @foreach($galleries as $gallery)
                            <div class="item">
                                <div class="cases-item position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{$gallery->getPhoto()}}" alt="">
                                    <a class="popup-img" href="{{$gallery->getPhoto()}}"> <i class="las la-plus"></i>
                                    </a>
                                    <div class="cases-title"> <span>{{$gallery->append_title}}</span>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--project end-->

    </div>

@endsection
