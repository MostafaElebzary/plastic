@extends('front.layout.master')
@section('content')

    <!--page title start-->

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h1 class="text-theme">@if(session('lang') == 'ar'){{$service->title}} @else {{$service->title_en}} @endif<span class="text-black"></span></h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                            class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">@if(session('lang') == 'ar') {{$service->title}} @else {{$service->title_en}} @endif</li>
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

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-12 pe-lg-5">
                    </div>
                    <div class="col-lg-10 col-md-12 pe-lg-5">
                        <div class="service-details">


                            <img class="img-fluid w-100 mb-4" src="{{url('public/uploads/posts/'.$service->photo)}}"
                                 alt="@if(session('lang') == 'ar'){{$service->title}} @else {{$service->title_en}}@endif">
                            <h3 class="mb-3">@if(session('lang') == 'ar'){{$service->title}} @else {{$service->title_en}}@endif</h3>
                            <p class="lead">@if(session('lang') == 'ar'){!! $service->content !!} @else {!! $service->content_en !!}@endif</p>

                        </div>
                    </div>
                    <div class="col-lg-1 col-md-12 pe-lg-5">
                    </div>

                </div>
            </div>
        </section>

        <!--service details end-->

    </div>




@endsection
