@if(Request::segment(1) == 'en')
<script src="{{ URL::asset('public/adminAssets/en/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/en/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/en/js/modernizr.min.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/en/js/jquery.slimscroll.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/en/js/waves.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/en/js/jquery.nicescroll.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/en/js/jquery.scrollTo.min.js') }}"></script>
@else
<script src="{{ URL::asset('public/adminAssets/ar/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/ar/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/ar/js/modernizr.min.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/ar/js/jquery.slimscroll.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/ar/js/waves.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/ar/js/jquery.nicescroll.js') }}"></script>
<script src="{{ URL::asset('public/adminAssets/ar/js/jquery.scrollTo.min.js') }}"></script>


@endif

 @yield('script')

 <!-- App js -->
 @if(Request::segment(1) == 'en')
 <script src="{{ URL::asset('public/adminAssets/en/js/app.js') }}"></script>
 @else
 <script src="{{ URL::asset('public/adminAssets/ar/js/app.js') }}"></script>
 @endif
 
@yield('script-bottom')
