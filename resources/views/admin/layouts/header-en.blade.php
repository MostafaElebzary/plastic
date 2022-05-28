<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <!--<a href="index" class="logo text-center">Admiria</a>-->
            <a href="index" class="logo"><img src="{{asset('public/uploads/posts')}}/{{$Settings->logo1}}" height="36" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>

                <li>
                    <a href="{{url('/admin')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Home')}}</span></a>
                </li>

                <li>
                    <a href="{{url('admin/pages')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Pages')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/sliders')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Slider')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/posts')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Services')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/services')}}" class="waves-effect"><i class=" mbri-edit"></i><span> Doctors</span> </a>
                </li>

{{--                <li>--}}
{{--                    <a href="{{url('admin/blogs')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Blog')}}</span> </a>--}}
{{--                </li>--}}

{{--                @can("categories")--}}
{{--                <li>--}}
{{--                    <a href="{{url('admin/category')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Categories')}}</span> </a>--}}
{{--                </li>--}}
{{--                @endcan--}}

                <li>
                    <a href="{{url('admin/parents')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Main-Categories')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/contacts')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Messages')}}</span> </a>
                </li>

{{--                <li>--}}
{{--                    <a href="{{url('admin/inquires')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Messages')}}</span> </a>--}}
{{--                </li>--}}

                <li>
                    <a href="{{url('admin/partners')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Partners')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/languages')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Languages')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/settings')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Settings')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/roles')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Permissions')}}</span> </a>
                </li>

                <li>
                    <a href="{{url('admin/admins')}}" class="waves-effect"><i class=" mbri-edit"></i><span> {{__('lang.Admin_Admins')}}</span> </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->
