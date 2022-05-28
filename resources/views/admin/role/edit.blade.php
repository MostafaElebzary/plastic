@extends('admin.layouts.master')

@section('css')
@if (Request::segment(1) == 'ar')
@else
@endif
@endsection

@section('breadcrumb')
<h3 class="page-title">المديرين</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid" dir="rtl">
            <div class="card m-b-20">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-0">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.edit_role.submit') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">الاسم</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{$data->name}}" name="name" required>
                                    </div>
                                </div>

                                @php
                                $i = 1;
                                @endphp
                                <label for="example-text-input" class="col-sm-12 col-form-label">الصلاحيات</label>
                                <div class="form-group">
                                    @foreach(config('global.permissions') as $name => $value )
                                    <div class="custom-control custom-checkbox d-inline-block" style="margin-left: 100px">
                                        <input class="custom-control-input" type="checkbox" value="{{$name}}" name="permissions[]" id="{{$i}}" {{in_array($name, $data->permissions)? 'checked' : '' }}>
                                        <label class="custom-control-label" for="{{$i}}">{{$value}}</label>
                                    </div>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                                </div>

                                <input type="hidden" value="{{$data->id}}" name="id" />

                                <div class="form-group m-b-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5">
                                            حفظ
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            الغاء
                                        </button>
                                    </div>
                                </div>
                            </div>

                    </form>

                </div>
            </div>
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
    @if (Request::segment(1) == 'ar')
    <script src="{{ URL::asset('public/adminAssets/ar/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    @else
    <script src="{{ URL::asset('public/adminAssets/en/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    @endif
@endsection

@section('script-bottom')
    <script>
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
@endsection
