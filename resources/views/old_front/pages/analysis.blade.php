@extends('old_front.layout.master')
@section('content')


    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{$title}}</h2>
                    <ul>
                        <li>
                            <a href="/">الرئيسية</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{$title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="faq-area pt-100 pb-70">
        <div class="container">
            <div class="row faq-wrap">
                <div class="col-lg-12">
                    <div class="faq-head">
                        <h2>{{$title}}</h2>
                    </div>
                    <div class="faq-item">
                        <ul class="accordion">
                            @foreach($results as $key => $result)
                                <li class="wow fadeInUp" data-wow-delay=".{{$key+3}}s">
                                    <h3 class="faq-head">
                                        الاسم: {{$result->subscriber ? $result->subscriber->name : "تم حذف العميل"}}  </h3>
                                    <div class="faq-content">
                                        <p> االتاريخ : {{$result->created_at}} <br> <a
                                                href="{{url('public/uploads/' . $result->file)}}" target="_blank">رؤية
                                                التحليل</a>
                                        </p>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </section>




@endsection
