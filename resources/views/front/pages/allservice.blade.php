@extends('front.layout.master')
@section('content')

    <!--page title start-->

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h1 class="text-theme">{{trans('lang.Our_special_services')}} <span class="text-black"></span></h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                            class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{trans('lang.Our_special_services')}}</li>
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
              <div class="row align-items-center">

                @foreach($posts as $key=> $post)

                    <div class="col-lg-4 col-md-6 mb-3">
                    <div class="service-item style-3 text-center">
                        <div class="service-img">
                        <img class="img-fluid" src="{{$post->getPhoto()}}" alt="">
                        </div>
                        <div class="service-desc white-bg shadow-none">
                        <div class="service-title">
                            <h4>{{$post->append_title}}</h4>
                        </div>
                        <div class="border-top border-light"> <a class="btn-link text-black" href="{{url('service/'.$post->id)}}">{{trans('lang.product_more')}}</a> 
                        </div>
                        </div>
                    </div>
                    </div>

                @endforeach

              </div>
            </div>
        </section>

        <!--service details end-->

    </div>




@endsection
