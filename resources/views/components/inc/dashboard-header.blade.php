
<header id="page-header">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex align-items-center">
            <div class="d-inline-block ms-2 px-1">
                <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="px-3">{{auth()->user()->name??''}}</span>
                </button>
            </div>
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <button type="submit" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown" >
                    <i class="fa fa-fw fa-power-off"></i>
                </button>
            </form>

            
            
                
        </div>
    </div>

    <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
</header>