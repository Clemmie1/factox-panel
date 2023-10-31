<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
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

            <div class="d-flex flex-column-fluid align-items-start  container-xxl ">
                <div class="content flex-row-fluid" >
                    <div class="gy-0 gx-10">
                        <div class="row gx-5 gx-xl-8 mb-5 mb-xl-8">
                            <!--begin::Col-->
                            <div class="col-xl-6">

                                <!--begin::Tiles Widget 2-->
                                <div class="card h-175px bgi-no-repeat bgi-size-contain card-xl-stretch mb-5 mb-xl-8" style="background-color: #663259; background-position: right; background-image:url('/metronic8/demo2/assets/media/svg/misc/taieri.svg')">

                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <!--begin::Title-->
                                        <h2 class="text-white fw-bold mb-5">Create SaaS<br>Based Reports</h2>
                                        <!--end::Title-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <a href="#" class="btn btn-danger fw-semibold px-6 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Create Campaign</a>
                                        </div>
                                        <!--begin::Action-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tiles Widget 2-->

                                <div class="row gx-5 gx-xl-8">
                                    <!--begin::Col-->
                                    <div class="col-xxl-6 mb-5 mb-xl-8">
                                        <!--begin::Tiles Widget 5-->
                                        <a href="#" class="card card-xxl-stretch bg-primary">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <i class="ki-duotone ki-element-11 text-white fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                                <div class="d-flex flex-column">
                                                    <div class="text-white fw-bold fs-1 mb-0 mt-5">
                                                        790            </div>

                                                    <div class="text-white fw-semibold fs-6">
                                                        New Products            </div>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Tiles Widget 5-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-xxl-6 mb-5 mb-xl-0">
                                        <!--begin::Tiles Widget 5-->
                                        <a href="#" class="card card-xxl-stretch bg-body">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <i class="ki-duotone ki-rocket text-success fs-2hx ms-n1 flex-grow-1"><span class="path1"></span><span class="path2"></span></i>
                                                <div class="d-flex flex-column">
                                                    <div class="text-dark fw-bold fs-1 mb-0 mt-5">
                                                        8,600            </div>

                                                    <div class="text-muted fw-semibold fs-6">
                                                        New Customers            </div>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Tiles Widget 5-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <!--begin::Mixed Widget 3-->
                                <div class="card h-100 bgi-no-repeat bgi-size-cover card-xl-stretch mb-5 mb-xl-8" style="background-image:url('/metronic8/demo2/assets/media/misc/bg-2.jpg')">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <!--begin::Title-->
                                        <div class="text-white fw-bold fs-2">
                                            <h2 class="fw-bold text-white mb-2">Create Reports</h2>

                                            With App
                                        </div>
                                        <!--end::Title-->

                                        <!--begin::Link-->
                                        <a href="#" class="text-warning fw-semibold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                                            Create Report
                                            <i class="ki-duotone ki-arrow-right fs-2 text-warning"><span class="path1"></span><span class="path2"></span></i>
                                        </a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 3-->
                            </div>
                            <!--end::Col-->
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
