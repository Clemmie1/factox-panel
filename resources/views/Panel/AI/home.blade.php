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


                                <!--begin::Section-->
                                <div class="px-md-10 pt-md-10 pb-md-5">
                                    <!--begin::Block-->
                                    <div class="text-center mb-20">
                                        <h1 class=" fw-bold mb-8" style="font-size: 5.5em">
                                            FactoX
                                            <span class="d-inline-block position-relative ms-2">
                                                <span class="d-inline-block mb-2">
                                                    AI
                                                </span>
                                                <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                                            </span>
                                        </h1>

                                        <div class="fw-semibold fs-2 text-gray-500 mb-10">
                                            Извлечение аналитической информации из неструктурированного текста <br>
                                            <br>
                                            Используйте сервис FactoX Language для комплексного анализа текста в требуемом объеме. С помощью готовых, предварительно обученных моделей, а также собственных моделей могут обрабатывать неструктурированный текст и получать на его основе аналитическую информацию, даже не будучи знакомыми с наукой о данных. Предварительно обучаемые модели поддерживают анализ тональности, извлечение ключевых фаз, классификацию текстов и распознавание именованных сущностей. Сервис перевода позволяет переводить текст на любой из 21 доступного языка.
                                        </div>
                                    </div>
                                    <!--end::Block-->

                                    <!--begin::Row-->
                                    <div class="row g-0">


                                        <!--begin::Col-->
                                        <div class="col-md-6 mb-10">
                                            <div class="card bg-light bg-opacity-50 rounded-3 mx-md-5 h-md-100">
                                                <div class="bg-danger text-center text-white text-uppercase rounded-top">
                                                    Бета-тестирование
                                                </div>
                                                <div class="card-body p-10">
                                                    <div class="d-flex flex-center w-60px h-60px rounded-3 bg-light-primary  bg-opacity-90 mb-10">
                                                        <i class="fa-duotone fa-microchip-ai text-primary fs-3x"></i>
                                                    </div>

                                                    <h1 class="mb-5">Перевод текста</h1>

                                                    <div class="fs-4 text-gray-600 py-3 mb-auto">
                                                        <p>Используйте новейшие средства нейронного машинного перевода для перевода текстов на другие языки.</p>
                                                    </div>
                                                </div>
                                                {{--<div class="bg-secondary text-center">
                                                    Активна до 22.12.2023
                                                </div>--}}
                                                <div class="card-footer">
                                                    {{--<button class="btn btn-lg btn-secondary w-100 text-uppercase" disabled>временно недоступен</button>--}}
                                                    <button class="btn btn-lg btn-success w-100 text-uppercase">продлить</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->


                                        <!--begin::Col-->
                                        <div class="col-md-6 mb-10">

                                            <div class="card bg-light bg-opacity-50 mx-md-5 h-md-100">
                                                <div class="bg-danger text-center text-white text-uppercase rounded-top">
                                                    Бета-тестирование
                                                </div>
                                                <div class="card-body p-10">
                                                    <div class="d-flex flex-center w-60px h-60px rounded-3 bg-light-primary  bg-opacity-90 mb-10">
                                                        <i class="fa-duotone fa-microchip-ai text-primary fs-3x"></i>
                                                    </div>
                                                    <h1 class="mb-5">Предварительно обученные модели</h1>
                                                    <div class="fs-4 text-gray-600 py-3 mb-auto">
                                                        <p><b>Определение языка</b></p>
                                                        <p>Определяйте язык вашего текста, выбирая из более чем 75 языков.</p>
                                                        <hr>
                                                        <p><b>Классификация текстов</b></p>
                                                        <p>Классификация содержимого текста по более чем 600 категориям.</p>
                                                        <hr>
                                                        <p><b>Анализ настроений</b></p>
                                                        <p>Извлечение сведений о тональности выражения отношения к продукту и тем или иным его аспектам.</p>
                                                        <hr>
                                                        <p><b>Извлечение ключевых фраз</b></p>
                                                        <p>Определяйте наиболее важные темы для обсуждения в вашем тексте.</p>
                                                        <hr>
                                                        <p><b>Распознавание именованных объектов</b></p>
                                                        <p>Идентификация объектов в тексте, таких как люди, места, организации, даты и т. д.</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-lg btn-secondary w-100 text-uppercase" disabled>временно недоступен</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-10">

                                            <div class="card bg-light bg-opacity-50 mx-md-5 h-md-100">
                                                <div class="bg-danger text-center text-white text-uppercase rounded-top">
                                                    Бета-тестирование
                                                </div>
                                                <div class="card-body p-10">
                                                    <div class="d-flex flex-center w-60px h-60px rounded-3 bg-light-primary  bg-opacity-90 mb-10">
                                                        <i class="fa-duotone fa-microchip-ai text-primary fs-3x"></i>
                                                    </div>
                                                    <h1 class="mb-5">Концепция развития</h1>
                                                    <div class="fs-4 text-gray-600 py-3 mb-auto">
                                                        <p><b>Классификация изображений</b></p>
                                                        <p>Распределение по категориям содержащихся в изображении функциональных элементов и объектов, основанных на сценах.</p>
                                                        <hr>
                                                        <p><b>Обнаружение объектов</b></p>
                                                        <p>Поиск и идентификация объектов внутри изображения.</p>
                                                        <hr>
                                                        <p><b>Обнаружение текста</b></p>
                                                        <p>Предоставляет текст на уровне слов и строк, а также координаты ограничивающего прямоугольника, где расположен текст.</p>
                                                        <hr>
                                                        <p><b>Распознавание лиц</b></p>
                                                        <p>Находит и идентифицирует человеческие лица на изображении</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-lg btn-secondary w-100 text-uppercase">Подключить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
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

<script>
    document.addEventListener('livewire:navigated', () => {
        KTMenu.init();
        KTScrolltop.init();
        KTScroll.init();
    })
</script>
</body>
</html>
