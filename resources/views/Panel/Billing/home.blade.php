<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Биллинг</title>
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
                                        Текущий платежный баланс
                                    </h1>
                                    <div class="text-gray-600 fs-4">
                                        Баланс {{ Auth::user()->balance }} руб.
                                        <br>
                                        @php(
                                            $totalAmount = App\Models\Invoice::query()->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), date('Y-m'))
                                            ->sum('item_price')
                                        )
                                        Списано за месяц {{ $totalAmount == 0 ? '0.00' : $totalAmount }} руб.
                                    </div>
                                </div>
                                <div class="d-flex align-items-center py-2">
                                    <a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                                        Пополнить баланс
                                    </a>
                                </div>
                            </div>
                        </div>

            <div class="d-flex flex-column-fluid align-items-start  container-xxl ">
                <div class="content flex-row-fluid " >
                    <div class="card mb-5 mb-xl-10 mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>История пополнений</h3>
                            </div>
                        </div>
                        <div class="card-body p-0">
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
                        </div>
                        {{--<div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                        <tr>
                                            <th class="min-w-150px">#</th>
                                            <th class="min-w-150px">Услуга</th>
                                            <th class="min-w-150px">Описание</th>
                                            <th class="min-w-150px">Сумма</th>
                                            <th class="text-end">Статус</th>
                                        </tr>
                                    </thead>

                                    <tbody class="fw-6 fw-semibold text-gray-600">

                                        <tr>
                                            <th><a href="">32321123</a></th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th class="text-end">5</th>
                                        </tr>


                                    </tbody>



                                </table>

                                <div class="text-center mb-3 text-muted" style="cursor: pointer">
                                    <i class="las la-angle-double-down"></i>
                                    <span>Загрузить еще</span>
                                </div>

                            </div>
                        </div>--}}
                    </div>
                    <div class="card mb-5 mb-xl-10 mt-5">
                        @livewire('panel.billing.load-invoices', [
                            'lazy' => true
                        ])
                        {{--<div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                        <tr>
                                            <th class="min-w-150px">#</th>
                                            <th class="min-w-150px">Услуга</th>
                                            <th class="min-w-150px">Описание</th>
                                            <th class="min-w-150px">Сумма</th>
                                            <th class="text-end">Статус</th>
                                        </tr>
                                    </thead>

                                    <tbody class="fw-6 fw-semibold text-gray-600">

                                        <tr>
                                            <th><a href="">32321123</a></th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th class="text-end">5</th>
                                        </tr>


                                    </tbody>



                                </table>

                                <div class="text-center mb-3 text-muted" style="cursor: pointer">
                                    <i class="las la-angle-double-down"></i>
                                    <span>Загрузить еще</span>
                                </div>

                            </div>
                        </div>--}}
                    </div>
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
