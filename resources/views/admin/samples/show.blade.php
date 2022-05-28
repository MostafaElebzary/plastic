@extends('admin.layouts.master')

@section('css')
    @if (Request::segment(1) == 'ar')
        <!-- DataTables -->
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/buttons.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet"
              type="text/css">
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/alertify/css/alertify.css') }}" rel="stylesheet"
              type="text/css">
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/magnific-popup.css') }}"
              rel="stylesheet" type="text/css">

    @else
        <!-- DataTables -->
        <link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/buttons.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
    @endif
@endsection

@section('breadcrumb')
    <h1 class="page-title">طلب تحديد موعد</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid" dir="rtl">
            <div class="card m-b-20">
                <div class="card-body">
                    @if (session()->has('msg'))
                        <div class="alert alert-success">
                            {{session()->get('msg')}}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="profile-widget text-center">
                                <h5><?php echo $data->item_code; ?></h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left"><strong>الاسم :</strong></td>
                                            <td class="text-center"><?php echo $data->name; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>رقم الهاتف :</strong></td>
                                            <td class="text-center"><?php echo $data->phone; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>اسم الشركة :</strong></td>
                                            <td class="text-center"><?php echo $data->comp_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>العنوان :</strong></td>
                                            <td class="text-center"><?php echo $data->address; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>البريد الالكتروني :</strong></td>
                                            <td class="text-center"><?php echo $data->email; ?></td>
                                        </tr>

                                        <tr>
                                            <td class="text-left"><strong>الميعاد :</strong></td>
                                            <td class="text-center"><?php echo $data->appointment; ?></td>
                                        </tr>

                                        <tr>
                                            <td class="text-left"><strong>المنتج :</strong></td>
                                            <td class="text-center">
                                                <?php 
                                                    $products = explode(',', $data->products);
                                                    foreach ($products as $key => $prod) {
                                                        echo $prod .'<br>'; 
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>نوع المنتج :</strong></td>
                                            <td class="text-center"><?php echo $data->type; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>الملاحظات :</strong></td>
                                            <td class="text-center"><?php echo $data->comments; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong> تاريخ الانشاء :</strong></td>
                                            <td class="text-center"><?php echo $data->created_at; ?></td>
                                        </tr>
                                        <tr>

                                            <td class="text-center"></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>

                    </div>
                </div>
            </div>
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->

    <div id="addModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">اضافة جديده</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" dir="rtl">

                    <form method="post" action="{{ route('admin.create_family.submit') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">الاسم</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="" name="name" required>
                                        <input class="form-control" type="hidden" value="{{$data->id}}"
                                               name="subscriber_id" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">العنوان</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value=""
                                               name="address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">درجة
                                        القرابة</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value=""
                                               name="relation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">رقم الهاتف
                                        1</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="tel" value="" name="phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">رقم الهاتف
                                        2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="tel" value="" name="phone2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label"> العمر</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="number" value="" name="age">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="addPointsModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">اضافة / خصم نقاط</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" dir="rtl">

                    <form method="post" action="{{ route('admin.create_notes.submit') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">خصم / اضافة</label>
                                    <div class="col-sm-12">
                                        <select name="type" class="form-control" id="">
                                            <option value="0">خصم</option>
                                            <option value="1">اضافة</option>
                                        </select>
                                        <input class="form-control" type="hidden" value="{{$data->id}}"
                                               name="subscriber_id" required>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">النقاط</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="number" value=""
                                               name="points" id="points" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">الطبيب (ان
                                        وجد)</label>
                                    <select name="doctor_id" class="form-control" id="">
                                        <option value="">لا يوجد</option>
                                        @foreach(\App\Models\Service::all() as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">الشرح</label>
                                    <div class="col-sm-12">
                                        <textarea name="description" id="" class="form-control"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="addAnalysisModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">اضافة جديده</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" dir="rtl">

                    <form method="post" action="{{ route('admin.create_analysis.submit') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="example-text-input" class="col-sm-12 col-form-label">نتيجه التحليل</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" value="" name="file" required>
                                    <input class="form-control" type="hidden" value="{{$data->id}}"
                                           name="subscriber_id" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card card-outline-info">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">تعديل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" dir="rtl">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    @if (Request::segment(1) == 'ar')
        <!-- Required datatable js -->
        <script src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script
            src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/ar/plugins/alertify/js/alertify.js') }}"></script>
        <script
            src="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/ar/pages/lightbox.js') }}"></script>

    @else
        <!-- Required datatable js -->
        <script src="{{ URL::asset('public/adminAssets/en/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script
            src="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    @endif
@endsection

@section('script-bottom')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
            $('#datatable2').DataTable();
        });
        $(".edit-Advert").click(function () {
            var id = $(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('admin/edit_family')}}",
                data: {"id": id},
                success: function (data) {
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })
        $("#btn_delete").click(function (event) {
            event.preventDefault();
            var id = $(this).data('id')
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
                            url: "{{route('admin.delete_family')}}",
                            type: 'post',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'get',
                                "_token": token,
                            },
                            success: function (data) {
                                if (data.msg == "Success") {
                                    location.reload();
                                    alertify.log("done");
                                } else {
                                    alertify.log(data);
                                }
                            },
                            fail: function (xhrerrorThrown) {

                            }
                        });
                } else {
                    console.log(isConfirm);
                }
            });


        });
        $("#btn_analysis_delete").click(function (event) {
            event.preventDefault();
            var id = $(this).data('id')
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
                            url: "{{route('admin.delete_analysis')}}",
                            type: 'post',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'get',
                                "_token": token,
                            },
                            success: function (data) {
                                if (data.msg == "Success") {
                                    location.reload();
                                    alertify.log("done");
                                } else {
                                    alertify.log(data);
                                }
                            },
                            fail: function (xhrerrorThrown) {

                            }
                        });
                } else {
                    console.log(isConfirm);
                }
            });


        });

    </script>
@endsection
