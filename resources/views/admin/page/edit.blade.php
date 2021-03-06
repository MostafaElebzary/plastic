@extends('admin.layouts.master')

@section('css')
@if (Request::segment(1) == 'ar')
<link href="{{ URL::asset('public/adminAssets/ar/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
@else
<link href="{{ URL::asset('public/adminAssets/en/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
@endif
@endsection

@section('breadcrumb')
<h1 class="page-title">الصفحات</h1>
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

                    <form action="{{ route('admin.edit_page.submit') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#arabic" role="tab">عربي</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#english" role="tab">انجليزى</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#other" role="tab">اخرى</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="arabic" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">العنوان</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" value="{{ $data->title }}" name="title" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">المحتوى</label>
                                            <div class="col-sm-12">
                                                <textarea id="textarea" class="form-control summernote" name="content" required>{{$data->content}}</textarea>
                                            </div>
                                        </div>
  
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane  p-3" id="english" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label"> العنوان انجليزي</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" value="{{ $data->title_en }}" name="title_en" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">المحتوى انجليزي</label>
                                            <div class="col-sm-12">
                                                <textarea id="textarea" class="form-control summernote" name="content_en" required>{{$data->content_en}}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane p-3" id="other" role="tabpanel">
                                <div class="row">

                                    <div class="col-lg-4">
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

                                        @if ($data->id == 1)
                                        <div class="form-group text-center">
                                            <label class="pull-right">صورة</label>
                                            <input type="file" class="filestyle" name="photo" id="photo_link" data-buttonname="btn-secondary">
                                            <br>
                                            @if ($data->photo == Null)
                                                <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="https://via.placeholder.com/200x150/EFEFEF/AAAAAA&amp;text=no+image" data-holder-rendered="true">
                                            @else
                                                <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{ URL::asset('public/uploads/') }}/{{$data->photo}}" data-holder-rendered="true">
                                            @endif
                                        </div>

                                            <div class="form-group text-center">
                                            <label class="pull-right">صورة2</label>
                                            <input type="file" class="filestyle" name="photo2" id="photo_link2" data-buttonname="btn-secondary">
                                            <br>
                                            @if ($data->photo2 == Null)
                                                <img class="img-thumbnail" id="get_photo_link2" style="width: 200px;" src="https://via.placeholder.com/200x150/EFEFEF/AAAAAA&amp;text=no+image" data-holder-rendered="true">
                                            @else
                                                <img class="img-thumbnail" id="get_photo_link2" style="width: 200px;" src="{{ URL::asset('public/uploads/') }}/{{$data->photo2}}" data-holder-rendered="true">
                                            @endif
                                        </div>
                                        @endif

                                        @if ($data->id == 2)
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Lat</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" value="{{ $data->lat }}" name="lat">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Lng</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" value="{{ $data->lng }}" name="lng">
                                            </div>
                                        </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
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
    </script>
@endsection
