<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$ticketData->ticket_theme}}</title>
    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}">
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/spinkit.css')}}" type="text/css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    @livewireStyles
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

            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">
                <div class="content flex-row-fluid" id="kt_content">
                    <button onclick="location.href='{{route('support.tickets')}}'" type="button" class="btn btn-sm btn-secondary btn-icon align-self-center mb-3">
                        <i class="las la-angle-left fs-2"></i>
                    </button>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-xl-row p-7">
                                <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                                    @livewire('panel.support.load-ticket-comments', [
                                       'ticketData' => $ticketData,
                                       'ticketID' => $ticketID
                                    ])

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div>
    <div
        id="multipart_upload"

        class="bg-white"
        data-kt-drawer="true"
        data-kt-drawer-activate="true"
        data-kt-drawer-toggle="#multipart_upload_button"
        data-kt-drawer-close="#multipart_upload_close"
        data-kt-drawer-width="{xl:'100%', 'xl': '50%'}"
    >

        @livewire('panel.support.create-ticket')
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

@stack('footer-scripts')

</body>
</html>
