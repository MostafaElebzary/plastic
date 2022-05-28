@extends('front.layout.master')
@section('content')

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h2 class="text-theme">{{trans('lang.Client_Login')}} <span class="text-black"></span></h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{trans('lang.Client_Login')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="page-content">

        <!--login start-->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center light-bg">
                        <div class="p-lg-5 px-3 py-5">
                            <img class="img-fluid" src="{{url('public/new_front/ar')}}/images/login-img.png" alt="">
                            <div class="section-title mb-0 mt-5">
{{--                                <h2 class="title">Welcome To The Labortech</h2>--}}
{{--                                <p class="mb-0 text-light">Any Question or Remarks ? Just Write Us a Message!</p>--}}
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 white-bg">
                        <div class="p-lg-5 px-3 py-5">
                            <h3 class="mb-4">{{trans('lang.Client_Login')}}</h3>
                            @if(Session::has('errors'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as  $value)

                                        <p>{{ $value }}</p>

                                    @endforeach
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger" role='alert'>
                                    {{session('error')}}
                                </div>
                            @endif
                            <form id="" method="post" action="{{url('client-login')}}">
                                @csrf
                                <div class="messages"></div>
                                <div class="form-group">
                                    <input id="form_name" type="text" name="item_code" class="form-control" placeholder="{{trans('lang.client-item')}}" required="required" data-error="Num is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input id="form_password" type="password" name="password" class="form-control" placeholder="{{trans('lang.password')}}" required="required" data-error="Password is required.">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <button type="submit" class="btn btn-theme">{{trans('lang.login')}}</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--login end-->

    </div>





@endsection
