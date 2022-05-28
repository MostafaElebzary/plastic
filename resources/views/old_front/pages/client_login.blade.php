@extends('old_front.layout.master')
@section('content')


    <div class="signup-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 pl-0">
                    <div class="signup-left">
                        <img src="{{url('public/old_front/')}}assets/img/signup-bg.jpg" alt="Login">
                    </div>
                </div>
                <div class="col-lg-6 ptb-100">
                    <div class="signup-item">
                        <div class="signup-head">
                            <h2>تسجيل دخول العملاء</h2>
                        </div>
                        <div class="signup-form">
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
                            <form action="{{url('client-login')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="item_code">رقم العميل QRCode</label>
                                            <input type="number" name="item_code" id="item_code" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="pass">كلمة المرور</label>

                                            <input type="password" name="password" class="form-control" id="pass">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn signup-btn">تسجيل</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
