<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Домены</title>
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
                            Домены
                        </h1>
                        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                            <li class="breadcrumb-item text-gray-600">
                                <a href="/metronic8/demo18/../demo18/index.html" class="text-gray-600 text-hover-primary">
                                    Главная
                                </a>
                            </li>
                            <li class="breadcrumb-item text-gray-600">
                                Домены
                            </li>
                        </ul>
                    </div>
                    {{--<div class="d-flex align-items-center py-2">
                        <a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                            Создать
                        </a>
                    </div>--}}
                </div>
            </div>

            <div class="d-flex flex-column-fluid align-items-start  container-md">
                <div class="content flex-row-fluid " >

                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Список доменов</h3>
                            </div>
                            <div class="card-toolbar" style="cursor: not-allowed;">
                                <button type="button" class="btn btn-sm btn-light disabled" disabled>
                                    Зарегистрировать новый
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <div class="justify-content-center text-center py-7">
                                    <div class="d-flex justify-content-center">
                                        <div href="#" class="">
                                            <div>
                                                <i class="las la-file-invoice fs-2hx" style="font-size: 6em"></i>
                                                <p class="mt-5 text-muted">Нет данных...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>

                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Список доменов</h3>
                            </div>
                            <div class="card-toolbar" style="cursor: not-allowed;">
                                <button type="button" class="btn btn-sm btn-light disabled" disabled>
                                    Зарегистрировать новый
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                    <!--begin::Thead-->
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                    <tr>
                                        <th class="min-w-250px">Домен</th>
                                        <th class="min-w-250px">Создан</th>
                                        <th class="min-w-200px">Истекает</th>
                                        <th class="text-end">Статус</th>
                                    </tr>
                                    </thead>
                                    <!--end::Thead-->

                                    <!--begin::Tbody-->
                                    <tbody class="fw-6 fw-semibold text-gray-600">
                                    <tr>
                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td class="text-end">
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td class="text-end">
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td>
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>

                                        <td class="text-end">
                                            <div class="placeholder placeholder-glow col-6 rounded">

                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                    <!--end::Tbody-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>

                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Список доменов</h3>
                            </div>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-sm btn-light">
                                    Зарегистрировать новый
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                    <!--begin::Thead-->
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                    <tr>
                                        <th class="min-w-250px">Домен</th>
                                        <th class="min-w-250px">Создан</th>
                                        <th class="min-w-200px">Истекает</th>
                                        <th class="text-end">Статус</th>
                                    </tr>
                                    </thead>
                                    <!--end::Thead-->

                                    <!--begin::Tbody-->
                                    <tbody class="fw-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <a href="#" class="text-hover-primary">test.com</a>
                                            </td>

                                            <td>
                                                01.12.2023
                                            </td>

                                            <td>
                                                01.12.2024
                                            </td>

                                            <td class="text-end">
                                                <span class="badge badge-light-warning fs-7 fw-bold" title="SENDING FOR CREATING IN ICANN">СОЗДАНИЕ</span>
                                            </td>
                                        </tr>


                                    </tbody>
                                    <!--end::Tbody-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>



</body>
</html>
