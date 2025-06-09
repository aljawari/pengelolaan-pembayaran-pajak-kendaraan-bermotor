<!DOCTYPE html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Dashboard Template" />
    <meta name="keywords" content="Bootstrap, admin template, dashboard, Laravel" />
    <meta name="author" content="CodedThemes" />

    <title>@yield('title', 'Pajak Kendaraan Bermotor')</title>

    <link rel="icon" href="{{ asset('dist/assets/images/favicon.svg') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}" id="main-style-link" />

    @stack('styles')
</head>

<body>
    <!-- Preloader -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- Sidebar Only -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- Breadcrumb -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title', 'Dashboard')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="row">
                <div class="col-sm-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('dist/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('dist/assets/js/icon/feather-icon.js') }}"></script>
    <script src="{{ asset('dist/assets/js/layout.js') }}"></script>
    <script src="{{ asset('dist/assets/js/config.js') }}"></script>

    @stack('scripts')

    <script>
        feather.replace();
    </script>
</body>
</html>
