<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="font-semibold text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">{{ __('COMPLAINT MANAGEMENT') }}</span>
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
                        <span class="nav-main-link-name">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-main-heading">{{ __('Manage Complaints') }}</li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints') ? ' active' : '' }}" href="{{ route('listComplaints') }}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">{{ __('All') }}</span>
                    </a>
                </li>

                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/filter/open') ? ' active' : '' }}" href="{{ route('filteredComplainList','open') }}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">{{ __('Open') }}</span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/filter/pending') ? ' active' : '' }}" href="{{ route('filteredComplainList','pending') }}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">{{ __('Pending') }}</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/filter/closed') ? ' active' : '' }}" href="{{ route('filteredComplainList','closed') }}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">{{ __('Closed') }}</span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('complaints/filter/rejected') ? ' active' : '' }}" href="{{ route('filteredComplainList','rejected') }}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">{{ __('Rejected') }}</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">{{ __('Manage Users') }}</li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('contractors/create') ? ' active' : '' }}" href="{{ route('createContractor') }}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">{{ __('Create Contractor') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('contractors') ? ' active' : '' }}" href="{{ route('listContractors') }}">
                        <i class="nav-main-link-icon si si-list"></i>
                        <span class="nav-main-link-name">{{ __('List Contractors') }}</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">{{ __('Preferences') }}</li>
                <li class="nav-main-item" disabled>
                    <a class="nav-main-link{{ request()->is('settings') ? ' active' : '' }}" href="{{ route('settings') }}">
                        <i class="nav-main-link-icon si si-settings"></i>
                        <span class="nav-main-link-name">{{ __('App Settings') }}</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
