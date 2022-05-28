@extends('admin.layouts.master')

@section('css')
@if (Request::segment(1) == 'ar')
<!-- DataTables -->
<link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/ar/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">
@else
<!-- DataTables -->
<link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/en/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/en/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/en/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">
@endif
@endsection

@section('breadcrumb')
<h1 class="page-title">العملاء</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid" dir="rtl">
            <div class="card m-b-20">
                <div class="card-body">


                    <div class="m-b-30">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="{{ url('/admin/create_subscriber/') }}" class="btn btn-purple waves-effect waves-light" role="button">اضف جديد</a>
                                <a href="{{ url('/admin/import_products/') }}" class="btn btn-purple waves-effect waves-light" role="button"> اضافة مجموعه </a>
                                <a href="#" id="btn_delete" data-token="{{ csrf_token() }}" class="btn btn-danger waves-effect waves-light" role="button">حذف</a>
                            </div>

                            <div class="col-sm-7">
                                <form action="{{ route('admin.filter_subscriber.submit') }}" id="fillter-branches" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="text" value="" id="itm_code" placeholder="رقم المريض" name="itm_code" autocomplete="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="number" value="" id="phone" placeholder="رقم الهاتف" name="phone" autocomplete="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="text" value="" id="name" placeholder="الاسم" name="name" autocomplete="false">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('msg'))
                        <div class="alert alert-success">
                                {{session()->get('msg')}}
                        </div>
                    @endif

                    <table id="tech-companies-1" class="table  table-striped" cellspacing="0">
                        <thead>
                        <tr>
                            <th style="width: 25px;">#</th>
                            <th style="width: 25px;"><input type="checkbox" id="checker"></th>
                            <th>رقم المريض</th>
                            <th>الاسم</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item=>$row)
                            <tr>
                                <td>{{$item+1}}</td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="{{$row->id}}" name="check_delete{}" id="customControlInline{{$item+1}}">
                                        <label class="custom-control-label" for="customControlInline{{$item+1}}"></label>
                                    </div>
                                </td>
                                <td>{{$row->item_code}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->address}}</td>
                                <td>
                                    <a href="{{ url('/admin/show_subscriber/'.$row->id) }}" class="btn btn-purple btn-sm waves-effect waves-light"><i class="ti-eye"></i></a>
                                    <a href="{{ url('/admin/edit_subscriber/'.$row->id) }}" class="btn btn-info btn-sm waves-effect waves-light"><i class="ti-pencil-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                {{ $data->onEachSide(5)->links() }}
            </div>
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
    @if (Request::segment(1) == 'ar')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/alertify/js/alertify.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/pages/lightbox.js') }}"></script>
    @else
    <!-- Required datatable js -->
    <script src="{{ URL::asset('public/adminAssets/en/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/alertify/js/alertify.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/pages/lightbox.js') }}"></script>
    @endif
@endsection

@section('script-bottom')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            ordering: false
        });
        $('#datatable2').DataTable({
            paging: false,
            searching: true,
            ordering: false,
            info: false
        });
    });

    $('#itm_code').keydown(function(e) {
        if ((e.keyCode || e.which) == 39)
            {
                this.form.submit();
            }
    });

    $('#name').blur(function(e) {
        this.form.submit();
    });

    $('#phone').blur(function(e) {
        this.form.submit();
    });

    $("#checker").click(function(){
        var items = document.getElementsByTagName("input");

        for(var i=0; i<items.length; i++){
            if(items[i].type=='checkbox') {
                if (items[i].checked==true) {
                    items[i].checked=false;
                } else {
                    items[i].checked=true;
                }
            }
        }

    });

    $("#btn_delete").click(function(event){
        event.preventDefault();
        var checkIDs = $("#tech-companies-1 input:checkbox:checked").map(function(){
            return $(this).val();
        }).get(); // <----

        if (checkIDs.length > 0) {
            var token = $(this).data("token");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                confirmButtonText: 'Yes, delete it!'
            }).then(function (isConfirm) {
                if (isConfirm.value) {
                    $.ajax(
                    {
                        url: "{{route('admin.delete_subscriber')}}",
                        type: 'post',
                        dataType: "JSON",
                        data: {
                            "id": checkIDs,
                            "_method": 'post',
                            "_token": token,
                        },
                        success: function (data) {
                            if(data.msg == "Success") {
                                location.reload();
                                alertify.log("Standard log message");
                            } else {
                                alertify.log("Standard log message");
                            }
                        },
                        fail: function(xhrerrorThrown){

                        }
                    });
                } else {
                    console.log(isConfirm);
                }
            });
        }

    });
</script>
@endsection
