<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Настройка аккаунта</title>
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

{{--            <div class="toolbar d-flex flex-stack py-3 py-lg-5" id="kt_toolbar">
                <div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap">


                    <div class="page-title d-flex flex-column me-3">
                        <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                            Хостинг
                        </h1>
                        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                            <li class="breadcrumb-item text-gray-600">
                                <a href="/metronic8/demo18/../demo18/index.html" class="text-gray-600 text-hover-primary">
                                    Главная
                                </a>
                            </li>
                            <li class="breadcrumb-item text-gray-600">
                                Хостинг
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                            Создать
                        </a>
                    </div>
                </div>
            </div>--}}

            <div class="d-flex flex-column-fluid align-items-start  container-xxl ">
                <div class="content flex-row-fluid " >


                    {{--                    <div class="justify-content-center text-center m-xxl-10">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </div>--}}

                    <div class="card  mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Безопасность</h3>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Content-->
                        <div id="kt_account_settings_signin_method" class="collapse show">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Email Address-->
                                <div class="d-flex flex-wrap align-items-center">
                                    <!--begin::Label-->
                                    <div id="kt_signin_email" class="">
                                        <div class="fs-6 fw-bold mb-1">Адрес электронной почты</div>
                                        <div class="fw-semibold text-success">
                                            Почта подтверждена
                                        </div>
                                    </div>
                                    <!--end::Label-->

                                    <!--begin::Edit-->
                                    <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                        @livewire('panel.account.update-email')
                                    </div>
                                    <!--end::Edit-->

                                    <!--begin::Action-->
                                    <div id="kt_signin_email_button" class="ms-auto">
                                        <button class="btn btn-light btn-active-light-primary text-uppercase">Изменить</button>
                                    </div>
                                    <!--end::Action-->
                                </div>

                                <div class="separator separator-dashed my-6"></div>

                                <div class="d-flex flex-wrap align-items-center mb-10">

                                    <div id="kt_signin_password" class="">
                                        <div class="fs-6 fw-bold mb-1">Пароль</div>
                                        <div class="fw-semibold text-gray-600">************</div>
                                    </div>

                                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                        @livewire('panel.account.update-password')
                                    </div>

                                    <div id="kt_signin_password_button" class="ms-auto">
                                        <button class="btn btn-light btn-active-light-primary text-uppercase">Изменить</button>
                                    </div>
                                </div>

                                <div class="notice d-flex bg-light-primary rounded  p-6">
                                    <i class="fa-duotone fa-shield-check fs-2tx text-primary me-4"></i>

                                    @livewire('panel.account.update-two-factor')
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>

                    <div class="card  border-danger">

                        <div class="card-header border-1 border-danger cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0 text-danger">Деактивировать аккаунт</h3>
                            </div>
                        </div>

                        <div class="collapse show">

                            <div class="form fv-plugins-bootstrap5 fv-plugins-framework">

                                @livewire('panel.account.close-account')
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>

                    {{--<div class="row g-6 g-xl-9">

                        <div class="col-md-6 col-xl-4">

                            <a href="/metronic8/demo18/../demo18/apps/projects/project.html" class="card border-hover-primary ">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-success">
                                            <i class="las la-database text-success p-3 fs-4x"></i>
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
                                            <i class="las la-database text-warning p-3 fs-4x"></i>
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
                                            <i class="las la-database text-danger p-3 fs-4x"></i>
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

                    </div>--}}

                </div>
            </div>

        </div>

    </div>
</div>

<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/account/settings/signin-methods.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />
<script>

    document.addEventListener('livewire:navigated', () => {
        KTComponents.init();
    })

</script>


</body>
</html>
