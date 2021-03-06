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

                    <form action="{{ route('admin.edit_setting.submit') }}" method="post" enctype="multipart/form-data">

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
                                        <input class="form-control" type="text" value="{{ $data->title }}" name="title" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">العنوان بالانجليزي</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->title_en}}" name="title_en">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">رقم الموبايل 1</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->phone1 }}" name="phone1" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">رقم الموبايل 2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->phone2 }}" name="phone2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">البريد الالكتروني 1</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->email1 }}" name="email1" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">البريد الالكتروني 2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->email2 }}" name="email2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">العنوان</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->address }}" name="address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">العنوان EN</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->address_en }}" name="address_en">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">الموقع الالكتروني</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->website }}" name="website">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">موقعتا على الخريطة</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->location }}" name="location">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Facebook</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->facebook }}" name="facebook">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Twitter</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->twitter }}" name="twitter">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Youtube</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->youtube }}" name="youtube">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Linkedin</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->linkedin }}" name="linkedin">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Instagram</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->instagram }}" name="instagram">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Snapchat</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->snapchat }}" name="snapchat">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Meta Keywords</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->meta_keywords }}" name="meta_keywords">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Meta Description</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->meta_description }}" name="meta_description">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Meta Description EN</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->meta_description_en }}" name="meta_description_en">
                                    </div>
                                </div>

                                <div style="display: none;">

                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">{{trans('lang.happy_clients')}}</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" type="number"  value="{{ $data->happy_clients }}" name="happy_clients" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">{{trans('lang.experts_doctors')}}</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" type="number"  value="{{ $data->experts_doctors }}" name="experts_doctors" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">{{trans('lang.quality_work')}}</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" type="number"  value="{{ $data->quality_work }}" name="quality_work" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input"
                                            class="col-sm-12 col-form-label">{{trans('lang.award_winners')}}</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" type="number" value="{{ $data->award_winners }}" name="award_winners" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input"
                                           class="col-sm-12 col-form-label">{{trans('lang.gmap_link')}}</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->gmap_link }}" name="gmap_link" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input"
                                           class="col-sm-12 col-form-label">{{trans('lang.work_time')}}</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{ $data->work_time }}"
                                               name="work_time" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text-center">
                                            <label class="pull-right">لوجو 1</label>
                                            <input type="file" class="filestyle" name="logo1" id="photo_link" data-buttonname="btn-secondary">
                                            <br>
                                            @if ($data->logo1 == Null)
                                                <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="" data-holder-rendered="true">
                                            @else
                                                <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{ URL::asset('public/uploads/posts') }}/{{$data->logo1}}" data-holder-rendered="true">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group text-center">
                                            <label class="pull-right">لوجو 2</label>
                                            <input type="file" class="filestyle" name="logo2" id="photo_link2" data-buttonname="btn-secondary">
                                            <br>
                                            @if ($data->logo2 == Null)
                                                <img class="img-thumbnail" id="get_photo_link2" style="width: 200px;" src="https://via.placeholder.com/200x150/EFEFEF/AAAAAA&amp;text=no+image" data-holder-rendered="true">
                                            @else
                                                <img class="img-thumbnail" id="get_photo_link2" style="width: 200px;" src="{{ URL::asset('public/uploads/posts') }}/{{$data->logo2}}" data-holder-rendered="true">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group text-center">
                                            <label class="pull-right">Fav icon</label>
                                            <input type="file" class="filestyle" name="fav" id="photo_link3" data-buttonname="btn-secondary">
                                            <br>
                                            @if ($data->fav == Null)
                                                <img class="img-thumbnail" id="get_photo_link3" style="width: 200px;" src="https://via.placeholder.com/200x150/EFEFEF/AAAAAA&amp;text=no+image" data-holder-rendered="true">
                                            @else
                                                <img class="img-thumbnail" id="get_photo_link3" style="width: 200px;" src="{{ URL::asset('public/uploads/posts') }}/{{$data->fav}}" data-holder-rendered="true">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group text-center">
                                            <label class="pull-right">Breadcrumb</label>
                                            <input type="file" class="filestyle" name="breadcrumb" id="photo_link4" data-buttonname="btn-secondary">
                                            <br>
                                            @if ($data->breadcrumb == Null)
                                                <img class="img-thumbnail" id="get_photo_link4" style="width: 200px;" src="https://via.placeholder.com/200x150/EFEFEF/AAAAAA&amp;text=no+image" data-holder-rendered="true">
                                            @else
                                                <img class="img-thumbnail" id="get_photo_link4" style="width: 200px;" src="{{ URL::asset('public/uploads/posts') }}/{{$data->breadcrumb}}" data-holder-rendered="true">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <input type="hidden" value="{{$data->id}}" name="id" />



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
