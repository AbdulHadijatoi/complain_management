<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{{$page_title??"Admin Panel Lakhpati"}}</title>

        <meta name="author" content="abdul hadi">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/amethyst.css') }}"> -->
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
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

        <div id="page-container">
            <main id="main-container">
                @yield('content')
            </main>
        </div>
        <script src="{{ mix('js/oneui.app.js') }}"></script>

        @yield('js_after')
    </body>
</html>
