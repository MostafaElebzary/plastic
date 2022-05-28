@extends('front.layout.master')
@section('content')


    <!--page title start-->

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h1 class="text-theme">{{trans('lang.Appointment')}} <span class="text-black"></span></h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                            class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">{{trans('lang.Appointment')}}</li>
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
        <section>
            <div class="container">
                <div class="row">

                    <div class="col">
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

                        <form action="{{url('pull-request')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row" >
                                <div class="col-12 col-sm-12 col-lg-6" style="text-align: center" >
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required=""
                                               data-error="من فضلك ادخل الاسم" placeholder="{{trans('lang.name')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control" required=""
                                               data-error="من فضلك ادخل رقم الهاتف" placeholder="{{trans('lang.phone')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="comp_name" id="comp_name" class="form-control" required=""
                                               data-error="اسم الشركة" placeholder="{{trans('lang.comp_name')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                

                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="address" id="address" class="form-control" required=""
                                               data-error="من فضلك ادخل العنوان بالتحديد" placeholder="{{trans('lang.address')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control" required=""
                                               data-error="البريد الالكتروني" placeholder="{{trans('lang.email')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <span>{{trans('lang.pro-appointment')}}</span>
                                        <input type="datetime-local" id="appointment" name="appointment" class="form-control" required="" data-error="تحديد موعد">
                                        
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="type" id="type" class="form-control" required=""
                                               data-error="تحديد موعد" placeholder="{{trans('lang.pro-type')}}">
                                               
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-lg-6">
                                    @php
                                        $mainProducts = \App\Models\Category::whereNull('parent')->get() ;
                                    @endphp
                                    @foreach ($mainProducts as $mkey => $mpro)
                                        <div class="form-group">
                                            <input type="checkbox" name="products[]" value="{{$mpro->append_name}}" id="products{{$mkey}}">
                                            <label for="products{{$mkey}}">
                                                {{$mpro->append_name}}
                                            </label>
                                            @php
                                                $subProducts = \App\Models\Category::where('parent', $mpro->id)->get() ;
                                            @endphp
                                            @if ($subProducts->count() > 0)
                                                @foreach ($subProducts as $skey => $spro)
                                                    <div class="form-group" style="margin: 0px 20px;">
                                                        <input type="checkbox" name="products[]" value="{{$spro->append_name}}" id="products{{$mkey.$skey}}">
                                                        <label for="products{{$mkey.$skey}}">
                                                            {{$spro->append_name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea name="comments" id="comments" class="form-control"
                                                  placeholder="{{trans('lang.comments')}}"></textarea>

                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                                <div class="col-md-12 col-lg-12">
                                    <button type="submit" class="btn btn-theme">
                                        {{trans('lang.send')}}
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!--contact end-->



    </div>


@endsection
