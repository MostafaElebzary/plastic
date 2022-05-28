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

    <div class="page-content">

        <!--service details start-->

        <section id="about_us">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-12 pe-md-6">
                        <div class=" position-relative">
                            <div class="me-sm-8 mb-10">
                                {{--                                $about              --}}
                                <img class="img-fluid img-border box-shadow w-100"
                                     src="{{url('public/uploads/'.$data->photo)}}" alt="">
                            </div>
                            <div class="position-absolute bottom-0 ms-8 mb-n10">
                                <img class="img-fluid img-border box-shadow z-index-1"
                                     src="{{url('public/uploads/'.$data->photo2)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mt-6 mt-lg-0">
                        <div class="section-title">
                            <h2 class="title">{{$data->append_title}}</h2>
                            <p class="mb-0">
                                {!! $data->append_content !!}
                            </p>
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <!--service details end-->

    </div>




@endsection
