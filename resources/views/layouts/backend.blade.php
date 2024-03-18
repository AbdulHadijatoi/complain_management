<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{{$page_title??"Admin Panel Lakhpati"}}</title>

        <meta name="author" content="abdul hadi">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">
        
        <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/dropzone/min/dropzone.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">

        @yield('css_after')
        {{-- <style>
            table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.fixed-column th:first-child,
.fixed-column td:first-child {
    position: sticky;
    left: 0; /* Fix the first column */
    background-color: #fff; /* Adjust background color if needed */
    z-index: 2; /* Ensure it's above other columns */
}

.fixed-column th:last-child,
.fixed-column td:last-child {
    position: sticky;
    right: 0; /* Fix the last column */
    background-color: #fff; /* Adjust background color if needed */
    z-index: 2; /* Ensure it's above other columns */
}

        </style> --}}
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        
        <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
            <aside id="side-overlay" class="fs-sm">
                <div class="content-header border-bottom">
                    <a class="img-link me-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                    </a>
                    <div class="ms-2">
                        <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">John Smith</a>
                    </div>
                    <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </div>

                <div class="content-side">
                    <p>
                        Content..
                    </p>
                </div>
            </aside>
          
            @include('components.inc.dashboard-menu')
            @include('components.inc.dashboard-header')
            <main id="main-container">
                @if ($errors->any())
                <div class="col-12" style="position: fixed; top:0px; left:0px;">
                    <div class="alert alert-danger alert-dismissible m-0" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                @if (session('success'))
                <div class="col-12" style="position: fixed; top:0px; left:0px;">
                    <div class="alert alert-success alert-dismissible m-0" role="alert">
                        <p class="mb-0">
                            {{ session('success') }}
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @yield('content')
            </main>
            @include('components.inc.dashboard-footer')
        </div>
        
        <script src="{{ mix('js/oneui.app.js') }}"></script>
        <script src="{{asset('js/lib/jquery.min.js')}}"></script>
        <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('js/plugins/dropzone/min/dropzone.min.js')}}"></script>

    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider + BS Colorpicker plugins) -->
    <script>One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs', 'jq-rangeslider', 'jq-colorpicker']);</script>
        @yield('js_after')
    </body>
</html>
