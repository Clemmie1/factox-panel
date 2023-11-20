<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Рассылка по электронной почте</title>
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
                            Конфигурация
                        </h1>
                        <div class="text-gray-600 fs-7">
                            Отправка с помощью SMTP требует, чтобы учетные данные SMTP были созданы с использованием <a
                                href="{{route('cloud.Account.settings')}}" target="_blank">интерфейса идентификации</a> и связаны с пользователем сервиса идентификации.
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column-fluid align-items-start  container-md">
                <div class="content flex-row-fluid " >
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Информация об отправке через SMTP</h3>
                            </div>
                        </div>
                        <div class="card-body p-9">

                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Общедоступная конечная точка
                                    <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Общедоступная конечная точка, используемая для отправки электронной почты.">
                                        <i class="las la-question-circle fs-4"></i>
                                    </span>
                                </label>

                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800"><i class="las la-square-full text-success" data-bs-toggle="tooltip" data-bs-placement="left" title="Активный"></i>smtp.email.us-phoenix.factox.cloud</span>
                                    <br>
                                    <span class="fw-bold fs-6 text-gray-800"><i class="las la-square-full text-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Не активный"></i>smtp.email.eu-frankfurt.factox.cloud</span>
                                </div>
                            </div>

                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Порты SMTP
                                    <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Порты SMTP для приема электронной почты.">
                                        <i class="las la-question-circle fs-4"></i>
                                    </span>
                                </label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">587 (рекомендуется) или 25</span>
                                </div>
                            </div>

                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Безопасность
                                    <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Для доставки электронной почты требуется защищенное соединение TLS для отправки почты на общедоступную конечную точку - это отраслевой стандарт, используемый в целях безопасности.">
                                        <i class="las la-question-circle fs-4"></i>
                                    </span>
                                </label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">Требуется TLS</span>
                                </div>
                            </div>

                            <div class="notice d-flex bg-light-warning rounded border-warning  p-6">
                                <i class="fa-duotone fa-circle-info fs-2tx text-warning me-4"></i>
                                <div class="d-flex flex-stack flex-grow-1 ">
                                    <div class=" fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Данные для доступа к SMTP</h4>

                                        <div class="fs-6 text-gray-700 ">Создать учетные данные можно <a class="fw-bold" href="{{route('cloud.Account.settings')}}">тут</a>.</div>
                                    </div>
                                </div>
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
