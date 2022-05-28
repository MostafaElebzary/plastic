<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <!--<a href="index" class="logo text-center">Admiria</a>-->
            <a href="index" class="logo"><img src="{{asset('public/uploads/posts')}}/{{$Settings->logo1}}" height="70"
                                              alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>

                <li>
                    <a href="{{url('/admin')}}" class="waves-effect"><span> الرئيسية</span><i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/subscribers')}}" class="waves-effect"><span> العملاء</span> <i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/category')}}" class="waves-effect"><span> قائمة التحاليل </span> <i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/samples')}}" class="waves-effect"><span> طلبات تحديد موعد</span> <i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/pages')}}" class="waves-effect"><span> الصفحات</span> <i
                            class=" mbri-edit"></i></a>
                </li>

                <li>
                    <a href="{{url('admin/sliders')}}" class="waves-effect"><span> العروض</span> <i
                            class=" mbri-edit"></i></a>
                </li>

                <li>
                    <a href="{{url('admin/posts')}}" class="waves-effect"><span> الخدمات</span> <i
                            class=" mbri-edit"></i></a>
                </li>

                <li>
                    <a href="{{url('admin/blogs')}}" class="waves-effect"><span> معرض الصور</span> <i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/documentarys')}}" class="waves-effect"><span> الاعتمادات</span> <i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/partners')}}" class="waves-effect"><span> شركاء النجاح</span> <i
                            class=" mbri-edit"></i></a>
                </li>

                <li>
                    <a href="{{url('admin/contacts')}}" class="waves-effect"><span> الشكاوي والمقترحات</span> <i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/languages')}}" class="waves-effect"><span> اللغات </span> <i
                            class=" mbri-edit"></i></a>
                </li>
                <li>
                    <a href="{{url('admin/settings')}}" class="waves-effect"><span> الاعدادات </span> <i
                            class=" mbri-edit"></i></a>
                </li>

                <li>
                    <a href="{{url('admin/admins')}}" class="waves-effect"><span> المديرين</span> <i
                            class=" mbri-edit"></i></a>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
