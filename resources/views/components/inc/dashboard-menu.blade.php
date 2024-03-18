<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="font-semibold text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">LAKHPATI</span>
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
                <li class="nav-main-heading">Contests</li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('contests/create') ? ' active' : '' }}" href="{{route('createContest')}}">
                        <i class="nav-main-link-icon si si-plus"></i>
                        <span class="nav-main-link-name">Create Contest</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('contests') ? ' active' : '' }}" href="{{route('listContests')}}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">List Contests</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">Participations</li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('participants') ? ' active' : '' }}" href="{{route('listParticipants')}}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">List Participants</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">Payments</li>
                <li class="nav-main-item" disabled>
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon fa fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Easypaisa Payments</span>
                    </a>
                </li>
                <li class="nav-main-item" disabled>
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon fa fa-money-check-alt"></i>
                        <span class="nav-main-link-name">Jazzcash Payments</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>