<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{ config('app.name') }}</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        @if (LaravelLocalization::getCurrentLocale() == 'ar') @include('admin.layouts.ar.head') @else @include('admin.layouts.en.head') @endif

        
    </head>
<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    <div id="wrapper">
        @include('admin.layouts.ar.header')
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                @if (LaravelLocalization::getCurrentLocale() == 'ar') @include('admin.layouts.ar.sidebar') @else @include('admin.layouts.en.sidebar') @endif
                @yield('content')
            </div>
            @include('admin.layouts.ar.footer')
        </div>
    </div>
    @if (LaravelLocalization::getCurrentLocale() == 'ar') @include('admin.layouts.ar.footer-script') @else @include('admin.layouts.en.footer-script') @endif
</body>
</html>