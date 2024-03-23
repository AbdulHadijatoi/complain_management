<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="font-semibold text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">COMPLAINT MANAGEMENT</span>
        </a>
       
        <div>
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>


    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                        <i class="nav-main-link-icon si si-cursor"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">Manage Complaints</li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">All Complaints</span>
                    </a>
                </li>

                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/open') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">Open Complaints</span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/pending') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">Pending Complaints</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/closed') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">Closed Complaints</span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/rejected') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">Rejected Complaints</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">Manage Users</li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('contractors') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">Contractors</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">Preferences</li>
                <li class="nav-main-item" disabled>
                    <a class="nav-main-link{{ request()->is('settings') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon si si-settings"></i>
                        <span class="nav-main-link-name">App Settings</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>