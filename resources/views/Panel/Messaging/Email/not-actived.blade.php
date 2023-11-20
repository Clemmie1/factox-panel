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

            <div class="d-flex flex-column-fluid align-items-start  container-md">

                <div class="content flex-row-fluid">
                    <div class="card ">
                        <div class="card-body p-0">
                            <div class="card-px text-center py-20 my-10">
                                <h2 class="fs-2x fw-bold mb-10">Рассылка по электронной почте не активна</h2>
                                <p class="text-gray-500 fs-4 fw-semibold mb-10">
                                    Чтобы активировать услугу, выберите подходящий тариф.
                                </p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-striped gy-7">
                                        <thead class="align-middle">
                                            <tr id="kt_pricing">


                                                <th>
                                                    <div>
                                                        <img class="mw-100 mh-200px" alt="" src="{{asset('assets/media/illustrations/16.png')}}">
                                                    </div>
                                                </th>
                                                <th class="text-center min-w-200px">
                                                    <div class="min-w-200px mb-15">
                                                        <div class="text-primary fs-3 fw-bold mb-7">Базовый</div>

                                                        <div class="fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                            100
                                                            <span class="align-self-start fs-2 mt-3">₽</span>
                                                        </div>

                                                        <div class="text-muted fw-bold mb-7">Ежемесячно</div>

                                                        <button href="#" class="btn btn-light-primary fw-bold mx-auto text-uppercase">Подключить</button>
                                                    </div>
                                                </th>



                                                <th class="text-center min-w-200px">
                                                    <div class="min-w-200px mb-15">
                                                        <div class="text-primary fs-3 fw-bold mb-7">Про</div>

                                                        <div class="fs-5x d-flex justify-content-center align-items-start">
                                                            <span class="lh-sm fw-semibold" data-kt-plan-price-month="199" data-kt-plan-price-annual="999">200</span>
                                                            <span class="fs-2 mt-3">₽</span>
                                                        </div>

                                                        <div class="text-muted fw-bold mb-7">Ежемесячно</div>

                                                        <button href="#" class="btn btn-light-primary fw-bold mx-auto text-uppercase">Подключить</button>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="card-rounded-start">
                                                    <div class="fw-bold d-flex align-items-center ps-9 fs-3">Домены электронной почты</div>
                                                </th>

                                                <td>
                                                    1
                                                </td>

                                                <td class="card-rounded-end">
                                                    <div class="flex-root d-flex justify-content-center">
                                                        10
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="card-rounded-start">
                                                    <div class="fw-bold d-flex align-items-center ps-9 fs-3">Отправителей</div>
                                                </th>

                                                <td>
                                                    1

                                                </td>

                                                <td class="card-rounded-end">
                                                    <div class="flex-root d-flex justify-content-center">
                                                        10
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="card-rounded-start">
                                                    <div class="fw-bold d-flex align-items-center ps-9 fs-3">Письма отправлено в день</div>
                                                </th>

                                                <td>
                                                    100

                                                </td>

                                                <td class="card-rounded-end">
                                                    <div class="flex-root d-flex justify-content-center">
                                                        1000
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="card-rounded-start">
                                                    <div class="fw-bold d-flex align-items-start ps-9 fs-3">Максимально допустимый
                                                        размер отправленного электронного письма в байтах</div>
                                                </th>

                                                <td>
                                                    2 008 192

                                                </td>

                                                <td class="card-rounded-end">
                                                    <div class="flex-root d-flex justify-content-center">
                                                        10 008 192
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="card-rounded-start">
                                                    <div class="fw-bold d-flex align-items-start ps-9 fs-3">Максимальная скорость, которую клиент может отправить по электронной почте за минуту</div>
                                                </th>

                                                <td>
                                                    10

                                                </td>

                                                <td class="card-rounded-end">
                                                    <div class="flex-root d-flex justify-content-center">
                                                        100
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
