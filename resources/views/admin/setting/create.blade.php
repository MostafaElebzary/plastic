@extends('admin.layouts.master')

@section('css')
    @if (Request::segment(1) == 'ar')
        <link href="{{ URL::asset('public/adminAssets/ar/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
    @else
        <link href="{{ URL::asset('public/adminAssets/en/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
    @endif
@endsection

@section('breadcrumb')
    <h3 class="page-title">الاعدادات</h1>
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

                            <form action="{{ route('admin.add_setting.submit') }}" method="post" enctype="multipart/form-data">

                                @csrf
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

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">العنوان</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="title" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">العنوان بالانجليزي</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="title_en" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">رقم الموبايل 1</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="phone1" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">رقم الموبايل 2</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="phone2">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">البريد الالكتروني 1</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="email1" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">البريد الالكتروني 2</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="email2" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">العنوان</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="address" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">العنوان بالانجليزي</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="address_en" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Facebook</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="facebook">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Twitter</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="twitter">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Youtube</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="youtube">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Linkedin</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="linkedin">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Instagram</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="instagram">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Snapchat</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="snapchat">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Meta Keywords</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="meta_keywords" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Meta Description</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"  name="meta_description" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">{{trans('lang.happy_clients')}}</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="number"  name="happy_clients" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">{{trans('lang.experts_doctors')}}</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="number"  name="experts_doctors" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">{{trans('lang.quality_work')}}</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="number"  name="quality_work" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input"
                                                   class="col-sm-12 col-form-label">{{trans('lang.award_winners')}}</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="number" name="award_winners" required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="example-text-input"
                                                   class="col-sm-12 col-form-label">{{trans('lang.gmap_link')}}</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="gmap_link" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input"
                                                   class="col-sm-12 col-form-label">{{trans('lang.work_time')}}</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text"
                                                       name="work_time" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <label class="pull-right">لوجو 1</label>
                                                    <input type="file" class="filestyle" name="logo1" id="photo_link" data-buttonname="btn-secondary" required>


                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <label class="pull-right">لوجو 2</label>
                                                    <input type="file" class="filestyle" name="logo2" id="photo_link2" data-buttonname="btn-secondary" required>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <label class="pull-right">Fav icon</label>
                                                    <input type="file" class="filestyle" name="fav" id="photo_link3" data-buttonname="btn-secondary" required>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <label class="pull-right">Breadcrumb</label>
                                                    <input type="file" class="filestyle" name="breadcrumb" id="photo_link4" data-buttonname="btn-secondary" required>

                                                </div>
                                            </div>
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
                <script src="{{ URL::asset('public/adminAssets/ar/plugins/summernote/summernote-bs4.js') }}"></script>
            @else
                <script src="{{ URL::asset('public/adminAssets/en/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
                <script src="{{ URL::asset('public/adminAssets/en/plugins/summernote/summernote-bs4.js') }}"></script>
            @endif
        @endsection

        @section('script-bottom')
            <script>

                jQuery(document).ready(function(){
                    $('.summernote').summernote({
                        height: 300,                 // set editor height
                        minHeight: null,             // set minimum height of editor
                        maxHeight: null,             // set maximum height of editor
                        focus: true                 // set focus to editable area after initializing summernote
                    });
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

                document.getElementById('photo_link2').onchange = function (evt) {
                    var tgt = evt.target || window.event.srcElement,
                        files = tgt.files;

                    // FileReader support
                    if (FileReader && files && files.length) {
                        var fr = new FileReader();
                        fr.onload = function () {
                            document.getElementById('get_photo_link2').src = fr.result;
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

                document.getElementById('photo_link3').onchange = function (evt) {
                    var tgt = evt.target || window.event.srcElement,
                        files = tgt.files;

                    // FileReader support
                    if (FileReader && files && files.length) {
                        var fr = new FileReader();
                        fr.onload = function () {
                            document.getElementById('get_photo_link3').src = fr.result;
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

                document.getElementById('photo_link4').onchange = function (evt) {
                    var tgt = evt.target || window.event.srcElement,
                        files = tgt.files;

                    // FileReader support
                    if (FileReader && files && files.length) {
                        var fr = new FileReader();
                        fr.onload = function () {
                            document.getElementById('get_photo_link4').src = fr.result;
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
