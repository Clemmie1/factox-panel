<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Искусственный интеллект</title>
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
                        <div class="card card-docs flex-row-fluid mb-2" id="kt_docs_content_card">
                            <!--begin::Card Body-->
                            <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">

                                <h1 class="text-center fw-bold mb-8" style="font-size: 3em">
                                    Перевод текста
                                </h1>

                                <div class="fw-semibold fs-4 text-gray-500 mb-10 text-center">
                                    FactoX Language Translate - это многоязычный сервис нейронного машинного перевода для перевода текста с одного языка на другой.
                                </div>

                                @livewire('panel.a-i.language-translation')

                            </div>
                            <!--end::Card Body-->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />
<script>
    document.addEventListener('livewire:navigated', () => {
        KTMenu.init();
        KTScrolltop.init();
        KTScroll.init();
    })
</script>
</body>
</html>
