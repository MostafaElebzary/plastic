@extends('front.layout.master')
@section('content')



    <!--page title start-->

    <section class="page-title parallaxie" data-bg-img="{{asset('public/uploads/posts')}}/{{$Settings->breadcrumb}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="white-bg p-md-5 p-3 d-inline-block">
                        <h1 class="text-theme">{{$title}} <span class="text-black"></span></h1>
                        <nav aria-label="breadcrumb" class="page-breadcrumb border-top border-light pt-3 mt-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                            class="las la-home me-1"></i>{{trans('lang.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
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
             <h2 class="title">{{$title}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{trans('lang.client_name')}}</th>
                                <th>{{trans('lang.date')}}</th>
                                <th>{{trans('lang.result')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $key => $result)
                                <tr>
                                    <td>{{$result->subscriber ? $result->subscriber->name : "تم حذف العميل"}} </td>
                                    <td>{{$result->created_at}}</td>
                                    <td><a
                                            href="{{url('public/uploads/' . $result->file)}}"
                                            target="_blank">{{trans('lang.see_result')}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>

        <!--project end-->

    </div>






@endsection
