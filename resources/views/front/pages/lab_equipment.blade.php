@extends('front.layout.master')
@section('content')


    <div class="page-title-area page-title-four" style="background-image: url({{url('public/uploads/posts/'.$service->photo)}});!important;">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{$service->title}}</h2>
                    <ul>
                        <li>
                            <a href="/">الرئيسية</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{$service->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="service-details-area ptb-100">
        <div class="container">
            <div class="services-details-img">
                <img src="{{url('public/uploads/posts/'.$service->photo)}}" alt="{{$service->title}}">
                <h2>{{$service->title}}</h2>
                <p> {!! $service->content !!} </p>
            </div>

        </div>
    </div>


@endsection
