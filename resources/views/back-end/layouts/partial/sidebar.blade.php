<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}">
                <a href="{{ route('admin_setting') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Setting</span></a>
            </li>


            <li class="nav-item dropdown {{ Request::is('admin/top-advertisement') || Request::is('admin/home-advertisement') || Request::is('admin/sidebar-advertisement-*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_top_ad_show') }}"><i class="fas fa-angle-right"></i> Top Advertisement</a></li>
                    <li class="{{ Request::is('admin/home-advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_ad_show') }}"><i class="fas fa-angle-right"></i> Home Advertisement</a></li>
                    <li class="{{ Request::is('admin/sidebar-advertisement-*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sidebar_ad_view') }}"><i class="fas fa-angle-right"></i> Sidebar Advertisement</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/category/*') || Request::is('admin/sub-category/*') || Route::is('admin/post/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-angle-right"></i> Category</a></li>
                    <li class="{{ Request::is('admin/sub-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sub_category_show') }}"><i class="fas fa-angle-right"></i> Sub Category</a></li>
                    <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i> Post</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/photo-gallery/*') ? 'active' : '' }}">
                <a href="{{ route('admin_photo_gallery_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Photo Gallery</span></a>
            </li>

            <li class="{{ Request::is('admin/video-gallery/*') ? 'active' : '' }}">
                <a href="{{ route('admin_video_gallery_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Video Gallery</span></a>
            </li>



            


        </ul>
    </aside>
</div>