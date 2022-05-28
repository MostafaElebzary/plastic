@extends('front.layout.master')
@section('content')


    <!--page title start-->

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h1 class="text-theme">{{trans('lang.Contact_us')}} <span class="text-black"></span></h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item">{{trans('lang.pages')}}
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{trans('lang.Contact_us')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--page title end-->


        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="light-bg">
                            <div class="row text-center">
                                <div class="col-lg-5 col-12">
                                    <div class="section-title mt-6">
                                        <h2 class="title">{{trans('lang.Contact_us')}}</h2>
                                        <p class="mb-0">{{trans('lang.Any Question or Remarks ? Just Write Us a Message!')}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-7 ps-lg-0">
                                    <div class="white-bg px-3 py-5 p-md-6 shadow-sm">
                                        @php $msg=session()->get("msg"); @endphp
                                        @if( session()->has("msg"))
                                            @if( $msg == "Success")
                                                <div class="alert alert-success mb-0">
                                                    {{__('lang.success')}}
                                                </div>
                                                <br>

                                            @elseif ( $msg == "Failed")
                                                <div class="alert alert-danger mb-0">
                                                    {{__('lang.faild')}}
                                                </div>
                                                <br>
                                            @endif
                                        @endif

                                        <form id="" class="row" method="post" action="{{url('contact')}}">
                                            @csrf
                                            <div id="formmessage"></div>
                                            <div class="form-group col-md-6">
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="{{trans('lang.name')}}" required="required">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="{{trans('lang.phone')}}" required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="{{trans('lang.email')}}" required="required">
                                            </div>


                                            <div class="form-group col-md-12">
                                                <textarea id="form_message" name="message" class="form-control" placeholder="{{trans('lang.message')}}" rows="3" required="required"></textarea>
                                            </div>
                                            <div class="col-md-12 text-center mt-4">
                                                <button class="btn btn-theme"><span>{{trans('lang.Send Messages')}}</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 pe-lg-0">
                        <div class="dark-bg px-3 py-5 p-md-5 mt-n15 custom-mt-0 text-white">
                            <div class="contact-media mb-4">
                                <h5 class="text-white">{{trans('lang.address')}}:</h5>
                                <span>{{$Settings->append_address}}</span>
                            </div>
                            <div class="contact-media mb-4">
                                <h5 class="text-white">{{trans('lang.Contact_us')}}:</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2">{{trans('lang.phone')}}: <a href="tel:{{$Settings->phone1}}">{{$Settings->phone1}}</a>
                                    </li>
                                    <li>{{trans('lang.email')}}: <a href="mailto:{{$Settings->email1}}"> {{$Settings->email1}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="contact-media mb-4">
                                <h5 class="text-white">{{trans('lang.Working Hours')}}:</h5>
                                <span>{{$Settings->work_time}}</span>
                            </div>
                            <div class="social-icons">
                                <ul class="list-inline">
                                    @if (!empty($Settings->facebook))<li><a href="{{$Settings->facebook}}"><i class="lab la-facebook-f"></i></a></li> @endif
                                    @if (!empty($Settings->twitter)) <li><a href="{{$Settings->twitter}}"><i class="lab la-twitter"></i></a></li> @endif
                                    @if (!empty($Settings->youtube)) <li><a href="{{$Settings->youtube}}"><i class="lab la-youtube"></i></a></li> @endif
                                    @if (!empty($Settings->snapchat)) <li><a href="{{$Settings->snapchat}}"><i class="lab la-snapchat"></i></a></li> @endif
                                    @if (!empty($Settings->instagram)) <li><a href="{{$Settings->instagram}}"><i class="lab la-instagram"></i></a></li> @endif
                                    @if (!empty($Settings->linkedin)) <li><a href="{{$Settings->linkedin}}"><i class="lab la-linkedin-in"></i></a></li> @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--contact end-->


@endsection
