<div id="kt_aside" class="aside px-2 drawer drawer-start" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '285px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle" style="width: 285px !important;">
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 mx-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="2px" style="height: 823px;">
            <div class="menu menu-column menu-sub-indention menu-active-bg menu-state-primary menu-title-gray-700 fs-6 menu-rounded w-100 fw-semibold" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7 text-uppercase">Навигация</span>
                    </div>
                </div>

                <div class="menu-item">
                    @if(Route::is('cloud.StorageObject.home'))
                        <a style="cursor: not-allowed" class="menu-link disabled"><span class="menu-icon"><i class="fa-duotone fa-box-archive fs-2"></i></span><span class="menu-title">Хранилище объектов</span></a>
                    @else
                        <a href="{{route('cloud.StorageObject.home')}}" class="menu-link" ><span class="menu-icon"><i class="fa-duotone fa-box-archive fs-2"></i></span><span class="menu-title">Хранилище объектов</span></a>
                    @endif
                </div>

                <div class="menu-item">
                    @if(Route::is('cloud.db.home'))
                        <a style="cursor: not-allowed" class="menu-link disabled"><span class="menu-icon"><i class="fa-duotone fa-database fs-2"></i></span><span class="menu-title">База данных</span></a>
                    @else
                        <a href="{{route('cloud.db.home')}}" class="menu-link" ><span class="menu-icon"><i class="fa-duotone fa-database fs-2"></i></span><span class="menu-title">База данных</span></a>
                    @endif
                </div>

                <div class="menu-item">
                    @if(Route::is('cloud.wh.home'))
                        <a style="cursor: not-allowed" class="menu-link disabled"><span class="menu-icon"><i class="fa-duotone fa-browser fs-2"></i></span><span class="menu-title">Хостинг</span></a>
                        <a href="{{route('cloud.wh.home')}}" class="menu-link" ><span class="menu-icon"><i class="fa-duotone fa-browser fs-2"></i></span><span class="menu-title">Хостинг</span></a>
                    @endif
                </div>


                <div class="menu-item">
                    <a class="menu-link"><span class="menu-icon"><i class="fa-duotone fa-server fs-2"></i></span><span class="menu-title">Сервера</span></a>
                </div>

                <div class="menu-item">
                    <a class="menu-link"><span class="menu-icon"><i class="fa-duotone fa-mailbox fs-2"></i></span><span class="menu-title">Доставка почты</span></a>
                </div>

                <div class="menu-item">
                    @if(Route::is('cloud.vpn.home'))
                        <a style="cursor: not-allowed" class="menu-link disabled"><span class="menu-icon"><i class="fa-duotone fa-network-wired fs-2"></i></span><span class="menu-title">VPN</span></a>
                    @else
                        <a href="{{route('cloud.vpn.home')}}" class="menu-link" ><span class="menu-icon"><i class="fa-duotone fa-network-wired fs-2"></i></span><span class="menu-title">VPN</span></a>
                    @endif
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon"><i class="fa-duotone fa-diagram-project fs-2"></i></span><span class="menu-title">Проекты</span><span class="menu-arrow"></span>
                        </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;" kt-hidden-height="120">
                        <div class="menu-item">
                            <a class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">NodeJS</span></a><!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Laravel</span></a><!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Python</span></a><!--end:Menu link-->
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon"><i class="fa-brands fa-expeditedssl fs-2"></i></span><span class="menu-title">Центр сертификации</span><span class="menu-arrow"></span>
                        </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;" kt-hidden-height="80">
                        <div class="menu-item">
                            <a class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">SSL-сертификат</span></a><!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Цастный ЦС</span></a><!--end:Menu link-->
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon"><i class="fa-duotone fa-microchip-ai fs-2"></i></span><span class="menu-title">Искусственный интеллект</span><span class="menu-arrow"></span>
                        </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;" kt-hidden-height="190">
                        <div class="menu-item">
                            <a href="{{route('cloud.ai.home')}}" class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Главная</span></a><!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <a href="{{route('cloud.ai.LanguageTranslation')}}" class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Перевод текста</span></a><!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <a href="{{route('cloud.ai.LanguagePretrained')}}" class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Предварительно обученные модели</span></a><!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" ><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Концепция развития</span></a><!--end:Menu link-->
                        </div>
                    </div>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7 text-uppercase">Помощь</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities">
                        <span class="menu-icon"><i class="fa-duotone fa-ticket fs-2"></i></span>
                        <span class="menu-title">Запросы</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities">
                        <span class="menu-icon"><i class="fa-duotone fa-circle-info fs-2"></i></span>
                        <span class="menu-title">База знаний</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{--<div class="aside-footer flex-column-auto px-4 pt-3 pb-7" id="kt_aside_footer">
        <a href="https://preview.keenthemes.com/html/metronic/docs" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" data-bs-original-title="200+ in-house components and 3rd-party plugins" data-kt-initialized="1">
            <span class="btn-label">
                Docs &amp; Components
            </span>
            <i class="ki-duotone ki-document btn-icon fs-2"></i>
        </a>
    </div>--}}
</div>

