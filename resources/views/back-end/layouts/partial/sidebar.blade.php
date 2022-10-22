<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="active"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin_top_ad_show') }}"><i class="fas fa-angle-right"></i> Top Advertisement</a></li>
                    <li class=""><a class="nav-link" href="{{ route('admin_home_ad_show') }}"><i class="fas fa-angle-right"></i> Home Advertisement</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Sidebar Advertisement</a></li>
                </ul>
            </li>

            


        </ul>
    </aside>
</div>