@extends('admin.layouts.master')

@section('css')
    @if (Request::segment(1) == 'ar')
        <!-- DataTables -->
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/buttons.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/datatables/responsive.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/magnific-popup.css') }}"
              rel="stylesheet" type="text/css">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/adminAssets/ar/plugins/morris/morris.css') }}">
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet"
              type="text/css">
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/alertify/css/alertify.css') }}" rel="stylesheet"
              type="text/css">
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
              type="text/css"/>
    @else
        <!-- DataTables -->
        <link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/buttons.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/en/plugins/datatables/responsive.bootstrap4.min.css') }}"
              rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/adminAssets/en/plugins/magnific-popup/magnific-popup.css') }}"
              rel="stylesheet" type="text/css">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/adminAssets/en/plugins/morris/morris.css') }}">
        <link href="{{ URL::asset('public/adminAssets/en/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet"
              type="text/css">
        <link href="{{ URL::asset('public/adminAssets/en/plugins/alertify/css/alertify.css') }}" rel="stylesheet"
              type="text/css">
        <link href="{{ URL::asset('public/adminAssets/en/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
              type="text/css"/>

    @endif
@endsection

@section('breadcrumb')
    <h3 class="page-title">التقارير </h1>
        @endsection

        @section('content')
            <div class="page-content-wrapper">
                <div class="container-fluid" dir="rtl">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="">
                                <form id="fillter-branches"
                                      method="get">

                                    <div class="row">

                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="">من</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="datetime-local"
                                                           value="{{Request::get('from')}}"
                                                           name="from">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="">الى</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="datetime-local"
                                                           value="{{Request::get('to')}}"
                                                           name="to">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group ">
                                                <label for="">العميل</label>
                                                <div class="col-sm-12">
                                                    <select name="subscriber_id" class="form-control" id="">
                                                        <option value="">العميل</option>
                                                        @foreach(\App\Models\Subscriber::all() as $client)
                                                            <option
                                                                @if(Request::get('subscriber_id') == $client->id) selected
                                                                @endif value="{{$client->id}}">{{$client->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group ">
                                                <label for="">الطبيب</label>
                                                <div class="col-sm-12">
                                                    <select name="doctor_id" class="form-control" id="">
                                                        <option value="">الطبيب</option>
                                                        @foreach(\App\Models\Service::all() as $doctor)
                                                            <option
                                                                @if(Request::get('doctor_id') == $doctor->id) selected
                                                                @endif value="{{$doctor->id}}">{{$doctor->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <label for=""> &nbsp; &nbsp; &nbsp; &nbsp; </label>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light"
                                                    role="button">فلتر
                                            </button>
                                        </div>
                                        <div class="col-sm-1">
                                            <label for=""> &nbsp; &nbsp; &nbsp; &nbsp; </label>
                                            <a href="{{url('admin/notes')}}"
                                               class="btn btn-primary waves-effect waves-light"
                                               role="button">الغاء
                                            </a>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <table id="tech-companies-1" class="table  table-striped" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="width: 25px;">#</th>
                                    <th>النوع</th>
                                    <th>العميل</th>
                                    <th>النقاط</th>
                                    <th>الطبيب</th>
                                    <th>الموظف</th>
                                    <th>الشرح</th>
                                    <th>التاريخ والوقت</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data1 as $item=>$row)
                                    <tr>
                                        <td>{{$item+1}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{!! $row->client->name !!}</td>
                                        <td>{{$row->points}}</td>
                                        <td>{!! $row->doctor->title !!}</td>
                                        <td>{!! $row->admin->name !!}</td>
                                        <td>{!!  $row->description ? $row->description : "- - -"!!}</td>
                                        <td>{{$row->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        {{ $data1->onEachSide(5)->links() }}
                    </div>
                </div><!-- container -->
            </div> <!-- Page content Wrapper -->



        @endsection

        @section('script')
            @if (Request::segment(1) == 'ar')
            <!-- Required datatable js -->
                <script
                    src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/jquery.dataTables.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/ar/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
                <script src="{{ URL::asset('public/adminAssets/ar/plugins/alertify/js/alertify.js') }}"></script>
                <script src="{{ URL::asset('public/adminAssets/ar/plugins/select2/js/select2.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/ar/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/dataTables.responsive.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/ar/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/ar/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
                <script src="{{ URL::asset('public/adminAssets/ar/pages/lightbox.js') }}"></script>
            @else
            <!-- Required datatable js -->
                <script
                    src="{{ URL::asset('public/adminAssets/en/plugins/datatables/jquery.dataTables.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/en/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
                <script src="{{ URL::asset('public/adminAssets/en/plugins/alertify/js/alertify.js') }}"></script>
                <script src="{{ URL::asset('public/adminAssets/en/plugins/select2/js/select2.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/en/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/en/plugins/datatables/dataTables.responsive.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/en/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
                <script
                    src="{{ URL::asset('public/adminAssets/en/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
                <script src="{{ URL::asset('public/adminAssets/en/pages/lightbox.js') }}"></script>
            @endif
        @endsection

        @section('script-bottom')
            <script>
                $(document).ready(function () {
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


            </script>

            @php $msg=session()->get("msg"); @endphp
            @if( session()->has("msg"))
                @if( $msg == "Success")
                    <script>
                        alertify.defaults = {
                            autoReset: true,
                            basic: false,
                            notifier: {
                                position: 'top-center'
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
