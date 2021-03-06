@extends('admin.layouts.master')

@section('css')
@if (Request::segment(1) == 'ar')
<!-- DataTables -->
<link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">

<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('public/adminAssets/ar/plugins/morris/morris.css') }}">
<link href="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/ar/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/ar/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@else
<!-- DataTables -->
<link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('public/adminAssets/en/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">

<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('public/adminAssets/en/plugins/morris/morris.css') }}">
<link href="{{ URL::asset('public/adminAssets/en/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/en/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/adminAssets/en/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endif
@endsection

@section('breadcrumb')
<h3 class="page-title">??????????????????</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid" dir="rtl">
            <div class="card m-b-20">
                <div class="card-body">

                    <div class="m-b-30">
                        <a href="javascript:void(#)" class="btn btn-purple waves-effect waves-light" data-toggle="modal" data-target="#addModel" role="button">?????? ????????</a>
                        <a href="#" id="btn_delete" data-token="{{ csrf_token() }}" class="btn btn-danger waves-effect waves-light" role="button">??????</a>
                    </div>

                    <table id="datatable" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="width: 25px;">#</th>
                            <th style="width: 25px;"><input type="checkbox" id="checker"></th>
                            <th>??????????</th>
                            <th>????????????</th>
                            <th>????????????</th>
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
                                <td>{{$row->title}}</td>
                                <td>

                                    @if ($row->link == Null || $row->link == '#')
                                        ---
                                    @else
                                        <a href="{{ $row->link }}" target="_blank">????????????</a>
                                    @endif

                                </td>
                                <td>
                                    @if ($row->photo == Null)
                                        ---
                                    @else
                                        <a class="image-popup-no-margins" title="{{$row->photo}}" href="{{ URL::asset('public/uploads/') }}/{{$row->photo}}"><div class="img-responsive">
                                            <img src="{{ URL::asset('public/uploads/') }}/{{$row->photo}}" width="45">
                                        </div></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(#)" data-id="{{$row->id}}" data-original-title="Edit" class="btn btn-info btn-sm waves-effect waves-light edit-Advert"><i class="ti-pencil-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->

    <!-- sample modal content -->
    <div id="addModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">?????????? ??????????</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                </div>
                <div class="modal-body" dir="rtl">

                    <form method="post" action="{{ route('admin.create_partner.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">??????????????</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="" name="title" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">??????????????</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="" name="link">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group text-center">
                                    <label class="pull-right">???????? ??????????</label>
                                    <input type="file" class="filestyle" name="photo" id="photo_link" data-buttonname="btn-secondary">
                                    <br>
                                        <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="https://via.placeholder.com/200x150/EFEFEF/AAAAAA&amp;text=no+image" data-holder-rendered="true">
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

    <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card card-outline-info">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">?????????? ??????????</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                </div>
                <div class="modal-body" dir="rtl">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection

@section('script')
    @if (Request::segment(1) == 'ar')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/alertify/js/alertify.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/ar/pages/lightbox.js') }}"></script>
    @else
    <!-- Required datatable js -->
    <script src="{{ URL::asset('public/adminAssets/en/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/alertify/js/alertify.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('public/adminAssets/en/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
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

    $(".edit-Advert").click(function(){
        var id=$(this).data('id')
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "GET",
            url: "{{url('admin/edit_partner')}}",
            data: {"id":id},
            success: function (data) {
                $(".bs-edit-modal-lg .modal-body").html(data)
                $(".bs-edit-modal-lg").modal('show')
                $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                    //   $('.bs-edit-modal-lg').empty();
                    $('.bs-edit-modal-lg').hide();
                })
            }
        })
    })

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
        var checkIDs = $("#datatable input:checkbox:checked").map(function(){
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
                        url: "{{route('admin.delete_partner')}}",
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
                            } else {
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

    document.getElementById('photo_link').onchange = function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById('get_photo_link').src = fr.result;
                //alert(fr.result);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    }
</script>

@php $msg=session()->get("msg"); @endphp
@if( session()->has("msg"))
    @if( $msg == "Success")
        <script>
            alertify.defaults = {
                autoReset:true,
                basic:false,
                notifier:{
                    position:'top-center'

                }
            };

            alertify.success("Standard log Success");
        </script>
    @elseif ( $msg == "Failed")
        <script>
            alertify.error("Standard log Failed");
        </script>
    @endif
@endif
@endsection
