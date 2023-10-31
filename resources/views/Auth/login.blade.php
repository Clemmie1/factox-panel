<html lang="ru" data-bs-theme="dark" data-bs-theme-mode="dark">
<head>
    <title>Вход в аккаунт</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="../../../../../css-1?family=Inter:300,400,500,600,700">        <!--end::Fonts-->

    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/spinkit.css')}}" type="text/css"/>
</head>
<body class="auth-bg">
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

    <div class="d-flex flex-column flex-lg-row flex-column-fluid">

        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <div class="w-500px p-10">

                    <livewire:auth.login>

                    </livewire:auth.login>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
</html>





