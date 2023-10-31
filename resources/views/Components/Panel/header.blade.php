<div id="kt_header" class="header dark" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-animation="false" data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="" data-bs-theme="dark">
    <div id="kt_header" class="header dark" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-animation="false" data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="" data-bs-theme="dark">
        <div class="container-xxl  d-flex align-items-center flex-lg-stack">
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-2 me-lg-5">
                <div class="flex-grow-1">
                    <button class="btn btn-icon btn-color-gray-800 btn-active-color-primary ms-n4 me-lg-12" id="kt_aside_toggle">
                        <i class="fa-duotone fa-bars fs-1"></i>
                    </button>

                    <a href="/">
                        <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                            <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                        </svg>
                    </a>


                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">

                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <a id="openSupportInfo" class="btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px">
                        <i class="fa-duotone fa-circle-info fs-2"></i>
                    </a>
                </div>

                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="fa-duotone fa-moon-stars  fs-2"></i>
                    </a>
                    <!--begin::Menu toggle-->
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu" style="">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                              <span class="menu-icon" data-kt-element="icon">
                              <i class="fa-duotone fa-sun fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>            </span>
                                            <span class="menu-title">
                              Светлый
                              </span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2 active" data-kt-element="mode" data-kt-value="dark">
                              <span class="menu-icon" data-kt-element="icon">
                              <i class="fa-duotone fa-moon-stars fs-2"><span class="path1"></span><span class="path2"></span></i>            </span>
                                            <span class="menu-title">
                              Темный
                              </span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                              <span class="menu-icon" data-kt-element="icon">
                              <i class="fa-duotone fa-desktop fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>            </span>
                                            <span class="menu-title">
                              Система
                              </span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Theme mode-->
                <!--begin::User menu-->
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px position-relative btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="fa-duotone fa-circle-user fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Avatar" src="https://ui-avatars.com/api/?background=019FF7&color=FFFFF&name={{ Auth::user()->name }}">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold text-white d-flex align-items-center fs-5">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>



                        <div class="menu-item px-5">
                            <a href="{{route('support.tickets')}}" class="menu-link px-5">
                                Тикеты
                            </a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="{{route('cloud.bill.home')}}" class="menu-link px-5">
                                Биллинг
                            </a>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5 my-1">
                            <a href="{{route('cloud.Account.settings')}}" class="menu-link px-5">
                                Настройки учетной записи
                            </a>
                        </div>
                        <div class="menu-item px-5 my-1">
                            <a href="{{route('cloud.Account.settings')}}" class="menu-link px-5">
                                Ключи API
                            </a>
                        </div>
                        <div class="menu-item px-5">
                            <a onclick="location.href='{{route('auth.logout')}}'" class="menu-link px-5">
                                Выйти
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
