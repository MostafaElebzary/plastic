@extends('old_front.layout.master')
@section('content')


    <div class="page-title-area page-title-five">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>طلب سحب عينة منزلى </h2>
                    <ul>
                        <li>
                            <a href="/">الرئيسية</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>طلب سحب عينة منزلى</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="drop-area pt-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="drop-item drop-img">
                        <div class="drop-left">
                            <h2>طلب سحب عينة منزلى.</h2>
                            <form action="{{url('pull-request')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required=""
                                                   data-error="من فضلك ادخل الاسم" placeholder="الاسم">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">
                                            <input type="text" name="age" id="age" class="form-control" required=""
                                                   data-error="من فضلك ادخل العمر" placeholder="العمر">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" class="form-control" required=""
                                                   data-error="من فضلك ادخل رقم الهاتف" placeholder="رقم الهاتف">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">
                                            <input type="text" name="address" id="address" class="form-control" required=""
                                                   data-error="من فضلك ادخل العنوان بالتحديد" placeholder="العنوان">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">
                                            <textarea name="comments" id="comments" class="form-control" required="" placeholder="ادخل محتوى التحليل"></textarea>

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">
                                            <label for="image">ارفع صورة ان وجد</label>
                                            <input type="file" name="image" id="image" accept="image/*"
                                                     placeholder="ارفع صورة ان وجد">

                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <button type="submit" class="drop-btn">
                                            ارسال
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
