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


            <li class="{{ Request::is('admin/author/*') ? 'active' : '' }}">
                <a href="{{ route('admin_author_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Author List</span></a>
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


            <li class="nav-item dropdown {{ Request::is('admin/page/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_about_page') }}"><i class="fas fa-angle-right"></i> About</a></li>

                    <li class="{{ Request::is('admin/page/faq') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-angle-right"></i> FAQ</a></li>

                    <li class="{{ Request::is('admin/page/login') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_login_page') }}"><i class="fas fa-angle-right"></i> Login</a></li>

                    <li class="{{ Request::is('admin/page/contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-angle-right"></i> Contact</a></li>

                    <li class="{{ Request::is('admin/page/terms') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_terms_page') }}"><i class="fas fa-angle-right"></i> Terms</a></li>

                    <li class="{{ Request::is('admin/page/privacy') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-angle-right"></i> Privacy</a></li>

                    <li class="{{ Request::is('admin/page/disclaimer') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_disclaimer_page') }}"><i class="fas fa-angle-right"></i> Disclaimer</a></li>
                    
                </ul>
            </li>



            <li class="{{ Request::is('admin/photo-gallery/*') ? 'active' : '' }}">
                <a href="{{ route('admin_photo_gallery_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Photo Gallery</span></a>
            </li>

            <li class="{{ Request::is('admin/video-gallery/*') ? 'active' : '' }}">
                <a href="{{ route('admin_video_gallery_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Video Gallery</span></a>
            </li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}">
                <a href="{{ route('admin_faq_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>FAQ Section</span></a>
            </li>


            <li class="{{ Request::is('admin/subscribers/*') ? 'active' : '' }}">
                <a href="{{ route('admin_subscribers') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Subscribers</span></a>
            </li>

            
            <li class="{{ Request::is('admin/live-channel/*') ? 'active' : '' }}">
                <a href="{{ route('admin_live_channel_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Live Channel</span></a>
            </li>

            <li class="{{ Request::is('admin/online-poll/*') ? 'active' : '' }}">
                <a href="{{ route('admin_online_poll_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Online Poll</span></a>
            </li>

            <li class="{{ Request::is('admin/social/*') ? 'active' : '' }}">
                <a href="{{ route('admin_social_show') }}" class="nav-link"><i class="fas fa-hand-point-right"></i><span>Social Item</span></a>
            </li>
            
            


        </ul>
    </aside>
</div>