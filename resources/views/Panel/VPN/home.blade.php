<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VPN</title>
    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}">
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/spinkit.css')}}" type="text/css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled">
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if ( document.documentElement ) {
        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if ( localStorage.getItem("data-bs-theme") !== null ) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>


<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">

        @include('Components.Panel.asideBar')

        <div class="wrapper d-flex flex-column flex-row-fluid" >

            @include('Components.Panel.header')

            <div class="toolbar d-flex flex-stack py-3 py-lg-5" id="kt_toolbar">
                <div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap">


                    <div class="page-title d-flex flex-column me-3">
                        <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                            VPN
                        </h1>
                        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                            <li class="breadcrumb-item text-gray-600">
                                <a href="/metronic8/demo18/../demo18/index.html" class="text-gray-600 text-hover-primary">
                                    Главная
                                </a>
                            </li>
                            <li class="breadcrumb-item text-gray-600">
                                VPN
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <a href="#" class="btn btn-sm btn-secondary" id="kt_drawer_example_basic_button">
                            Создать
                        </a>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column-fluid align-items-start  container-xxl ">
                <div class="content flex-row-fluid " >


{{--                    <div class="justify-content-center text-center m-xxl-10">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>--}}

                    {{--<div class="justify-content-center text-center m-xxl-10">
                        <div class="d-flex justify-content-center">
                            <div href="#" class="p-10">
                                <div>
                                    <i class="fa-duotone fa-cloud-exclamation" style="font-size: 6em"></i>
                                    <p class="mt-5 text-muted">Ресурсы не найдены</p>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                    <div class="row g-6 g-xl-9">

                        <div class="col-md-6 col-xl-4">

                            <a href="/metronic8/demo18/../demo18/apps/projects/project.html" class="card border-hover-primary ">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-success">
                                            <i class="las la-network-wired text-success p-3 fs-4x"></i>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <span class="badge badge-light-success fw-bold me-auto px-4 py-3 text-uppercase">Активный</span>
                                    </div>

                                </div>

                                <div class="card-body p-9">
                                    <div class="fs-3 fw-bold text-dark">
                                        БД
                                        <span class="text-muted">
                                            #321
                                        </span>
                                    </div>

                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                        dsadasdsaads
                                    </p>

                                </div>

                            </a>

                        </div>

                        <div class="col-md-6 col-xl-4">

                            <a href="/metronic8/demo18/../demo18/apps/projects/project.html" class="card">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-warning">
                                            <i class="las la-network-wired text-warning p-3 fs-4x"></i>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <span class="badge badge-light-warning fw-bold me-auto px-4 py-3 text-uppercase">Установка</span>
                                    </div>

                                </div>

                                <div class="card-body p-9">
                                    <div class="fs-3 fw-bold text-dark">
                                        БД
                                        <span class="text-muted">
                                            #1234
                                        </span>
                                    </div>

                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                        My cloud test
                                    </p>

                                </div>

                            </a>

                        </div>

                        <div class="col-md-6 col-xl-4">

                            <a href="/metronic8/demo18/../demo18/apps/projects/project.html" class="card">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-danger">
                                            <i class="las la-network-wired text-danger p-3 fs-4x"></i>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <span class="badge badge-light-danger fw-bold me-auto px-4 py-3 text-uppercase">Удалён</span>
                                    </div>

                                </div>

                                <div class="card-body p-9">
                                    <div class="fs-3 fw-bold text-dark">
                                        БД
                                        <span class="text-muted">
                                            #434
                                        </span>
                                    </div>

                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                        My cloud
                                    </p>

                                </div>

                            </a>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

@include('Panel.VPN.createVpn')

@stack('footer-scripts')

</body>
</html>
